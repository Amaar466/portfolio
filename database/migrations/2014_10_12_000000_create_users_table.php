<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->boolean('is_superuser');
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->boolean('is_staff');
            $table->boolean('is_active');
            $table->dateTime('date_joined');
            $table->string('phoneNo')->nullable();
            $table->text('gender');
            $table->date('dateOfBirth')->nullable();
            $table->string('profilePhoto')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->text('bio')->nullable();
            $table->string('role')->nullable();
            $table->string('skills')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
