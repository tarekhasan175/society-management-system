<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagoriHoldinTexRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagori_holdin_tex_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nagorik_region_id');
            $table->unsignedBigInteger('nagorik_land_type_id');
            $table->string('holding_fee')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('nagorik_region_id')->references('id')->on('city_area_adds');
            $table->foreign('nagorik_land_type_id')->references('id')->on('nagorik_land_types');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nagori_holdin_tex_rates');
    }
}
