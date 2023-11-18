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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('redirect')->nullable();
            $table->integer('order_number')->default(0)->nullable();
            $table->text('image_mobile')->default(Common::noImage);
            $table->text('image_web')->default(Common::noImage);
            $table->integer('position_id')->default(0)->nullable();
            $table->boolean('show')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
