@extends('layouts.master')
@section('title','Add New User')
@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-database"></i> {{ $old_license->business_name }} ({{ $old_license->businessCategory->type }}), {{ $old_license->financialYear->year }}
                    </h4>
                    <span class="widget-toolbar">

                    </span>
                    <span class="widget-toolbar">
                        <a href="{{ route('new-trade-license.index') }}">
                                                     {{ __('language.licence_list') }}
                                                </a>
                    </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">




































                                        <div class="row">
                                            <div class="col-xs-12 ">


                                                <div class="col-md-6">
                                                    <div>

                                                        <div class="col-md-6 bolder">
                                                                    {{ __('language.business_name') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_name }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.Financial_year') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->financialYear->start_year }}-{{ $old_license->financialYear->end_year }}
                                                        </div>


                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.business_step') }}:
                                                        </div>

                                                        <div class="col-md-6">
                                                            {{ $old_license->businessCategory->type }}
                                                        </div>

                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.licence_fee') }}:
                                                        </div>

                                                        <div class="col-md-6">
                                                            {{ $old_license->license_fee }}
                                                        </div>

                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                                {{ __('language.type_of_business') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_type }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                              {{ __('language.Paid_up_capital') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->payout_capital }}
                                                        </div>

                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.date_of_business_start') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_start_date }}
                                                        </div>

                                                        <br>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.business_capital') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_capital }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.relation_in_business') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->applicants_relation_with_company }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                              {{ __('language.Correct_address_in_business') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_location_address }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.tex_tin_number') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->tin_no }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.business_place_rent') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_land_ownership }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            {{ __('language.business_place_self') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_house_ownership }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                                {{ __('language.total_area_sq') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_land_square_feet }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            {{ __('language.sine_board') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->is_signboard }}

                                                        </div>

                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            {{ __('language.additional_name') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->attachment_name }}

                                                        </div>

                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                              {{ __('language.comment') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->attachment_description }}

                                                        </div>


                                                    </div>
                                                </div>


                                                <div class="col-md-6">

                                                    <div>
                                                        <div class="col-md-6 bolder">
                                                            {{ __('language.business_palace_under_gov_pl') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->is_business_land_ownership_govt }}

                                                        </div>
                                                        <br>

                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            {{ __('language.office_floor') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_house_floor_level }}

                                                        </div>

                                                        <br>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.others_address') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->applicants_additional_ids }}

                                                        </div>

                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            {{ __('language.area') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->region->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.word') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->ward->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.sector') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->sector->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.block') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->block->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                              {{ __('language.road') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->road->name }}

                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.plot_holding_no') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->holding_no }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.shop_no') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->shop_no }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.sine_board_sq') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->signboard_square_feet }}
                                                        </div>


                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                                {{ __('language.sine_board_fee') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->signboard_fee }}
                                                        </div>


                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                        {{ __('language.total_vat') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->total_tax }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                               {{ __('language.income_tex_rs') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->income_tax }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            {{ __('language.issue_licence_no_old') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->old_issue_license_no }}
                                                        </div>

                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.issue_licence_date_old') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->old_issue_license_date }}
                                                        </div>

                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                             {{ __('language.licence_active_date_old') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->old_license_renewal_effective_date }}
                                                        </div>
                                                        <br>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                              {{ __('language.total_price') }}:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->total_price }}
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <hr>
                                                <div class="align-center bolder" style="font-size: 20px;">
                                                    <span>   {{ __('language.Documents_displayed') }}</span>
                                                </div>
                                                <hr>

                                                <div class="row ">
                                                    <div class="col-md-6 align-center bolder">
                                                         {{ __('language.business_place_image') }}
                                                    </div>
                                                    <div class="col-md-6 align-center"><img src="{{ asset($old_license->business_land_image) }}" width="auto" height="200px"></div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6 align-center bolder">
                                                            {{ __('language.addition_image') }}
                                                    </div>
                                                    <div class="col-md-6 align-center"><img src="{{ asset($old_license->attachment_image) }}" width="auto" height="200px"></div>
                                                </div>
                                                <hr>
                                                <hr>


                                            </div>
                                        </div>
























































                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
