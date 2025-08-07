<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('plotID')->nullable();
            $table->string('plotName')->nullable();
            $table->string('storey')->nullable();
            $table->string('totalFlat')->nullable();
            $table->unsignedBigInteger('road_id')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->string('roadName')->nullable();
            $table->text('ownername')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('block_id')->references('id')->on('blocks');
            $table->foreign('road_id')->references('id')->on('roads');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plots');
    }
}
