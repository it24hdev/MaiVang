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
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->string('product_image_sm')->nullable();
            $table->string('product_image_md')->nullable();
            $table->string('product_image_lg')->nullable();
            $table->boolean('product_image_license')->default(0)->nullable();
            $table->boolean('product_image_type')->default(0)->nullable();
            $table->string('post_image_sm')->nullable();
            $table->string('post_image_md')->nullable();
            $table->string('post_image_lg')->nullable();
            $table->boolean('post_image_license')->default(0)->nullable();
            $table->boolean('post_image_type')->default(0)->nullable();
            $table->string('email_general')->default('contact@it24h.vn');
            $table->string('email_receive_order')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('config_mail_mailer')->default('smtp')->nullable();
            $table->string('config_mail_host')->default('smtp.yandex.com')->nullable();
            $table->string('config_mail_port')->default('587')->nullable();
            $table->string('config_mail_username')->default('contact@it24h.vn')->nullable();
            $table->string('config_mail_password')->default('It24hvn@1')->nullable();
            $table->string('config_mail_encryption')->default('tls')->nullable();
            $table->string('config_mail_from_name')->default('IT24H')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_description')->nullable();
            $table->longText('about_us')->nullable();
            $table->longText('contact_us')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systems');
    }
};
