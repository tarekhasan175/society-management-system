<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvBillGeneratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_bill_generates', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('billingID')->nullable();
            $table->string('billNo')->nullable();

            $table->unsignedBigInteger('year_id')->nullable();
            $table->json('month_id')->nullable();

            $table->unsignedBigInteger('road_id')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->unsignedBigInteger('plot_id')->nullable();
            $table->unsignedBigInteger('flat_id')->nullable();
            $table->unsignedBigInteger('usage_type_id')->nullable();

            $table->string('block')->nullable();
            $table->string('road')->nullable();
            $table->string('plotID')->nullable();
            $table->string('flats')->nullable();
            $table->string('units')->nullable();
            $table->string('usageTypeTitle')->nullable();
            $table->string('usageType')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('monthlyDue')->nullable();
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
        Schema::dropIfExists('adv_bill_generates');
    }
}
