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
        Schema::create('lead_item_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_item_id')->constrained('lead_items')->cascadeOnDelete();
            $table->foreignId('repair_issue_id')->nullable()->constrained('repair_issues')->nullOnDelete();
            $table->string('repair_issue_name')->nullable();
            $table->decimal('price', 10, 2)->default(0.00)->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->unique(['lead_item_id', 'repair_issue_id'], 'lead_item_repair_issue_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_item_repair_issues');
    }
};
