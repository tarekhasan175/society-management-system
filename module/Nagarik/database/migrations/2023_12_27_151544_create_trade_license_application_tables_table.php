<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeLicenseApplicationTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagorik_trade_license_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financial_year_id')->nullable()->constrained('financial_years', 'id');
            $table->foreignId('business_category_id')->nullable()->constrained('nagorik_business_types', 'id');
            $table->string('license_fee')->nullable();
            $table->string('attachment_name')->nullable();
            $table->string('attachment_description')->nullable();
            $table->string('attachment_image')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('payout_capital')->nullable();
            $table->date('business_start_date')->nullable();
            $table->string('business_capital')->nullable();
            $table->string('applicants_relation_with_company')->nullable();
            $table->string('applicants_additional_ids')->nullable();
            $table->string('business_location_address')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('business_land_ownership')->nullable();
            $table->string('business_land_image')->nullable();
            $table->string('business_house_ownership')->nullable();
            $table->string('business_house_floor_level')->nullable();
            $table->string('is_business_land_ownership_govt')->nullable();
            $table->string('business_land_square_feet')->nullable();
            $table->string('is_signboard')->nullable();
            $table->string('signboard_square_feet')->nullable();
            $table->string('signboard_fee')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('shop_no')->nullable();
            $table->string('total_tax')->nullable();
            $table->string('income_tax')->nullable();
            $table->string('total_price')->nullable();
            $table->string('old_issue_license_no')->nullable();
            $table->date('old_issue_license_date')->nullable();
            $table->date('old_license_renewal_effective_date')->nullable();
            $table->string('license_no')->unique()->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('region_id')->nullable()->constrained('city_area_adds', 'id');
            $table->foreignId('ward_id')->nullable()->constrained('nagorik_word_adds', 'id');
            $table->foreignId('sector_id')->nullable()->constrained('nagorik_sectors', 'id');
            $table->foreignId('block_id')->nullable()->constrained('nagorik_blocks', 'id');
            $table->foreignId('road_id')->nullable()->constrained('nagorik_road_adds', 'id');
            $table->tinyInteger('is_new_license')->default(1)->comment("1=new, 2=old");
            $table->tinyInteger('status')->default(0)->comment("0=not approved, 1=approved");
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
        Schema::dropIfExists('nagorik_trade_license_applications');
    }
}
