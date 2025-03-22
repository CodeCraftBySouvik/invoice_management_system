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
        Schema::create('user_companies_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index(); // Foreign key to users table
            $table->string('company_name');
            $table->text('address');
            $table->string('area')->nullable();
            $table->string('emirates')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('logo')->nullable(); // To store the logo file path
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_companies_data');
    }
};
