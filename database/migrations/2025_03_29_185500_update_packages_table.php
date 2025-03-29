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
        Schema::table('packages', function (Blueprint $table) {
            $table->decimal('monthly_price', 10, 2)->after('name')->nullable();
            $table->decimal('yearly_price', 10, 2)->after('monthly_price')->nullable();
            $table->dropColumn(['price', 'billing_cycle']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->after('name')->nullable();
            $table->string('billing_cycle')->after('price')->nullable();
            $table->dropColumn(['monthly_price', 'yearly_price']);
        });
    }
};
