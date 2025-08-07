<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchIdToRequsitionStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requsition_stocks', function (Blueprint $table) {
            if (!Schema::hasColumn('requsition_stocks', 'branch_id')) {
                
                $table->unsignedBigInteger('branch_id')->nullable();

                if (Schema::hasTable('branches')) {
                    $table->foreign('branch_id')->references('id')->on('branches');
                }
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
            //
        });
    }
}
