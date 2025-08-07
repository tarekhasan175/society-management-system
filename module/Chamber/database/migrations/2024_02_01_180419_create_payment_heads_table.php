<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('PaymentHeadName', 50)->nullable();
            $table->string('PaymentHeadDescription', 2000)->nullable();
            $table->string('PaymentType', 50)->nullable();
            $table->tinyInteger('IsActive')->nullable();
            $table->unsignedBigInteger('LastEntryBy')->nullable();
            $table->dateTime('LastEntryDate')->nullable();
            $table->tinyInteger('IsMandatory')->nullable();
            $table->tinyInteger('IsOld')->nullable();
            $table->tinyInteger('IsNew')->nullable();
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
        Schema::dropIfExists('payment_heads');
    }
}
