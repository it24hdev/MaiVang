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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('phone');
            $table->dateTime('birthday')->nullable();
            $table->integer('gender')->default(0);
            $table->string('email')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('address')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_tax_code')->nullable();
            $table->string('company_address')->nullable();
            $table->string('note')->nullable();
            $table->text('image')->default(Common::noImage);
            $table->timestamps();
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
