<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('full_name', 100)->index();
            $table->unsignedInteger('org_id')->unique();
            $table->unsignedSmallInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->unsignedTinyInteger('employment_type_id');
            $table->foreign('employment_type_id')->references('id')->on('employment_types');
            $table->unsignedTinyInteger('job_title_id');
            $table->foreign('job_title_id')->references('id')->on('job_titles');
            $table->string('work_hour')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
