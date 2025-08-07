<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldingTexAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holding_tex_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('h_occupant')->nullable();
            $table->string('h_occupation')->nullable();
            $table->string('h_father')->nullable();
            $table->string('h_mother')->nullable();
            $table->string('h_depent')->nullable();
            $table->string('h_depent_r')->nullable();
            $table->string('h_gender')->nullable();
            $table->string('h_phone')->nullable();
            $table->string('h_xt_phone')->nullable();
            $table->string('h_mail')->nullable();
            $table->string('h_xt_mail')->nullable();
            $table->string('h_applydate')->nullable();
            $table->string('h_applylastdate')->nullable();
            $table->string('h_address')->nullable();
            $table->string('h_nid')->nullable();
            $table->string('h_xt_nid')->nullable();
            $table->string('h_tin')->nullable();
            $table->string('h_lid')->nullable();
            $table->string('h_description')->nullable();
            $table->string('h_apply_status')->default('o')->nullable();
            $table->string('h_approve_status')->default('o')->nullable();
            $table->string('h_clear_status')->default('o')->nullable();
            $table->string('h_non_clear_status')->default('o')->nullable();
            $table->string('h_system_status')->default('o')->nullable();



            $table->foreignId('city_area_id')->constrained('city_area_adds' , 'id')->nullable();
            $table->foreignId('nagorik_word_id')->constrained('nagorik_word_adds' , 'id')->nullable();
            $table->foreignId('nagorik_sector_id')->constrained('nagorik_sectors' , 'id')->nullable();
            $table->foreignId('nagorik_block_id')->constrained('nagorik_blocks' , 'id')->nullable();
            $table->foreignId('nagorik_road_id')->constrained('nagorik_road_adds' , 'id')->nullable();

            $table->string('holding_number')->nullable();
            $table->string('holding_address')->nullable();
            $table->string('holding_status')->nullable();


            $table->string('h_land_wide')->nullable();

            $table->foreignId('h_land_use_type')->constrained('nagorik_land_types' , 'id')->nullable();


            $table->string('h_land_square')->nullable();


            $table->string('h_checkbox1_input')->nullable();
            $table->string('h_checkbox1_comment')->nullable();
            $table->string('h_checkbox1_upload')->nullable();


            $table->string('h_checkbox2_input')->nullable();
            $table->string('h_checkbox2_comment')->nullable();
            $table->string('h_checkbox2_upload')->nullable();


            $table->string('h_checkbox3_input')->nullable();
            $table->string('h_checkbox3_comment')->nullable();
            $table->string('h_checkbox3_upload')->nullable();


            $table->string('h_checkbox4_input')->nullable();
            $table->string('h_checkbox4_comment')->nullable();
            $table->string('h_checkbox4_upload')->nullable();


            $table->string('h_checkbox5_input')->nullable();
            $table->string('h_checkbox5_comment')->nullable();
            $table->string('h_checkbox5_upload')->nullable();


            $table->string('h_checkbox6_input')->nullable();
            $table->string('h_checkbox6_comment')->nullable();
            $table->string('h_checkbox6_upload')->nullable();



            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holding_tex_applies');
    }
}
