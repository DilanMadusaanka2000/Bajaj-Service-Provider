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
        Schema::create('maintain_times', function (Blueprint $table) {
            $table->id();
           // $table->unsignedBigInteger('maintain_id'); // Foreign key
            $table->string('vehicle_number'); // Vehicle number
            $table->date('date'); // Selected date
            $table->string('time_slot'); // Selected time slot
            $table->timestamps();

            // Foreign key constraint
           // $table->foreign('maintain_id')->references('id')->on('vehicle_maintains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintain_times');
    }
};
