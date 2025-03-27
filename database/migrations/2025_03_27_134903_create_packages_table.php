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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Free, Basic, Advanced, Premium
            $table->decimal('price', 10, 2)->default(-1.00); // -1 means custom pricing
            $table->enum('billing_cycle', ['monthly', 'yearly']); // Subscription type
            $table->text('description')->nullable();
            $table->text('button_text')->nullable();
            $table->string('currency')->default('AED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
