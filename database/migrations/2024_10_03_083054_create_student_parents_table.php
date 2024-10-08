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
        Schema::create('student_parents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('pupil_registration_number');
            $table->boolean('payment_status')->default(false);
            $table->string('term');
            $table->uuid('pupil_id');
            $table->uuid('parent_id');
            $table->timestamps();

            $table->foreign('pupil_id')->references('id')->on('pupils')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_parents', function (Blueprint $table) {
            $table->dropForeign(['pupil_id']);
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('student_parents');
    }
};
