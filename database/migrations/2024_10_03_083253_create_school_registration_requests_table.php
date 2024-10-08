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
        Schema::create('school_registration_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('school_name')->unique();
            $table->string('school_registration_number')->unique();
            $table->string('school_phone_number')->unique();
            $table->string('school_email')->unique();
            $table->string('postal_address')->unique();
            $table->string('type');
            $table->string('level');
            $table->string('logo')->nullable();
            $table->string('motto')->nullable();
            $table->string('contract_number')->nullable()->unique();
            $table->string('status')->default('active');
            $table->foreignId('ward_id')->constrained('wards');
            $table->foreignId('district_id')->constrained('districts');
            $table->foreignId('region_id')->constrained('regions');
            $table->string('street');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('teacher_email')->unique();
            $table->string('phone_number')->unique();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_registration_requests');
    }
};
