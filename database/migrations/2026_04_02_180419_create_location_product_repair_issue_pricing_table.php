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
        Schema::create('location_product_repair_issue_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('repair_issue_id')->constrained('repair_issues')->cascadeOnDelete();
            $table->decimal('price', 10, 2)->default(0.00)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['location_id', 'product_id', 'repair_issue_id']);
            $table->index(['location_id', 'is_active']); // best for filtering
            $table->unique(['location_id', 'product_id', 'repair_issue_id'], 'location_product_repair_issue_unique'); // Ensure unique combinations
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_product_repair_issue_pricings');
    }
};
