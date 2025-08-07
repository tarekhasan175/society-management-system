<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerateSingleBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_single_bills', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('billingID')->nullable();
            $table->string('billNo')->nullable();

            $table->unsignedBigInteger('year_id')->nullable();
            $table->unsignedBigInteger('month_id')->nullable();

            $table->unsignedBigInteger('road_id')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->unsignedBigInteger('plot_id')->nullable();
            // $table->unsignedBigInteger('flat_id')->nullable();

            $table->integer('total_amount')->nullable();
            $table->integer('total_monthlyDue')->nullable();
            $table->integer('payment_status')->default(0);
            
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
        Schema::dropIfExists('generate_single_bills');
    }
}
