<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->string('work_hour')->nullable();
            $table->date('datestamp');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->string('remark')->nullable();
            $table->string('reason')->nullable();
            $table->string('flex_time_note')->nullable();
            $table->unsignedTinyInteger('flex_time_minutes')->default(0);
            $table->index(['employee_id', 'datestamp']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
