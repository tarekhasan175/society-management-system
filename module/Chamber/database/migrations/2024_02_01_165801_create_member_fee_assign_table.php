<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberFeeAssignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_fee_assign', function (Blueprint $table) {
            $table->id();
            $table->string('year')->nullable();
            $table->string('memberCategory')->nullable();
            $table->string('memberID')->nullable();
            $table->string('amount')->nullable();
            $table->string('paymentDate')->nullable();
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
        Schema::dropIfExists('member_fee_assign');
    }
}
