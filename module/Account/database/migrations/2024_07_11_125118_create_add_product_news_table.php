<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddProductNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {


            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('model_id')->references('id')->on('product_models');
            $table->foreign('brand_id')->references('id')->on('product_brands');

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
