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
            $table->id();
            $table->string('school_name');
            $table->string('school_registration_number');
            $table->string('school_phone_number');
            $table->string('school_email');
            $table->string('postal_address');
            $table->string('type');
            $table->string('level');
            $table->string('logo')->nullable();
            $table->string('motto')->nullable();
            $table->string('contract_number')->nullable();
            $table->string('status')->default('active');
            $table->integer('ward_id');
            $table->integer('district_id');
            $table->integer('region_id');
            $table->string('street');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('teacher_email');
            $table->string('phone_number');
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
