<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatepaymentTableCreatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_payments', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('source');
            $table->foreignId('financial_year_id')->nullable()->constrained();
            $table->decimal('amount', 16, 8)->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('nagorik_payments');
    }
}
