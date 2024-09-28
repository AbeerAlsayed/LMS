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
        Schema::create('assignments', function (Blueprint $table) {
            Schema::create('assignments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
                $table->foreignId('course_id')->constrained()->onDelete('cascade');
                $table->string('title');        // The title of the assignment
                $table->text('description');    // A brief description of the assignment
                $table->date('due_date');       // The due date for the assignment
                $table->timestamps();
            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
