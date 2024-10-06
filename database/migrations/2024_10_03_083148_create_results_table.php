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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('score');
            $table->string('remark');
            $table->string('pupil_reg_number');
            $table->char('grade', 1);
            $table->foreignId('exam_id')->references('id')->on('exams');
            $table->foreignId('subject_stream_id')->references('id')->on('subject_streams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
