<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequsitionStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('requsition_stocks')) {
            Schema::create('requsition_stocks', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('product_id')->nullable();
                $table->timestamp('date')->nullable();
                $table->string('type')->nullable();
                $table->integer('source_id')->nullable();
                $table->string('source_number')->nullable();
                $table->decimal('debit_qty', 15, 3)->default(0.000);
                $table->decimal('credit_qty', 15, 3)->default(0.000);
                $table->decimal('debit_rate', 15, 3)->default(0.000);
                $table->decimal('credit_rate', 15, 3)->default(0.000);
    
                $table->unsignedBigInteger('created_by');
                $table->unsignedBigInteger('updated_by')->nullable();
    
                $table->foreign('product_id')->references('id')->on('products');
                $table->foreign('created_by')->references('id')->on('users');
                $table->foreign('updated_by')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requsition_stocks');
    }
}
