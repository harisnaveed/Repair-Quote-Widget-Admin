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
        Schema::create('repair_issues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');       // Slug for URL-friendly identifiers
            $table->text('description')->nullable();
            $table->string('icon', 255)->nullable(); // Icon path or URL (optional)
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('location_id')->nullable()->constrained('locations')->cascadeOnDelete();

            $table->index(['device_id', 'brand_id']);
            $table->index(['device_id', 'name']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_issues');
    }
};
