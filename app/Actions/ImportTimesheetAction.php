<?php

namespace App\Actions;

use App\Models\TimesheetImport;
use Illuminate\Support\Carbon;

class ImportTimesheetAction
{
    public function __invoke(string $filePath): bool
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
            'flex_time_use',
        ];

        TimesheetImport::query()->truncate();
        $chunk = [];
        $now = now();
        $headRow = true;
        $batchRef = now();
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
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

        return true;
    }
}
