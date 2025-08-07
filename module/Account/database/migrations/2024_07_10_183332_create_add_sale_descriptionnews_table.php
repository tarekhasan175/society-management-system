<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddSaleDescriptionnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acc_sales', function (Blueprint $table) {

            $table->text('description')->nullable();
            $table->unsignedBigInteger('po_number')->nullable();
            $table->foreign('po_number')->references('id')->on('po_accounts')->onDelete('CASCADE');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acc_sales');
    }
}
