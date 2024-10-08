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
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->foreignId('ward_id')->constrained('wards');
            $table->foreignId('district_id')->constrained('districts');
            $table->foreignId('region_id')->constrained('regions');
            $table->string('street');
            $table->string('email')->unique();
            $table->string('logo')->nullable();
            $table->string('motto')->nullable();
            $table->string('level');
            $table->string('type');
            $table->string('school_number')->unique();
            $table->string('corporate_color')->nullable();
            $table->string('school_registration_number')->unique();
            $table->string('contract_number')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropForeign(['ward_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['region_id']);
        });
        Schema::dropIfExists('schools');
    }
};
