<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_name')->unique();
            $table->string('product_slug')->unique();
            $table->string('product_code')->unique();
            $table->string('product_quantity');
            $table->string('selling_price');
            $table->string('discount_type')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('price_active')->nullable();
            $table->string('video_link')->nullable();
            $table->longText('product_description')->nullable();
            
            $table->string('main_slider')->nullable();
            $table->string('hot_deal')->nullable();
            $table->string('best_rated')->nullable();
            $table->string('mid_slider')->nullable();
            $table->string('hot_new')->nullable();
            $table->string('trend_product')->nullable();

            $table->string('default_image')->nullable();
            $table->string('sub_image_one')->nullable();
            $table->string('sub_image_two')->nullable();

            $table->string('status')->nullable()->comment('1 = active, 2 = inactive');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
