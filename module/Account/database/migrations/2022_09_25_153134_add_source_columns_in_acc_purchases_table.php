<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSourceColumnsInAccPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acc_purchases', function (Blueprint $table) {
            $table->string('sourceable_type')->nullable()->after('supplier_id');
            $table->unsignedBigInteger('sourceable_id')->nullable()->after('sourceable_type');
            $table->string('source')->nullable()->default('Account')->comment('Account, Production and so on.')->after('sourceable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acc_purchases', function (Blueprint $table) {
            $table->dropColumn('source_type');
            $table->dropColumn('source_id');
            $table->dropColumn('source');
        });
    }
}
