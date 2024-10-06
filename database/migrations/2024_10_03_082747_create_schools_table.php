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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('ward_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('region_id');
            $table->string('street');
            $table->string('email')->unique()->nullable();
            $table->string('logo')->nullable();
            $table->string('motto')->nullable();
            $table->string('phone_number')->unique();
            $table->string('level');
            $table->string('type')->nullable();
            $table->string('school_number')->unique();
            $table->string('contact_person')->unique();
            $table->string('corporate_color')->nullable();
            $table->string('school_registration_no')->unique();
            $table->string('contract_number')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('ward_id')->references('id')->on('wards');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
