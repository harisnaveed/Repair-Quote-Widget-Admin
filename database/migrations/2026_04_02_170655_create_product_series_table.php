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
        Schema::create('product_series', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            // Self Reference for Parent Series
            $table->foreignId('parent_id')->nullable()->constrained('product_series')->nullOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('icon', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('position');

            $table->index('is_active');
            $table->index(['brand_id', 'parent_id', 'is_active']);
            // Prevent duplicate series inside same brand
            $table->unique(['brand_id', 'slug']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_series');
    }
};
