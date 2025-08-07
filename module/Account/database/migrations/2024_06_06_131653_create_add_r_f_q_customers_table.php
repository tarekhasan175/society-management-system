<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddRFQCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rfq_customers', function (Blueprint $table) {
            $table->unsignedBigInteger('acc_customer_id')->nullable();
            $table->foreign('acc_customer_id')->references('id')->on('acc_customers')->onDelete('CASCADE');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfq_customers');
    }
}
