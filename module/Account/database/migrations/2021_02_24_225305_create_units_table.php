<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasTable('units')) {
                
            Schema::create('units', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
            });
        }

        Schema::table('units', function (Blueprint $table) {
            
            if (!Schema::hasColumn('units', 'name')) {
                $table->string('name');
            }

            if (!Schema::hasColumn('units', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable();
                $table->foreign('company_id')->references('id')->on('companies');
            }
            
            if (!Schema::hasColumn('units', 'created_by')) {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users');
                $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('units');
    }
}
