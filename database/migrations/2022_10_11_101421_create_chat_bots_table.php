<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_providers', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('platform')->default(1); // ['', 'line', 'telegram']
            $table->string('name')->unique();
            $table->text('configs');
            $table->timestamps();
        });

        Schema::create('social_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedSmallInteger('social_provider_id');
            $table->string('profile_id', 50)->index();
            $table->text('profile');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('chat_bots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('callback_token', 64)->unique();
            $table->unsignedSmallInteger('social_provider_id');
            $table->unsignedSmallInteger('user_count')->default(0);
            $table->index(['user_count', 'social_provider_id']);
            $table->text('configs'); // encrypted array
            $table->timestamps();
        });

        Schema::create('chat_bot_user', function (Blueprint $table) {
            $table->primary(['user_id', 'chat_bot_id']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('chat_bot_id');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('chat_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('chat_bot_id');
            $table->unsignedTinyInteger('mode')->default(1); // ['', 'push', 'read', 'reply']
            $table->index(['user_id', 'chat_bot_id', 'mode']);
            $table->jsonb('payload');
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
