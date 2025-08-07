<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionIntoAccPurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acc_purchase_details', function (Blueprint $table) {

            if (!Schema::hasColumn('acc_purchase_details','description')) {
                $table->text('description')->nullable()->after('amount');
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
        Schema::table('acc_purchase_details', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
