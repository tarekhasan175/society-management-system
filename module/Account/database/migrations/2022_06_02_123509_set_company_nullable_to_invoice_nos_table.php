<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetCompanyNullableToInvoiceNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_nos', function (Blueprint $table) {

            if (Schema::hasColumn('invoice_nos', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->change();
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
