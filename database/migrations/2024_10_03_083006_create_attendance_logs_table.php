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
            $table->id();
            $table->tinyInteger('status');
            $table->date('date');
            $table->integer('pupil_id');
            $table->foreignId('stream_id')->references('id')->on('streams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendence_logs');
    }
};
