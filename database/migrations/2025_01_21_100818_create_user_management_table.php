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
        Schema::create('user_management', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the user
            $table->string('email')->unique(); // Email address, must be unique
            $table->string('password'); // Password for user authentication
            $table->enum('status', ['admin', 'subadmin', 'manager', 'user', 'guest']); // User role/status
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_management');
    }
};
