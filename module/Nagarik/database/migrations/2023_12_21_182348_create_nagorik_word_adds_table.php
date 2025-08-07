<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagorikWordAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_word_adds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_area_id');
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('city_area_id')->references('id')->on('city_area_adds');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nagorik_word_adds');
    }
}
