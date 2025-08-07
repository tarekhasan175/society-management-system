<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyFactoryFieldToRequsitionStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requsition_stocks', function (Blueprint $table) {

            if (!Schema::hasColumn('requsition_stocks', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable();
            }

            if (!Schema::hasColumn('requsition_stocks', 'factory_id')) {
                $table->unsignedBigInteger('factory_id')->nullable();
            }
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requsition_stocks', function (Blueprint $table) {
            $table->dropColumn('company_id');
            $table->dropColumn('factory_id');
        });
    }
}
