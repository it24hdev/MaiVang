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
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default(1);
            $table->string('url_key')->nullable();
            $table->string('default_short_url')->nullable();
            $table->string('redirect_url')->nullable();
            $table->dateTime('activated_at')->default(now())->nullable();
            $table->dateTime('deactivated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_urls');
    }
};
