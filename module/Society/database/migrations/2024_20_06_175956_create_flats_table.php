<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plotID')->nullable();
            $table->string('flatID')->nullable();
            $table->string('flatName')->nullable();

            $table->unsignedBigInteger('road_id')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->unsignedBigInteger('plot_id')->nullable();
            $table->unsignedBigInteger('house_Building_id')->nullable();
            $table->unsignedBigInteger('usage_type_id')->nullable();


            $table->string('blockName')->nullable();
            $table->string('roadName')->nullable();
            $table->string('plotName')->nullable();
            $table->string('plotOwner')->nullable();



            $table->string('storey')->nullable();
            $table->string('totalUnit')->nullable();
            $table->string('remark')->nullable();
            $table->string('unitName')->nullable();

            $table->string('ownerName')->nullable();
            $table->string('ownerContactNo1')->nullable();
            $table->string('ownerContactNo2')->nullable();
            $table->string('ownerMailAddress')->nullable();
            $table->string('ownerPresentAddress')->nullable();
            $table->string('tenantName')->nullable();
            $table->string('tenantContactNo')->nullable();
            $table->string('tenantParmanentAddress')->nullable();
            $table->string('typeName')->nullable();
            $table->integer('amount')->nullable();
            $table->text('remarks')->nullable();
            $table->string('societyMemberId')->nullable();
            $table->integer('totalDue')->nullable();
            $table->integer('advance')->nullable();
            $table->timestamps();


            $table->foreign('usage_type_id')->references('id')->on('usage_types');

            $table->foreign('plot_id')->references('id')->on('plots');
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->foreign('road_id')->references('id')->on('roads');
            $table->foreign('house_Building_id')->references('id')->on('house_or_building');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
