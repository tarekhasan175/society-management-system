<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagoriLicenceFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('nagori_licence_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('financial_year_id');
            $table->unsignedBigInteger('nagorik_business_type_id');
            $table->string('l_fee')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('financial_year_id')->references('id')->on('financial_years');
            $table->foreign('nagorik_business_type_id')->references('id')->on('nagorik_business_types');


        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nagori_licence_fees');
    }
}
