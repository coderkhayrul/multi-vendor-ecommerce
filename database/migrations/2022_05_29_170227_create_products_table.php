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
            $table->bigIncrements('id');
            $table->integer('vendor_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_price');
            $table->string('product_discount')->nullable();
            $table->string('product_discount_price')->nullable();
            $table->string('product_short_des')->nullable();
            $table->string('product_long_des')->nullable();
            $table->string('product_thumbnails')->nullable();
            $table->string('product_quantity');
            $table->string('product_status');
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
