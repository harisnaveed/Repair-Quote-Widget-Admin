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
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id();
            $table->string('level')->nullable(); // Log level (e.g., 'error', 'warning', 'info')
            $table->string('message')->nullable(); // Log message
            $table->json('context')->nullable(); // JSON field to store additional context or metadata
            $table->json('extra')->nullable(); // JSON field to store additional data
            $table->string('ip_address')->nullable(); // IP address of the user who performed the action
            $table->timestamp('created_at')->useCurrent(); // Timestamp of when the log entry was created

            $table->index(['level']); // Index for faster lookups based on log level
            $table->index(['created_at']); // Index for faster lookups based on timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_logs');
    }
};
