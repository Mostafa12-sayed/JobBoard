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
        Schema::table('employees_users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable()->after('address');
            $table->string('background_image')->nullable()->after('profile_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees_users', function (Blueprint $table) {
            $table->dropColumn('profile_picture');
            $table->dropColumn('background_image');
        });
    }
};
