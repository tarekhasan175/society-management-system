<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagorikUserPermanentAddressDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_user_permanent_address_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('post_code')->nullable();
            $table->string('village')->nullable();
            $table->string('road_no')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('details')->nullable();
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
        Schema::dropIfExists('nagorik_user_permanent_address_details');
    }
}
