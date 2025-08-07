<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccSystemSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_system_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('income_statement_sales1')->nullable();
            $table->string('income_statement_sales2')->nullable();
            $table->string('income_statement_cost_of_goods_sold')->nullable();
            $table->string('income_statement_financial_expenses')->nullable();
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
        Schema::dropIfExists('acc_system_settings');
    }
}
