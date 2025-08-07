<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqJobNumberDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfq_job_number_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('rfq_job_numbers_id')->nullable();
            $table->unsignedBigInteger('products_id')->nullable();
            $table->text('item')->nullable();
            $table->text('description')->nullable();
            $table->string('quantity')->nullable();
            $table->decimal('price', 20, 2)->default(0);
            $table->decimal('total_rate', 20, 2)->default(0);
            $table->string('tax')->nullable();
            $table->string('worker_name')->nullable();
            $table->timestamps();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->foreign('rfq_job_numbers_id')->references('id')->on('rfq_job_numbers')->onDelete('CASCADE');
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
        Schema::dropIfExists('rfq_job_number_details');
    }
}
