<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_bills', function (Blueprint $table) {
            $table->id();
            $table->string('billingID')->nullable();
            $table->string('billNo')->nullable();

            $table->unsignedBigInteger('year_id')->nullable();
            $table->unsignedBigInteger('month_id')->nullable();

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

            $table->foreign('flat_id')->references('id')->on('flats');
            $table->foreign('usage_type_id')->references('id')->on('usage_types');
            $table->foreign('plot_id')->references('id')->on('plots');
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->foreign('road_id')->references('id')->on('roads');

            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('month_id')->references('id')->on('months');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generate_bills');
    }
}
