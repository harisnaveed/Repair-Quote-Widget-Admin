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

            // User who performed the action
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Optional multi-tenant tracking
            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete();

            $table->foreignId('location_id')
                ->nullable()
                ->constrained('locations')
                ->nullOnDelete();

            // Action information
            $table->string('action')->nullable();
            // examples:
            // created, updated, deleted, restored

            $table->string('action_label')->nullable();
            // examples:
            // "Updated iPhone 16 pricing"

            $table->string('module')->nullable();
            // examples:
            // products, repairs, customers, leads

            // Polymorphic relation
            $table->nullableMorphs('entity');
            // entity_type
            // entity_id

            // Store old/new values
            $table->json('changes')->nullable();

            // Human readable description
            $table->text('description')->nullable();

            // Request/System info
            $table->ipAddress('ip_address')->nullable();

            $table->text('user_agent')->nullable();

            $table->string('browser')->nullable();

            $table->string('platform')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('action');

            $table->index('module');

            $table->index([
                'company_id',
                'location_id',
            ]);

            $table->index([
                'created_at',
            ]);
        });

        Schema::create('system_logs', function (Blueprint $table) {

            $table->id();

            // Optional tenant tracking
            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete();

            $table->foreignId('location_id')
                ->nullable()
                ->constrained('locations')
                ->nullOnDelete();

            // Log severity
            $table->string('level')->nullable();
            // info, warning, error, critical

            // Main message
            $table->text('message')->nullable();

            // Exception/System context
            $table->json('context')->nullable();

            // Additional metadata
            $table->json('extra')->nullable();

            // Exception details
            $table->longText('trace')->nullable();

            $table->string('file')->nullable();

            $table->integer('line')->nullable();

            // Request info
            $table->ipAddress('ip_address')->nullable();

            $table->text('user_agent')->nullable();

            $table->string('url')->nullable();

            $table->string('method')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('level');

            $table->index([
                'company_id',
                'location_id',
            ]);

            $table->index([
                'created_at',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_logs');

        Schema::dropIfExists('activity_logs');
    }
};
