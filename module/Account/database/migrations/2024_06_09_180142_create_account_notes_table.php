<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->text('name')->nullable();
            $table->text('date')->nullable();
            $table->text('description')->nullable();
            $table->text('quote_number')->nullable();
            $table->text('po_number')->nullable();
            $table->text('job_number')->nullable();
            $table->text('work_done_by')->nullable();
            $table->text('quantity')->nullable();
            $table->text('units_price')->nullable();
            $table->text('total_price')->nullable();
            $table->text('total_cost')->nullable();
            $table->text('job_report')->nullable();
            $table->text('bill_number')->nullable();
            $table->text('bill_amount')->nullable();
            $table->text('paid_amount')->nullable();
            $table->decimal('debit', 20, 2)->default(0);
            $table->decimal('credit', 20, 2)->default(0);
            $table->decimal('balance', 20, 2)->default(0);
            $table->decimal('main_balance', 20, 2)->default(0);
            $table->text('debit_purpose')->nullable();
            $table->text('credits_purpose')->nullable();
            $table->text('invest_paid')->nullable();

            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('CASCADE');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_notes');
    }
}
