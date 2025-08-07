<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagorikSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_sectors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nagorik_word_id');
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('nagorik_word_id')->references('id')->on('nagorik_word_adds');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nagorik_sectors');
    }
}
