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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('orderID');
            $table->unsignedBigInteger('customerID');
            $table->unsignedBigInteger('employeeID');
            $table->unsignedBigInteger('productID');
            $table->decimal('orderTotal', 8, 2)->nullable();
            $table->date('orderDate');
            $table->timestamps();

            // Add indexes
            $table->index(['customerID', 'employeeID', 'productID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
