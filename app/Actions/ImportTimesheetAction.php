<?php

namespace App\Actions;

use App\Models\Department;
use App\Models\Division;
use App\Models\Employee;
use App\Models\EmploymentType;
use App\Models\JobTitle;
use App\Models\Timesheet;
use App\Models\TimesheetImport;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ImportTimesheetAction
{
    public function __invoke(string $filePath): bool
    {
        $dateRef = now();
        if (! $this->import($filePath, $dateRef)) {
            $this->deleteBatch($dateRef);

            return false;
        }

        if (! $this->manage($dateRef)) {
            $this->deleteBatch($dateRef);

            return false;
        }

        // @TODO update employee full_name/division/job

        return $this->deleteBatch($dateRef);
    }

    protected function import(string $filePath, Carbon $batchRef): bool
    {
        if (! file_exists($filePath)) {
            return false;
        }

        if (($handle = fopen($filePath, 'r')) === false) {
            return false;
        }

        $fields = [
            'department',
            'division',
            'type',
            'org_id',
            'full_name',
            'position',
            'work_hour',
            'flex_time_note',
            'check_in',
            'check_out',
            'remark',
            'reason',
            'summary',
            'datestamp',
            'flex_time_minutes',
        ];

        $chunk = [];
        $now = now();
        $headRow = true;
        try {
            while (($data = fgetcsv($handle, 1000)) !== false) {
                if ($headRow) {
                    $headRow = false;

                    continue;
                }

                $model = [];
                $index = 0;
                foreach ($fields as $field) {
                    if ($field === 'datestamp') {
                        $model[$field] = Carbon::create($data[$index]);
                    } else {
                        $model[$field] = $data[$index] !== '' ? $data[$index] : null;
                    }
                    $index++;
                }

                $model['batch_ref'] = $batchRef;
                $model['created_at'] = $now;
                $model['updated_at'] = $now;
                $chunk[] = $model;

                if (count($chunk) === 1000) {
                    TimesheetImport::query()->insert($chunk);
                    $chunk = [];
                    $now = now();
                }
            }

            fclose($handle);

            if (count($chunk)) {
                TimesheetImport::query()->insert($chunk);
            }
        } catch (Exception $e) {
            Log::error('timesheet import '.$e->getMessage());

            return false;
        }

        return true;
    }

    protected function manage(Carbon $dateRef): bool
    {
        $ids = TimesheetImport::query()
            ->select('org_id')
            ->where('batch_ref', $dateRef)
            ->orderBy('org_id')
            ->distinct('org_id')
            ->pluck('org_id');

        $employees = Employee::query()
            ->select('org_id')
            ->whereIn('org_id', $ids)
            ->pluck('org_id');

        $newEmployees = $ids->filter(fn ($id) => $employees->doesntContain($id));
        foreach ($newEmployees as $new) {
            if ($this->insertEmployee($dateRef, $new) === false) {
                return false;
            }
        }

        foreach ($ids->chunk(20) as $employees) {
            if ($this->insertTimesheets($dateRef, $employees->values()) === false) {
                return false;
            }
        }

        return true;
    }

    protected function insertEmployee(Carbon $dateRef, int $id): bool
    {
        try {
            $employee = TimesheetImport::query()
                ->where('batch_ref', $dateRef)
                ->where('org_id', $id)
                ->whereNotNull('work_hour')
                ->orderByDesc('datestamp')
                ->first();

            // part-time
            if (! $employee) {
                $employee = TimesheetImport::query()
                    ->where('batch_ref', $dateRef)
                    ->where('org_id', $id)
                    ->orderByDesc('datestamp')
                    ->first();
            }

            $jobTitle = ($employee->position)
                ? JobTitle::query()->firstOrCreate(['name' => $employee->position])
                : JobTitle::query()->find(1);
            if (! $employee->department || ! $employee->division || ! $employee->type) {
                Employee::query()->create([
                    'full_name' => $employee->full_name,
                    'org_id' => $employee->org_id,
                    'division_id' => 1,
                    'employment_type_id' => 1,
                    'job_title_id' => $jobTitle->id,
                ]);
            }

            $department = Department::query()->firstOrCreate(['name' => $employee->department]);
            $division = Division::query()
                ->firstOrCreate([
                    'name' => $employee->division,
                    'department_id' => $department->id,
                ]);
            $employmentType = EmploymentType::query()->firstOrCreate(['name' => $employee->type]);

            Employee::query()->create([
                'full_name' => $employee->full_name,
                'org_id' => $employee->org_id,
                'division_id' => $division->id,
                'employment_type_id' => $employmentType->id,
                'job_title_id' => $jobTitle->id,
            ]);
        } catch (Exception $e) {
            Log::error('insert new employee '.$e->getMessage());

            return false;
        }

        return true;
    }

    protected function insertTimesheets(Carbon $dateRef, Collection $ids): bool
    {
        try {
            $employees = Employee::query()
                ->select(['id', 'org_id'])
                ->whereIn('org_id', $ids)
                ->pluck('id', 'org_id');

            $now = now();
            $timesheets = TimesheetImport::query()
                ->where('batch_ref', $dateRef)
                ->whereIn('org_id', $ids)
                ->orderBy('org_id')
                ->orderBy('datestamp')
                ->get()
                ->map(fn ($row) => [
                    'employee_id' => $employees[$row->org_id],
                    'work_hour' => $row->work_hour,
                    'datestamp' => $row->datestamp,
                    'check_in' => $row->check_in,
                    'check_out' => $row->check_out,
                    'remark' => $row->remark,
                    'reason' => $row->reason,
                    'flex_time_note' => $row->flex_time_note,
                    'flex_time_minutes' => $row->flex_time_minutes,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

            Timesheet::query()->insert($timesheets->all());
        } catch (Exception $e) {
            Log::error('insert timesheets '.$e->getMessage());

            return false;
        }

        return true;
    }

    protected function deleteBatch(Carbon $dateRef)
    {
        return TimesheetImport::query()
            ->where('batch_ref', $dateRef)
            ->delete();
    }
}
