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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('slug');
            $table->integer('type')->default(0)->nullable();
            $table->text('image')->default(Common::noImage);
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('show')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
