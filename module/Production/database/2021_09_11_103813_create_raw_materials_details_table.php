<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
                
            Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('units')) {
                
            Schema::create('units', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('raw_materials_details')) {
            Schema::create('raw_materials_details', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('raw_materials_details', 'raw_material_id')) {

            Schema::table('raw_materials_details', function (Blueprint $table) {
                $table->unsignedBigInteger('raw_material_id');
                $table->foreign('raw_material_id')->references('id')->on('raw_materials')->onDelete('CASCADE');
            });
        }

        if (!Schema::hasColumn('raw_materials_details', 'product_id')) {

            Schema::table('raw_materials_details', function (Blueprint $table) {
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            });
        }

        if (!Schema::hasColumn('raw_materials_details', 'unit')) {

            Schema::table('raw_materials_details', function (Blueprint $table) {
                $table->unsignedBigInteger('unit');
                $table->foreign('unit')->references('id')->on('units')->onDelete('CASCADE');
            });
        }

        if (!Schema::hasColumn('raw_materials_details', 'assign_qty')) {

            Schema::table('raw_materials_details', function (Blueprint $table) {
                $table->integer('assign_qty');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raw_materials_details');
    }
}
