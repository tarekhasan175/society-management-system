<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNagorikUseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_use_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('full_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('depent_name')->nullable();
            $table->tinyInteger('depent_status')->nullable()->comment('0=husband , 1 = wife');
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('bin_no')->nullable()->comment('Business NID');
            $table->string('nid_no')->nullable()->comment('National NID');
            $table->string('passport_no')->nullable();
            $table->string('birth_no')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('nagorik_use_details');
    }
}
