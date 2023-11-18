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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('quantity')->default(1)->nullable();
            $table->decimal('price',13,2)->default(0.00)->nullable();
            $table->decimal('discount',13,2)->default(0.00)->nullable();
            $table->decimal('total',13,2)->default(0.00)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
