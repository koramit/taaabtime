<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetImport extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $connection = 'sqlite';
    protected $casts = [
        'datestamp' => 'date',
        'check_in' => 'datetime',
        'check_out' => 'datetime',
        'batch_ref' => 'datetime',
    ];
}
