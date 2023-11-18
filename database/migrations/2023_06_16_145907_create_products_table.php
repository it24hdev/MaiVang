<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Admin\Http\Helpers\Common;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('slug');
            $table->decimal('cost',13,2)->nullable();
            $table->decimal('price',13,2)->nullable();
            $table->decimal('price_market',13,2)->nullable();
            $table->string('price_range')->nullable();
            $table->text('image')->default(Common::noImage);
            $table->integer('user_id')->nullable();
            $table->boolean('show')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
