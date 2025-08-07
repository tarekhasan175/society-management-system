<?php
namespace Module\Nagarik\Services;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Module\Nagarik\Models\HoldingTexApply;

class HoldingTexService
{
    use FileSaver;
    public function HoldingTexInfo(Request $request , $id)
    {

       $holdingTexDocumnet =  HoldingTexApply::updateOrCreate(
            [
                'id'                                                 => $id,
            ],
            [
                'user_id'                                            => auth()->user()->id,
                'h_occupant'                                         => $request->h_occupant,
                'h_occupation'                                       => $request->h_occupation,
                'h_father'                                           => $request->h_father,
                'h_mother'                                           => $request->h_mother,
                'h_depent'                                           => $request->h_depent,
                'h_depent_r'                                         => $request->h_depent_r,
                'h_gender'                                           => $request->h_gender,
                'h_phone'                                            => $request->h_phone,
                'h_xt_phone'                                         => $request->h_xt_phone,
                'h_mail'                                             => $request->h_mail,
                'h_xt_mail'                                          => $request->h_xt_mail,
                'h_applydate'                                        => $request->h_applydate,
                'h_applylastdate'                                    => $request->h_applylastdate,
                'h_address'                                          => $request->h_address,
                'h_nid'                                              => $request->h_nid,
                'h_xt_nid'                                           => $request->h_xt_nid,
                'h_tin'                                              => $request->h_tin,
                'h_lid'                                              => $request->h_lid,
                'h_description'                                      => $request->h_description,
                'city_area_id'                                       => $request->city_area_id,
                'nagorik_word_id'                                    => $request->nagorik_word_id,
                'nagorik_sector_id'                                  => $request->nagorik_sector_id,
                'nagorik_block_id'                                   => $request->nagorik_block_id,
                'nagorik_road_id'                                    => $request->nagorik_road_id,
                'holding_number'                                     => $request->holding_number,
                'h_land_wide'                                        => $request->h_land_wide,
                'h_land_use_type'                                    => $request->h_land_use_type,
                'h_land_square'                                      => $request->h_land_square,
                'h_checkbox1_input'                                  => $request->h_checkbox1_input,
                'h_checkbox1_comment'                                => $request->h_checkbox1_comment,
                'h_checkbox2_input'                                  => $request->h_checkbox2_input,
                'h_checkbox2_comment'                                => $request->h_checkbox2_comment,
                'h_checkbox3_input'                                  => $request->h_checkbox3_input,
                'h_checkbox3_comment'                                => $request->h_checkbox3_comment,
                'h_checkbox4_input'                                  => $request->h_checkbox4_input,
                'h_checkbox4_comment'                                => $request->h_checkbox4_comment,
                'h_checkbox5_input'                                  => $request->h_checkbox5_input,
                'h_checkbox5_comment'                                => $request->h_checkbox5_comment,



            ]
        );

       $this->upload_file($request->h_checkbox1_upload, $holdingTexDocumnet, 'h_checkbox1_upload', 'image/Holding_Tex_file1_upload');
       $this->upload_file($request->h_checkbox2_upload, $holdingTexDocumnet, 'h_checkbox2_upload', 'image/Holding_Tex_file2_upload');
       $this->upload_file($request->h_checkbox3_upload, $holdingTexDocumnet, 'h_checkbox3_upload', 'image/Holding_Tex_file3_upload');
       $this->upload_file($request->h_checkbox4_upload, $holdingTexDocumnet, 'h_checkbox4_upload', 'image/Holding_Tex_file4_upload');
       $this->upload_file($request->h_checkbox5_upload, $holdingTexDocumnet, 'h_checkbox5_upload', 'image/Holding_Tex_file5_upload');






    }


}
