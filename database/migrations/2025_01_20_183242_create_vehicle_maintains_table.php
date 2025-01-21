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
        Schema::create('vehicle_maintains', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('vehicle_type');
            $table->string('vehicle_name');
            $table->string('vehicle_number');
            $table->string('maintenance_services');
            $table->string('wash_type');
            $table->string('status')->default('active');

            $table->unsignedBigInteger('user_id')->nullable(); // Create the user_id column
            $table->foreign('user_id') // Define the foreign key
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table->date('date'); // Selected date
            $table->string('time_slot');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_maintains');
    }
};
