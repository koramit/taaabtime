<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Division[] $divisions
 * @property-read int|null $divisions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Division
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property int $department_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 */
	class Division extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $full_name
 * @property int $org_id
 * @property int $division_id
 * @property int $employment_type_id
 * @property int $job_title_id
 * @property string|null $work_hour
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department|null $department
 * @property-read \App\Models\Division $division
 * @property-read \App\Models\EmploymentType $employmentType
 * @property-read \App\Models\JobTitle $jobTitle
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Timesheet[] $timesheets
 * @property-read int|null $timesheets_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmploymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereJobTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWorkHour($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmploymentType
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentType whereUpdatedAt($value)
 */
	class EmploymentType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobTitle
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereUpdatedAt($value)
 */
	class JobTitle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Timesheet
 *
 * @property int $id
 * @property int $employee_id
 * @property string|null $work_hour
 * @property \Illuminate\Support\Carbon $datestamp
 * @property string|null $check_in
 * @property string|null $check_out
 * @property string|null $remark
 * @property string|null $reason
 * @property string|null $flex_time_note
 * @property int $flex_time_minutes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereCheckIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereCheckOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereDatestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereFlexTimeMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereFlexTimeNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereWorkHour($value)
 */
	class Timesheet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TimesheetImport
 *
 * @property int $id
 * @property string|null $department
 * @property string|null $division
 * @property string|null $type
 * @property int $org_id
 * @property string $full_name
 * @property string $position
 * @property string|null $work_hour
 * @property string|null $flex_time_note
 * @property \Illuminate\Support\Carbon|null $check_in
 * @property \Illuminate\Support\Carbon|null $check_out
 * @property string|null $remark
 * @property string|null $reason
 * @property string|null $summary
 * @property \Illuminate\Support\Carbon $datestamp
 * @property int $flex_time_minutes
 * @property \Illuminate\Support\Carbon $batch_ref
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport query()
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereBatchRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereCheckIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereCheckOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereDatestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereFlexTimeMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereFlexTimeNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimesheetImport whereWorkHour($value)
 */
	class TimesheetImport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $login
 * @property string $name
 * @property string $password
 * @property int $employee_id
 * @property int $active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

