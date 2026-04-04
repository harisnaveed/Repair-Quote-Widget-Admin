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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // The user who performed the action, if applicable
            $table->string('action')->nullable(); // 'created', 'updated', 'deleted', 'restored'
            $table->string('action_label')->nullable(); // Added iPhone 16 to BMR Orlando"
            $table->string('entity_type')->nullable(); // Table name or model class name of the affected entity
            $table->unsignedBigInteger('entity_id')->nullable(); // ID of the affected entity
            $table->json('changes')->nullable(); // JSON field to store the changes made (old and new values)
            $table->string('description')->nullable(); // Optional field to provide a human-readable description of the activity
            $table->string('ip_address')->nullable(); // IP address of the user who performed the action
            $table->timestamp('created_at')->useCurrent(); // Timestamp of when the activity occurred

            $table->index(['entity_type', 'entity_id']); // Index for faster lookups based on entity type and ID
            $table->index(['user_id']); // Index for faster lookups based on user ID
            $table->index(['created_at']); // Index for faster lookups based on timestamp
            $table->index(['action']); // Index for faster lookups based on action type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
