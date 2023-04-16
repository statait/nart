<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');

            $table->string('product_name');
          
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags');

            $table->string('product_size')->nullable();

            $table->string('product_color');

            
            $table->string('selling_price');

            $table->string('discount_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('short_descp');

            $table->string('long_descp');

            $table->string('product_thambnail');
            $table->integer('new')->nullable();
            $table->integer('sale')->nullable();
            $table->integer('best_seller')->nullable();

            $table->integer('status')->default(0);

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
};
