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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('service_id'); // Primary key: service_id
            $table->unsignedBigInteger('customer_id'); // Foreign key: customer_id
            $table->boolean('body_wash')->default(false); // Boolean for body wash service
            $table->boolean('repair_service')->default(false); // Boolean for repair service
            $table->date('date'); // Date of the service
            $table->time('time'); // Time of the service
            $table->timestamps();

            // Define foreign key constraint for customer_id (assuming customers table exists)
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
