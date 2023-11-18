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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Menu Item');
            $table->integer('parent')->default(0);
            $table->text('redirect')->nullable();
            $table->integer('depth')->default(0);
            $table->integer('position')->default(0);
            $table->integer('menu_id')->default(0);
            $table->text('html_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
