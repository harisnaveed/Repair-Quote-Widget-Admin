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
        Schema::table('device_location', function (Blueprint $table) {
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
        Schema::table('device_location', function (Blueprint $table) {
            $table->dropColumn(['status', 'position']);
        });
    }
};
