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
        Schema::create('location_repair_issue', function (Blueprint $table) {
            $table->foreignId('location_id')->constrained()->cascadeOnDelete();
            $table->foreignId('repair_issue_id')->constrained()->cascadeOnDelete();
            $table->primary(['location_id', 'repair_issue_id']);
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
        Schema::dropIfExists('location_repair_issue');
    }
};
