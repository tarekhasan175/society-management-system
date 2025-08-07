<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountyearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountyear', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fromDate')->nullable();
            $table->dateTime('toDate')->nullable();
            $table->string('sessionName')->nullable();
            $table->tinyInteger('lock')->nullable();
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
        Schema::dropIfExists('accountyear');
    }
}
