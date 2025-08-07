<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagorikBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nagorik_sector_id');
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('nagorik_sector_id')->references('id')->on('nagorik_sectors');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nagorik_blocks');
    }
}
