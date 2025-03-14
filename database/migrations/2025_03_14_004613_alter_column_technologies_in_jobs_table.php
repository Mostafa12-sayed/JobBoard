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
        Schema::table('jobs_table', function (Blueprint $table) {
            $table->json('technologies')->nullable()->change();  // Change 'tags' column to JSON

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs_table', function (Blueprint $table) {
            $table->string('technologies')->change();
        });
    }
};
