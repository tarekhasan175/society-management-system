<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaySlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_slips', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no');
            $table->string('pay_month')->nullable();
            $table->string('pay_year')->nullable();
            $table->string('bill_month')->nullable();
            $table->string('bill_year')->nullable();
            $table->string('flat_id')->nullable();
            $table->decimal('current_due', 10, 2)->nullable();
            $table->decimal('charge_amount', 10, 2)->nullable();
            $table->decimal('payment_amount', 10, 2)->nullable();
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
        Schema::dropIfExists('pay_slips');
    }
}
