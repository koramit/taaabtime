<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function department(): HasOneThrough
    {
        return $this->hasOneThrough(
            Department::class,
            Division::class,
            'id',
            'id',
            'division_id',
            'department_id',
        );
    }

    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class);
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function timesheets(): HasMany
    {
        return $this->hasMany(Timesheet::class);
    }
}
