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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id'); // Primary key: service_id
            $table->unsignedBigInteger('customer_id'); // Foreign key: customer_id
            $table->boolean('body_wash')->default(false); // Service: body wash (true/false)
            $table->boolean('repair_service')->default(false); // Service: repair service (true/false)
            $table->date('date'); // Service date
            $table->time('time'); // Service time
            $table->timestamps();

            // Define foreign key constraint for customer_id (assuming customers table exists)
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
