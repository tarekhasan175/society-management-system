<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqJobNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfq_job_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('client_company_id')->nullable();
            $table->unsignedBigInteger('rfq_customers_id')->nullable();
            $table->unsignedBigInteger('po_accounts_id')->nullable();
            $table->string('date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->decimal('amount', 20, 2)->default(0);
            $table->decimal('discount_amount', 20, 2)->default(0);
            $table->decimal('discount_percentage', 20, 2)->default(0);
            $table->decimal('total_amount', 20, 2)->default(0);
            $table->timestamps();

            $table->foreign('po_accounts_id')->references('id')->on('po_accounts')->onDelete('CASCADE');
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
        Schema::dropIfExists('rfq_job_numbers');
    }
}
