<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }

    public function employees(): HasManyThrough
    {
        return $this->hasManyThrough(
            Employee::class,
            Division::class,
        );
    }
}
