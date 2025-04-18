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
        Schema::create('jobs_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('category')->cascadeOnDelete();
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->string('technologies');
            $table->enum('work_type', ['remote', 'onsite', 'hybrid']);
            $table->decimal('min_salary');
            $table->decimal('max_salary')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('slug')->unique();
            $table->enum('job_status', ['available', 'not available'])->default('available');
            $table->enum('job_type', ['full-time', 'part-time'])->default('full-time');
            $table->string('application_deadline')->nullable();
            $table->enum('applicable_status', ['open', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
