<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchIdToRmreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('rmreports', function (Blueprint $table) {

            if (!Schema::hasColumn('rmreports', 'branch_id')) {
                
                $table->unsignedBigInteger('branch_id')->nullable();

                if (Schema::hasTable('branches')) {
                    $table->foreign('branch_id')->references('id')->on('branches');
                }
            }

            if (Schema::hasColumn('rmreports', 'factory_id')) {
                $table->unsignedBigInteger('factory_id')->nullable()->change();
                $table->unsignedBigInteger('unit_id')->nullable()->change();
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
