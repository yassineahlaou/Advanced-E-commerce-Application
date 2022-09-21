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
            $table->integer('sub_category_id');
            $table->integer('sub_sub_category_id');
            $table->string('product_name_en');
            $table->string('product_name_fr');
            $table->string('product_name_fr');
            $table->float('average_rating',5,1)->nullable();
            $table->unsignedBigInteger('total_review')->default(0);
            
            $table->string('product_slug_en');
            $table->string('product_slug_fr');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_fr');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_fr')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_fr');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
             $table->string('short_desc_en');
             $table->string('short_desc_fr');
             $table->string('long_desc_en');
             $table->string('long_desc_fr');
             $table->string('product_thumbnail');
             $table->integer('hot_deal')->nullable();
             $table->integer('featured')->nullable();
             $table->integer('sprecial_offer')->nullable();
             $table->integer('speacial_deal')->nullable();
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
