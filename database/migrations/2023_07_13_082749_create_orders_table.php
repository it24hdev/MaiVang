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
            $table->id();
            $table->string('code');
            $table->integer('customer_id');
            $table->decimal('total',13,2)->default(0.00)->nullable();
            $table->decimal('discount_order',13,2)->default(0.00)->nullable();
            $table->integer('status')->default(0);
            $table->integer('status_payment')->default(1);
            $table->integer('user_id')->nullable();
            $table->text('note')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
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
