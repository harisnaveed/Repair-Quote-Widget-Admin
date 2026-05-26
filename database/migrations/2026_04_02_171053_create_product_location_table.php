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
        Schema::create('product_location', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();

            $table->primary(['product_id', 'location_id']);
            $table->boolean('is_active')->default(true);
            $table->integer('position');

            // Indexes
            $table->index('is_active');
            $table->index(['location_id', 'is_active']); // best for filtering
            $table->timestamps();
        });
    }

    /***
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_location');
    }
};
