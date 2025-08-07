<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year_id')->nullable();
            $table->string('membercategory_id')->nullable();
            $table->string('select')->nullable();
            $table->string('paymenthead_id')->nullable();
            $table->string('LastPaymentDate')->nullable();
            $table->string('Amount')->nullable();
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
        Schema::dropIfExists('assign_fees');
    }
}
