<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseOrBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_or_building', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('road_id')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->unsignedBigInteger('plot_id')->nullable();
            $table->unsignedBigInteger('usage_type_id')->nullable();

            $table->string('roadID')->nullable();
            $table->string('plotID')->nullable();
            $table->string('plotName')->nullable();
            $table->string('houseOrBuildingName')->nullable();
            $table->string('houseOrBuildingId')->nullable();
            $table->string('storey')->nullable();
            $table->string('totalFlat')->nullable();

            $table->timestamps();

            $table->foreign('block_id')->references('id')->on('blocks');
            $table->foreign('road_id')->references('id')->on('roads');
            $table->foreign('plot_id')->references('id')->on('plots');
            $table->foreign('usage_type_id')->references('id')->on('usage_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_or_building');
    }
}
