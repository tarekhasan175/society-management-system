<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->id();
            $table->string("roadID")->nullable();
            $table->string("roadName")->nullable();
            $table->unsignedBigInteger('block_name_id')->nullable();;

            $table->string("blockName")->nullable();

            $table->unsignedBigInteger('money_collector_name_id')->nullable();;

            $table->string("moneyCollectorName")->nullable();
            $table->timestamps();

            $table->foreign('block_name_id')->references('id')->on('blocks');
            $table->foreign('money_collector_name_id')->references('id')->on('money_collectors');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roads');
    }
}
