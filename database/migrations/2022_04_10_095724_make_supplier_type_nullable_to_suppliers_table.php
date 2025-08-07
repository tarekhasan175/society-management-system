<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeSupplierTypeNullableToSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_type_id')->nullable()->change();

            if (Schema::hasColumn('suppliers', 'company_id')) {
                
                $table->unsignedBigInteger('company_id')->nullable()->change();
            }
            if (Schema::hasColumn('suppliers', 'supplier_code')) {
                
                $table->string('supplier_code')->nullable()->change();
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
        Schema::table('suppliers', function (Blueprint $table) {
            //
        });
    }
}
