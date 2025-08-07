<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('business_type_id');
            $table->string('name');
            $table->string('code',50)->unique()->nullable();
            $table->string('short_name')->nullable();
            $table->text('head_office')->nullable();
            $table->text('factory')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('position')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('fax',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('day_off')->nullable();
            $table->string('country')->nullable();
            $table->text('top_text')->nullable();
            $table->string('logo')->nullable();
            $table->float('latitude', 14, 3)->nullable();
            $table->float('longitude', 14, 3)->nullable();


            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('business_type_id')->references('id')->on('business_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
