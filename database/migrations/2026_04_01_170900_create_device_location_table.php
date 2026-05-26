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
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();
            $table->primary(['device_id', 'location_id']);
            $table->boolean('is_active')->default(true);
            $table->integer('position');

            // Indexes
            $table->index('is_active');
            $table->index(['location_id', 'is_active']); // best for filtering
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
