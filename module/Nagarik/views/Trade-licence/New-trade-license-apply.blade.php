@extends('layouts.master')

@section('title','Add New User')


@section('css')

    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
@endsection
<style>
    .form-page {
        display: none;
    }

    .form-page.active {
        display: block;
    }

</style>

@section('content')
    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        {{ __('language.new_trade_licence') }}
                    </h4>
                    <span class="widget-toolbar">
                        <a href="{{ route('new-trade-license.index') }}">
                                                           {{ __('language.licence_list') }}


                                                </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    @include('partials._alert_message')
    <form action="{{ route('new-trade-license.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-container">
            <div class="row form-page active">
                <div class="col-sm-12">
                    <div class="widget-box">

                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i>  {{ __('language.business_step') }}
                            </h4>
                            <span class="widget-toolbar">
                    </span>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div style="margin: 20px;">
                                </div>
                                <div class="row" style="padding: 10px">


                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                            </div>
                                            <div class="x_content">
                                                <br/>
                                                <div id="demo-form31" data-parsley-validate
                                                     class="form-horizontal form-label-left">
                                                    <div class="form-group">


                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <span id="">    {{ __('language.Financial_year') }} <span class="required" style="color: red;">*</span></span>
                                                            <select name="financial_year_id" id="fyear"
                                                                    class="form-control" required data-error-msg="Please select a financial year" >
                                                                <option disabled selected>--{{ __('language.select') }}--</option>
                                                                @foreach($financeYear as $year)
                                                                    <option
                                                                        value="{{$year->id}}">{{$year->start_year}}-{{$year->end_year}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="col-md-5 col-sm-4 col-xs-12">
                                                            <span id="">{{ __('language.business_step') }} <span class="required" style="color: red;">*</span></span>
                                                            <select name="business_category_id" id="btype"
                                                                    onchange="licencefee()" class="form-control "
                                                                    style="font-family: sutonnyMJ;" required>
                                                                <option value="" disabled selected>-- {{ __('language.select') }}--</option>
                                                                @foreach($businessType as $type)
                                                                    <option
                                                                        value="{{$type->id}}">{{$type->type}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-3 col-sm-5 col-xs-12">
                                                            <span id="">  {{ __('language.licence_fee') }}<span class="required" style="color: red;">*</span></span>
                                                            <input name="license_fee" type="text" id="l_fee"
                                                                   class="form-control col-md-7 col-xs-12"
                                                                   ReadOnly="true" required/>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                                            <div>
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
                    </div>
                </div>
            </div>
            <div class="row form-page">

                <div class="col-sm-12">
                    <div class="widget-box">

                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i>{{ __('language.business_step') }}
                            </h4>
                            <span class="widget-toolbar">
                    </span>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main no-padding">

                                <div style="margin: 20px;">

                                </div>
                                <div class="row" style="padding: 10px">

                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">{{ __('language.business_name') }} :</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_organization_name" type="text" id=""
                                                       class="form-control col-md-7 col-xs-12" required />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=""> {{ __('language.type_of_business') }}:</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="business_type" class="form-control" required>
                                                    <option selected="selected" value="">-- {{ __('language.select') }} --</option>
                                                    @foreach($InstituteType as $type)
                                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">  {{ __('language.Paid_up_capital') }}  :</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" value="0" id="" name="payout_capital"
                                                       class="form-control col-md-7 col-xs-12"
                                                       style="font-family: 'Times New Roman';" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-page">

                <div class="col-sm-12">
                    <div class="widget-box">

                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i>   {{ __('language.Owner_business_info') }}
                            </h4>
                            <span class="widget-toolbar">
                    </span>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main no-padding">

                                <div style="margin: 20px;">
                                </div>

                                <div class="row" style="padding: 10px">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="" style="font-family: 'Times New Roman';"> {{ __('language.date_of_business_start') }}:</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_start_date" type="date" id=""
                                                       class="date-picker form-control col-md-7 col-xs-12"
                                                       style="font-family: 'Times New Roman', Georgia, Serif;" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">{{ __('language.business_capital') }}:</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_capital" type="text" value="0" id=""
                                                       class="form-control col-md-7 col-xs-12"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=""> {{ __('language.relation_in_business') }}:</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="applicants_relation_with_business" type="text" id=""
                                                       class="form-control col-md-7 col-xs-12"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=""> {{ __('language.Correct_address_in_business') }}:</span>
                                                <span class="required" style="color: red;">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_location_address" type="text" id=""
                                                       class="form-control col-md-7 col-xs-12" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">   {{ __('language.tex_tin_number') }} :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="tin_no" type="text" value="0" id=""
                                                       class="form-control col-md-7 col-xs-12"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        <span
                                            id="">     {{ __('language.business_place_rent') }}:</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <select name="business_land_ownership" id="" class="form-control">
                                                    <option value="Own">নিজের</option>
                                                    <option value="Rent">ভাড়া</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div style="display: flex; align-items: center;">
                                                    <input type="file" name="business_land_image" id="business_land_image" style="width: 90px;" accept="image/*">
                                                    <img id="business_land_image_preview" src="#" alt="Image Preview" style="display: none; width: 50px; height: 50px; margin-left: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        <span
                                            id="">{{ __('language.business_place_self') }}:</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="business_house_ownership" id="" class="form-control">
                                                    <option value="N">না</option>
                                                    <option value="Y">হ্যাঁ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=" "> {{ __('language.total_area_sq') }}</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <input type="text" name="business_land_square_feet" id=" " class="form-control col-md-6 col-xs-12"
                                                       onblur="fnblur(this)"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">{{ __('language.sine_board') }} :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="is_signboard" id="" class="form-control">
                                                    <option value="Y">হ্যাঁ</option>
                                                    <option value="N">না</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=""> {{ __('language.business_palace_under_gov_pl') }}  :</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="is_business_land_ownership_govt" id=""
                                                        class="form-control">
                                                    <option value="Y">হ্যাঁ</option>
                                                    <option value="N">না</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=""> {{ __('language.office_floor') }} :</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_house_floor_level" id="" class="form-control" />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">{{ __('language.others_address') }} :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="applicants_additional_ids" type="text" id=""
                                                       class="form-control col-md-7 col-xs-12"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-page">

                <div class="col-sm-12">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i>  {{ __('language.Owner_business_info') }}
                            </h4>
                            <span class="widget-toolbar">
                    </span>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div style="margin: 20px;">
                                    {{--                            @include('partials._alert_message')--}}
                                </div>

                                <div class="row" style="padding: 10px">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-horizontal form-label-left input_mask">

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id=" ">  {{ __('language.area') }}</span>
                                                    <span class="required" style="color: red;">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="region" id="city" onchange="wordSection()"
                                                            class="form-control dropdownnew"
                                                            style="font-family: sutonnyMJ;" required>
                                                        <option value="">-- {{ __('language.select') }} --</option>
                                                        @foreach($cityAdd as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id=" ">{{ __('language.word') }}</span>
                                                    <span class="required" style="color: red;">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="word" id="word" onchange="sectorSection()" class="form-control"
                                                            style="font-family: sutonnyMJ;" required>
                                                        <option value="">-- {{ __('language.select') }} --</option>

                                                        @foreach($wordAdd as $type)
                                                            <option style="display: none"
                                                                    value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id=""> {{ __('language.sector') }}</span>
                                                    <span class="required" style="color: red;">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="sector" id="section" onchange="blockSection()"
                                                            class="form-control" style="font-family: sutonnyMJ;" required>
                                                        <option value="">-- {{ __('language.select') }} --</option>
                                                        @foreach($sectorAdd as $type)
                                                            <option style="display: none"
                                                                    value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="">{{ __('language.block') }}</span>
                                                    <span class="required" style="color: red;">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="block" id="block" onchange="roadSection()"
                                                            class="form-control" style="font-family: sutonnyMJ;" required>
                                                        <option value="">-- {{ __('language.select') }} --</option>
                                                        @foreach($bkockAdd as $type)
                                                            <option style="display: none"
                                                                    value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="">  {{ __('language.road') }}</span>
                                                    <span class="required" style="color: red;">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select name="road" id="road" class="form-control"
                                                            style="font-family: sutonnyMJ;" required>
                                                        <option value="">-- {{ __('language.select') }} --</option>
                                                        @foreach($roadAdd as $type)
                                                            <option style="display: none"
                                                                    value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="">{{ __('language.plot_holding_no') }}: <span class="required" style="color: red;">*</span></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="holding_no" type="text" id=""
                                                           class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12"
                                                       for="first-name">
                                                    <span id="ContentPlaceHolder1_lblShopNo">  {{ __('language.shop_no') }}:</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="shop_no" type="text"
                                                           id="txtShopNo"
                                                           class="form-control col-md-7 col-xs-12" onblur="fnblur(this)"
                                                           style="font-family: 'Times New Roman';"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label10">{{ __('language.sine_board_sq') }}:</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="0"
                                                           name="signboard_square_feet"
                                                           class="form-control col-md-7 col-xs-12"
                                                           onblur="calculatesignboardtax()"
                                                           style="font-family: 'Times New Roman';"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label13">{{ __('language.sine_board_fee') }} :</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text"
                                                           value="0"
                                                           name="signboard_fee"
                                                           class="form-control col-md-7 col-xs-12" onblur="fnblur(this)"
                                                           ReadOnly="true" style="font-family: 'Times New Roman';"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">

                                                    <span id="ContentPlaceHolder1_Label20">{{ __('language.total_vat') }}:</span>
                                                </label>


                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="0"
                                                           name="total_tax"
                                                           class="form-control col-md-7 col-xs-12"
                                                           onblur="fnblur(this)" ReadOnly="true"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label23">{{ __('language.income_tex_rs') }}:</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text"
                                                           value="0"
                                                           name="income_tax"
                                                           class="form-control col-md-7 col-xs-12" onblur="fnblur(this)"
                                                           ReadOnly="true"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblcurrenttax"> {{ __('language.total_price') }}:</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="0"
                                                           name="total_price"
                                                           class="form-control col-md-7 col-xs-12" onblur="fnblur(this)"
                                                           ReadOnly="true"/>
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
            <div class="row form-page">

                <div class="col-sm-12">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i> {{ __('language.Documents_displayed') }}
                            </h4>
                            <span class="widget-toolbar">
                    </span>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div style="margin: 20px;">
                                    {{--                            @include('partials._alert_message')--}}
                                </div>
                                <div class="row" style="padding: 10px">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <br/>
                                                <div id="demo-form3" class="form-horizontal form-label-left">

                                                    <div class="form-group">
                                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                                            {{ __('language.additional_name') }}
                                                            <select id=" " name="attachment_name" class="form-control">
                                                                <option value=" ">-- {{ __('language.select') }}--</option>
                                                                @foreach($Additional as $type)
                                                                    <option
                                                                        value="{{$type->id}}">{{$type->type}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 col-sm-5 col-xs-12">
                                                            {{ __('language.comment') }}
                                                            <input id=" " name="attachment_description"
                                                                   class="form-control col-md-7 col-xs-12" />
                                                        </div>
                                                        <div class="col-md-2 col-sm-5 col-xs-12">
                                                            <br/>
                                                            <input type="file" id="" name="attachment_image"/>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                                            <div>
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
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 ">
                        <div class="navigation ">
                            <div class="row">
                                <div class="col-md-6 align-right">
                                    <button type="button" class="previous btn btn-primary" style="display: none"
                                            onclick="showPage(-1)"> {{ __('language.Previous') }}
                                    </button>
                                </div>
                                <div class="col-md-6 align-left">
                                    <button type="button" class="nexts btn btn-primary" onclick="showPage(1)">{{ __('language.next') }}
                                    </button>
                                    <input type="submit" value="{{ __('language.submit') }}" id=" " style="display: none"
                                           class="sub  btn btn-primary"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('Trade-licence.side-section.old-licence-js')
@endsection
