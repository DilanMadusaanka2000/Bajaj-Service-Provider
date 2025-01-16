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
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id('spareParts_id'); // Primary key: spareParts_id
            $table->string('name'); // Spare part name
            $table->string('category'); // Spare part category
            $table->decimal('price', 10, 2); // Spare part price with two decimal places
            $table->decimal('discount', 10, 2)->nullable(); // Optional discount
            $table->integer('stock'); // Stock count
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Optional description
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_parts');
    }
};
