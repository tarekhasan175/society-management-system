<?php
namespace Module\Nagarik\Services;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Module\Nagarik\Models\CityAreaAdd;
use Module\Nagarik\Models\NagorikUseDetails;
use Module\Nagarik\Models\OldTradeLicenseModel;
use Module\Nagarik\Models\RegionModel;

class TradeLicenseService
{
    use FileSaver;

    public function newTradeLicenseApplication(Request $request, $id)
    {
        $newLicenseApplication = OldTradeLicenseModel::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'financial_year_id'                   => $request->financial_year_id,
                'business_category_id'                => $request->business_category_id,
                'license_fee'                         => $request->license_fee,
                'business_name'                       => $request->business_organization_name,
                'business_type'                       => $request->business_type,
                'payout_capital'                      => $request->payout_capital,
                'business_start_date'                 => $request->business_start_date,
                'business_capital'                    => $request->business_capital,
                'applicants_relation_with_company'    => $request->applicants_relation_with_business,
                'business_location_address'           => $request->business_location_address,
                'tin_no'                              => $request->tin_no,
                'business_land_ownership'             => $request->business_land_ownership,
                'business_house_ownership'            => $request->business_house_ownership,
                'business_land_square_feet'           => $request->business_land_square_feet,
                'is_signboard'                        => $request->is_signboard,
                'is_business_land_ownership_govt'     => $request->is_business_land_ownership_govt,
                'business_house_floor_level'          => $request->business_house_floor_level,
                'holding_no'                          => $request->holding_no,
                'shop_no'                             => $request->shop_no,
                'signboard_square_feet'               => $request->signboard_square_feet,
                'signboard_fee'                       => $request->signboard_fee,
                'total_tax'                           => $request->total_tax,
                'income_tax'                          => $request->income_tax,
                'total_price'                         => $request->total_price,
                'old_issue_license_no'                => $request->old_issue_license_no,
                'old_issue_license_date'              => $request->old_issue_license_date,
                'old_license_renewal_effective_date'  => $request->old_license_renewal_effective_date,
                'attachment_name'                     => $request->attachment_name,
                'attachment_description'              => $request->attachment_description,
                'applicants_additional_ids'           => $request->applicants_additional_ids,
                'license_no'                          => "TRADE/".strtoupper(CityAreaAdd::where('id', $request->region)->value('name'))."/".rand(100000, 999999)."/".Carbon::now()->year,
                'region_id'                           => $request->region,
                'ward_id'                             => $request->word,
                'sector_id'                           => $request->sector,
                'block_id'                            => $request->block,
                'road_id'                             => $request->road,
                'is_new_license'                      => 1,
                'status'                              => 0,
                'user_id'                             => auth()->user()->id,
            ]
        );

        $this->upload_file($request->business_land_image, $newLicenseApplication, 'business_land_image', 'image/new_business_land_image');
        $this->upload_file($request->attachment_image, $newLicenseApplication, 'attachment_image', 'image/mew_license_attachment');
    }

    public function oldTradeLicenseApplication(Request $request, $id)
    {
        $oldLicenseApplication = OldTradeLicenseModel::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'financial_year_id'                   => $request->financial_year_id,
                'business_category_id'                => $request->business_category_id,
                'license_fee'                         => $request->license_fee,
                'business_name'                       => $request->business_organization_name,
                'business_type'                       => $request->business_type,
                'payout_capital'                      => $request->payout_capital,
                'business_start_date'                 => $request->business_start_date,
                'business_capital'                    => $request->business_capital,
                'applicants_relation_with_company'    => $request->applicants_relation_with_business,
                'business_location_address'           => $request->business_location_address,
                'tin_no'                              => $request->tin_no,
                'business_land_ownership'             => $request->business_land_ownership,
                'business_house_ownership'            => $request->business_house_ownership,
                'business_land_square_feet'           => $request->business_land_square_feet,
                'is_signboard'                        => $request->is_signboard,
                'is_business_land_ownership_govt'     => $request->is_business_land_ownership_govt,
                'business_house_floor_level'          => $request->business_house_floor_level,
                'holding_no'                          => $request->holding_no,
                'shop_no'                             => $request->shop_no,
                'signboard_square_feet'               => $request->signboard_square_feet,
                'signboard_fee'                       => $request->signboard_fee,
                'total_tax'                           => $request->total_tax,
                'income_tax'                          => $request->income_tax,
                'total_price'                         => $request->total_price,
                'old_issue_license_no'                => $request->old_issue_license_no,
                'old_issue_license_date'              => $request->old_issue_license_date,
                'old_license_renewal_effective_date'  => $request->old_license_renewal_effective_date,
                'attachment_name'                     => $request->attachment_name,
                'attachment_description'              => $request->attachment_description,
                'applicants_additional_ids'           => $request->applicants_additional_ids,
                'license_no'                          => "TRADE/".ucfirst(CityAreaAdd::where('id', $request->region)->value('name'))."/".rand(100000, 999999)."/".Carbon::now()->year,
                'region_id'                           => $request->region,
                'ward_id'                             => $request->word,
                'sector_id'                           => $request->sector,
                'block_id'                            => $request->block,
                'road_id'                             => $request->road,
                'is_new_license'                      => 2,
                'status'                              => 0,
                'user_id'                             => auth()->user()->id,
            ]
        );

        $this->upload_file($request->business_land_image, $oldLicenseApplication, 'business_land_image', 'image/business_land_image');
        $this->upload_file($request->attachment_image, $oldLicenseApplication, 'attachment_image', 'image/old_license_attachment');
    }
}
