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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);       // Brand name
            $table->string('slug');       // Slug for URL-friendly identifiers
            $table->string('icon', 255)->nullable(); // Icon path or URL (optional)
            $table->foreignId('location_id')->nullable()->constrained('locations')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /***
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
