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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->foreignId('student_id')->constrained('students','id');
            $table->foreignId('course_id')->constrained('courses','id');
            $table->foreignId('assignment_id')->constrained('assignments','id');
            $table->foreignId('exam_id')->constrained('exams','id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
