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
            $table->integer('stock'); // Stock quantity of the spare part
            $table->text('description')->nullable(); // Spare part description (optional)
            $table->timestamps();
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
