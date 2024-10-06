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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('role')->default('teacher');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('school_registration_no');
            $table->string('password')->nullable();
            $table->string('profile_picture')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('school_registration_no')->references('school_registration_no')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
