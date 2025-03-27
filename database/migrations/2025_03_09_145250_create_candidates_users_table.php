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
        Schema::create('candidates_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('resume')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->string('portfolio_website')->nullable();

            $table->json('skills')->nullable();  // Change 'tags' column to JSON
            $table->json('languages')->nullable();  // Change 'tags' column to JSON

            $table->string('education')->nullable();
            $table->text('experience')->nullable();

            $table->json('interests')->nullable();

            $table->string('cover_letter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates_users');
    }
};
