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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customerID');
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->date('birthDate')->nullable();
            $table->string('phoneNumber', 20)->nullable();
            $table->decimal('amountPurchased', 8, 2)->nullable();
            $table->timestamps();

            // Add indexes
            $table->index('customerID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
