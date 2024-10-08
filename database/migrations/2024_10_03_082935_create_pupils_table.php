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
        Schema::create('pupils', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('full_name')->virtualAs('concat(first_name, \'  \', middle_name, \'  \', last_name)')->nullable();
            $table->string('postal')->nullable();
            $table->integer('ward_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('street')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender');
            $table->string('pupil_reg_number')->unique()->index();
            $table->date('date_birth')->nullable();
            $table->uuid('stream_id');
            $table->boolean('payment_status')->default(false);
            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pupils', function (Blueprint $table) {
            $table->dropForeign(['stream_id']);
        });
        Schema::dropIfExists('pupils');
    }
};
