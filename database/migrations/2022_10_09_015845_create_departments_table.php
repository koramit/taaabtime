<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', 60)->unique();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        \App\Models\Department::query()->create(['name' => 'ไม่ระบุ']);
    }

    public function down(): void
    {
    }
};
