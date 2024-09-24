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
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->string('name'); // Service provider's name
            $table->string('address'); // Service provider's address
            $table->string('tel_no'); // Telephone number
            $table->string('email')->unique(); // Email address (unique)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_providers');
    }
};
