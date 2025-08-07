<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvanceToGenerateBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generate_bills', function (Blueprint $table) {
            $table->decimal('advance', 10, 2)->nullable()->after('monthlyDue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generate_bills', function (Blueprint $table) {
            $table->dropColumn('advance');
        });
    }
}
