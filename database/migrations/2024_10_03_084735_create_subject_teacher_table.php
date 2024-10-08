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
            $table->uuid('id')->primary();
            $table->uuid('school_id');
            $table->uuid('teacher_id');
            $table->uuid('class_id');
            $table->uuid('stream_id');
            $table->uuid('subject_id');
            $table->integer('year')->nullable();
            $table->string('term')->nullable();
            $table->uuid('school_subject_id');
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('stream_id')->nullable()->references('id')->on('streams')->onDelete('cascade');
            $table->foreign('subject_id')->nullable()->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('school_subject_id')->nullable()->references('id')->on('school_subjectS')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subject_teacher', function (Blueprint $table) {
            $table->dropForeign(['school_id']);
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['class_id']);
            $table->dropForeign(['stream_id']);
            $table->dropForeign(['subject_id']);
            $table->dropForeign(['school_subject_id']);
        });
        Schema::dropIfExists('subject_teacher');
    }
};
