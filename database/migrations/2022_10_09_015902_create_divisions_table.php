<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 60)->unique();
            $table->boolean('active')->default(true);
            $table->unsignedTinyInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->timestamps();
        });

        \App\Models\Division::query()->create(['name' => 'ไม่ระบุ', 'department_id' => 1]);
    }

    public function down(): void
    {
    }
};
