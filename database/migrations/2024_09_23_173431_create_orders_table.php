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
        // Check if the 'orders' table does not exist before creating it
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id('order_id'); // Primary key: order_id
                // $table->unsignedBigInteger('customer_id'); // Foreign key: customer_id
                $table->string('name'); // Customer's name
                $table->string('address'); // Shipping address
                $table->string('phone', 10); // Phone number (10 digits)
                $table->string('postal_code', 5); // Postal code (5 digits)
                $table->string('spare_part_name'); // Spare part name
                $table->string('status')->default('pending'); // Order status
                $table->unsignedBigInteger('spareParts_id'); // Foreign key: spare_part_id
                $table->integer('quantity')->default(1); // Quantity
                $table->timestamps();

                // Foreign key constraint for customer_id
                // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

                // // Foreign key constraint for spare_part_id
                // $table->foreign('spare_part_id')->references('id')->on('spare_parts')->onDelete('cascade');


            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
