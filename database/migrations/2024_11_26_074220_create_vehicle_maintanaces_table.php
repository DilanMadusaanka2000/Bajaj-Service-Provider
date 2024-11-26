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
        Schema::create('vehicle_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('vehicle_type');
            $table->string('vehicle_name');
            $table->string('vehicle_number');
            $table->boolean('oil_change')->default(false);
            $table->boolean('tire_replacement')->default(false);
            $table->boolean('brake_services')->default(false);
            $table->boolean('fluid_checks')->default(false);
            $table->boolean('oil_filter_replacement')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_maintenances');
    }
};
