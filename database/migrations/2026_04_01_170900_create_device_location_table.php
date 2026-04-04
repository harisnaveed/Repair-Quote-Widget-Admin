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
        Schema::create('device_location', function (Blueprint $table) {
            $table->foreignId('device_id')->constrained()->cascadeOnDelete();
            $table->foreignId('location_id')->constrained()->cascadeOnDelete();
            $table->primary(['device_id', 'location_id']);
            $table->enum('status', ['active', 'in_active'])->default('active');
            $table->integer('position');

            // Indexes
            $table->index('status');
            $table->index(['location_id', 'status']); // best for filtering
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_location');
    }
};
