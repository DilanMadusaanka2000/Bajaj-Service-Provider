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
        Schema::create('vehicle_miantains', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('vehicle_type');
            $table->string('vehicle_name');
            $table->string('vehicle_number');
            $table->text('maintenance_services')->nullable(); // To store selected maintenance checkboxes
            $table->string('wash_type')->nullable(); // To store the selected vehicle wash type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_miantains');
    }
};
