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
        Schema::create('service_managers', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->string('fname'); // First name
            $table->string('lname'); // Last name
            $table->string('email')->unique(); // Email address (unique)
            $table->string('telephone'); // Telephone number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_managers');
    }
};
