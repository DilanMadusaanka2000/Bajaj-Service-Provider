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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id'); // Primary key: customer_id
            $table->string('name'); // Customer name
            $table->string('email')->unique(); // Customer email (must be unique)
            $table->string('address'); // Customer address
            $table->string('telephone'); // Customer telephone
            $table->string('vehicle_no'); // Customer vehicle number
            $table->string('model'); // Vehicle model
            $table->text('details')->nullable(); // Additional details (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
