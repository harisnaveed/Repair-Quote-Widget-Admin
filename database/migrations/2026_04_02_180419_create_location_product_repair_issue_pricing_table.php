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
        Schema::create('location_product_repair_issue_pricing', function (Blueprint $table) {
            $table->foreignUlid('location_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('repair_issue_id')->constrained()->cascadeOnDelete();
            $table->decimal('price', 10, 2)->default(0.00)->nullable();
            $table->enum('status', ['active', 'in_active'])->default('active');
            $table->timestamps();
            $table->index(['location_id', 'product_id', 'repair_issue_id']);
            $table->index(['location_id', 'status']); // best for filtering
            $table->unique(['location_id', 'product_id', 'repair_issue_id'], 'location_product_repair_issue_unique'); // Ensure unique combinations
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_product_repair_issue_pricing');
    }
};
