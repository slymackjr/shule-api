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
        Schema::create('subject_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->references('id')->on('schools');
            $table->foreignId('teacher_id')->references('id')->on('teachers');
            $table->foreignId('class_id')->references('id')->on('classes');
            $table->foreignId('stream_id')->nullable()->references('id')->on('streams');
            $table->foreignId('subject_id')->nullable()->references('id')->on('subjects');
            $table->integer('year')->nullable();
            $table->string('term')->nullable();
            $table->foreignId('school_subject_id')->nullable()->references('id')->on('school_subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_subject');
    }
};
