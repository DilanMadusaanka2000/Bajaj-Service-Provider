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
                $table->unsignedBigInteger('customer_id'); // Foreign key: customer_id
                $table->string('address'); // Shipping address
                $table->string('postalcode'); // Postal code
                $table->string('sparepart_name');
                $table->string('status'); // Spare part name
                $table->unsignedBigInteger('spareParts_id'); // Foreign key: spareParts_id
                $table->timestamps();

                // Foreign key constraint for customer_id (assuming customers table exists)
                $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');

                // Foreign key constraint for spareParts_id (assuming spare_parts table exists)
                $table->foreign('spareParts_id')->references('spareParts_id')->on('spare_parts')->onDelete('cascade');
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
