<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('client_company_id')->nullable();
            $table->unsignedBigInteger('rfq_customers_id')->nullable();
            $table->string('invoice')->nullable();
            $table->string('file')->nullable();
            $table->text('description')->nullable();
            $table->string('serial')->nullable();
            $table->string('date')->nullable();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('acc_customers')->onDelete('CASCADE');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('client_company_id')->references('id')->on('client_compays')->onDelete('CASCADE');
            $table->foreign('rfq_customers_id')->references('id')->on('rfq_customers')->onDelete('CASCADE');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_accounts');
    }
}
