<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagorikRoadAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_road_adds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nagorik_block_id');
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('nagorik_block_id')->references('id')->on('nagorik_blocks');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nagorik_road_adds');
    }
}
