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
        Schema::create('learning_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('title');        // Title of the learning resource
            $table->string('type');         // Type of resource (e.g., video, pdf, link)
            $table->string('resource_url'); // URL or path to the resource
            $table->text('description')->nullable();  // Optional description of the resource
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learnings');
    }
};
