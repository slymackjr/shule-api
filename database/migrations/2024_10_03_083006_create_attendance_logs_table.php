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
        Schema::create('attendence_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->tinyInteger('status');
            $table->date('date');
            $table->integer('pupil_id');
            $table->uuid('stream_id');
            $table->timestamps();

            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendence_logs', function (Blueprint $table) {
            $table->dropForeign(['stream_id']);
        });
        Schema::dropIfExists('attendence_logs');
    }
};
