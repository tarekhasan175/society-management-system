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
                        {{ $oldLicense->business_name }}({{ $oldLicense->businessCategory->type }}), {{ $oldLicense->financialYear->year }} এর পুরাতন ট্রেড লাইসেন্সের আবেদন সম্পাদনা
                    </h4>
                    <span class="widget-toolbar">
                        <a href="{{ route('old-trade-license.index') }}">
                                                    লাইসেন্স তালিকা
                                                </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    @include('partials._alert_message')
    <form action="{{ route('old-trade-license.update', $oldLicense->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-container">
            <div class="row form-page active">
                <div class="col-sm-12">
                    <div class="widget-box">

                        <div class="widget-header">
                            <h4 class="widget-title">
                                <i class="fa fa-plus-circle"></i> ব্যবসার ধরণ
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
                                                            <span id="">অর্থ বছর <span class="required" style="color: red;">*</span></span>
                                                            <select name="financial_year_id" id="fyear"
                                                                    class="form-control" required data-error-msg="Please select a financial year" >
                                                                <option disabled selected>--Select--</option>
                                                                @foreach($financeYear as $year)
                                                                    @if($oldLicense->financialYear->id == $year->id)
                                                                        <option value="{{$year->id}}" selected>{{$year->start_year}}-{{$year->end_year}}</option>
                                                                    @else
                                                                        <option value="{{$year->id}}">{{$year->start_year}}-{{$year->end_year}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="col-md-5 col-sm-4 col-xs-12">
                                                            <span id="">ব্যবসার ধরণ <span class="required" style="color: red;">*</span></span>
                                                            <select name="business_category_id" id="btype"
                                                                    onchange="licencefee()" class="form-control "
                                                                    style="font-family: sutonnyMJ;" required>
                                                                <option value="" disabled selected>--Select--</option>
                                                                @foreach($businessType as $type)
                                                                    @if($oldLicense->businessCategory->id == $type->id)
                                                                        <option value="{{$type->id}}" selected>{{$type->type}}</option>
                                                                    @else
                                                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-3 col-sm-5 col-xs-12">
                                                            <span id="">লাইসেন্স ফি <span class="required" style="color: red;">*</span></span>
                                                            <input name="license_fee" type="text" id="l_fee" value="{{ $oldLicense->license_fee }}"
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
                                <i class="fa fa-plus-circle"></i> ব্যবসার ধরণ
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
                                                <span id="">ব্যবসা প্রতিষ্ঠানের নাম :</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_organization_name" type="text" id=""
                                                       class="form-control col-md-7 col-xs-12" value="{{ $oldLicense->business_name }}" required />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">ব্যবসা প্রতিষ্ঠানের প্রকৃতি :</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="business_type" class="form-control" required>
                                                    <option selected="selected" value="">--Select--</option>
                                                    @foreach($InstituteType as $type)
                                                        @if($oldLicense->business_type == $type->id)
                                                            <option value="{{$type->id}}" selected>{{$type->type}}</option>
                                                        @else
                                                            <option value="{{$type->id}}">{{$type->type}}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">পরিশোধিত মূলধন (লি: কোম্পানির ক্ষেত্রে)  :</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" value="{{ $oldLicense->payout_capital }}" id="" name="payout_capital"
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
                                <i class="fa fa-plus-circle"></i> মালিকের এবং ব্যবসায়ের তথ্য
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
                                                <span id="" style="font-family: 'Times New Roman';">ব্যবসায়ের আরম্ভ করার তারিখ :</span>
                                                <span class="required" style="color: red;">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_start_date" type="text" id=""
                                                       class="date-picker form-control col-md-7 col-xs-12"
                                                       style="font-family: 'Times New Roman', Georgia, Serif;" value="{{ $oldLicense->business_start_date }}" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">ব্যবসায়ের  মূলধন:</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_capital" type="text" value="{{ $oldLicense->business_capital }}" id=""
                                                       class="form-control col-md-7 col-xs-12"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">প্রতিষ্ঠানের সাথে আবেদনকারীর সম্পর্ক :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="applicants_relation_with_business" type="text" id=""
                                                       class="form-control col-md-7 col-xs-12" value="{{ $oldLicense->applicants_relation_with_company }}"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">প্রস্তাবিত ব্যবসায়ের সঠিক ঠিকানা :</span>
                                                <span class="required" style="color: red;">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_location_address" type="text" id=""
                                                       class="form-control col-md-7 col-xs-12" value="{{ $oldLicense->business_location_address }}" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">আয়কর প্রদান করিলে TIN নম্বর :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="tin_no" type="text" value="{{ $oldLicense->tin_no }}" id=""
                                                       class="form-control col-md-7 col-xs-12"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        <span
                                            id="">ব্যবসার জায়গা (ভাড়া/নিজের):</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <select name="business_land_ownership" id="" class="form-control">
                                                    @if($oldLicense->business_land_ownership == "Own")
                                                        <option value="Own" selected>নিজের</option>
                                                        <option value="Rent">ভাড়া</option>
                                                    @else
                                                        <option value="Rent" selected>ভাড়া</option>
                                                        <option value="Own">নিজের</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div style="display: flex; align-items: center;">
                                                    <input type="file" name="business_land_image" id="business_land_image" style="width: 90px;" accept="image/*">
                                                    <img id="business_land_image_preview" src="{{ asset($oldLicense->business_land_image) }}" alt="Image Preview" style="display: block; width: 50px; height: 50px; margin-left: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        <span
                                            id="">বব্যবসার দোকান/গৃহ (ভাড়া/নিজের) :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="business_house_ownership" id="" class="form-control">
                                                    @if($oldLicense->business_house_ownership == "Y")
                                                        <option value="Y" selected>হ্যাঁ</option>
                                                        <option value="N">না</option>
                                                    @else
                                                        <option value="N" selected>না</option>
                                                        <option value="Y">হ্যাঁ</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=" ">মোট আয়তন (বর্গফুট)</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <input type="text" name="business_land_square_feet" value="{{ $oldLicense->business_land_square_feet }}" id=" " class="form-control col-md-6 col-xs-12"
                                                       onblur="fnblur(this)"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">সাইন বোর্ড আছে কিনা :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="is_signboard" id="" class="form-control">
                                                    @if($oldLicense->is_signboard == "Y")
                                                        <option value="Y" selected>হ্যাঁ</option>
                                                        <option value="N">না</option>
                                                    @else
                                                        <option value="N" selected>না</option>
                                                        <option value="Y">হ্যাঁ</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">প্রস্তাবিত দোকান / ব্যবসায়ের স্থান, পৌর ভূমি / সরকারি ভূমির উপর কিনা  :</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="is_business_land_ownership_govt" id=""
                                                        class="form-control">
                                                    @if($oldLicense->is_business_land_ownership_govt == "Y")
                                                        <option value="Y" selected>হ্যাঁ</option>
                                                        <option value="N">না</option>
                                                    @else
                                                        <option value="N" selected>না</option>
                                                        <option value="Y">হ্যাঁ</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">দোকান ঘর / অফিস কোন তলায় ? :</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="business_house_floor_level" id="" value="{{ $oldLicense->business_house_floor_level }}" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id="">অন্যান্য পরিচয়পত্র :</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="applicants_additional_ids" type="text" id="" value="{{ $oldLicense->applicants_additional_ids }}"
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
                                <i class="fa fa-plus-circle"></i> ব্যবসায়ের তথ্য
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
                                                    <span id=" ">অঞ্চল</span>
                                                    <span class="required" style="color: red;">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="region" id="city" onchange="wordSection()"
                                                            class="form-control dropdownnew"
                                                            style="font-family: sutonnyMJ;" required>
                                                        <option value="">--Select--</option>
                                                        @foreach($cityAdd as $type)
                                                            @if($oldLicense->region->id == $type->id)
                                                                <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                                            @else
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id=" ">ওয়ার্ড</span>
                                                    <span class="required" style="color: red;">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="word" id="word" onchange="sectorSection()" class="form-control"
                                                            style="font-family: sutonnyMJ;" required>
                                                        <option value="">--Select--</option>
                                                        @foreach($wordAdd as $type)
                                                            @if($oldLicense->ward->id == $type->id)
                                                                <option style="display: none" value="{{$type->id}}" selected>{{$type->name}}</option>
                                                            @else
                                                                <option style="display: none" value="{{$type->id}}">{{$type->name}}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="">সেক্টর/সেকশন</span>
                                                    <span class="required" style="color: red;">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="sector" id="section" onchange="blockSection()"
                                                            class="form-control" style="font-family: sutonnyMJ;" required>
                                                        <option value="">--Select--</option>
                                                        @foreach($sectorAdd as $type)
                                                            @if($oldLicense->sector->id == $type->id)
                                                                <option style="display: none" value="{{$type->id}}" selected>{{$type->name}}</option>
                                                            @else
                                                                <option style="display: none" value="{{$type->id}}">{{$type->name}}</option>
                                                            @endif
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="">এরিয়া/ব্লক</span>
                                                    <span class="required" style="color: red;">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="block" id="block" onchange="roadSection()"
                                                            class="form-control" style="font-family: sutonnyMJ;" required>
                                                        <option value="">--Select --</option>
                                                        @foreach($bkockAdd as $type)
                                                            @if($oldLicense->block->id == $type->id)
                                                                <option style="display: none" value="{{$type->id}}" selected>{{$type->name}}</option>
                                                            @else
                                                                <option style="display: none" value="{{$type->id}}">{{$type->name}}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="">রোড</span>
                                                    <span class="required" style="color: red;">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select name="road" id="road" class="form-control"
                                                            style="font-family: sutonnyMJ;" required>
                                                        <option value="">--Select --</option>
                                                        @foreach($roadAdd as $type)
                                                            @if($oldLicense->road->id == $type->id)
                                                                <option style="display: none" value="{{$type->id}}" selected>{{$type->name}}</option>
                                                            @else
                                                                <option style="display: none" value="{{$type->id}}">{{$type->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="">প্লট/ হোল্ডিং নং: <span class="required" style="color: red;">*</span></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="holding_no" type="text" id="" value="{{ $oldLicense->holding_no }}"
                                                           class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12"
                                                       for="first-name">
                                                    <span id="ContentPlaceHolder1_lblShopNo">দোকান নং :</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="shop_no" type="text"
                                                           id="txtShopNo" value="{{ $oldLicense->shop_no }}"
                                                           class="form-control col-md-7 col-xs-12" onblur="fnblur(this)"
                                                           style="font-family: 'Times New Roman';"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label10">সাইন বোর্ড বর্গফুট :</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="{{ $oldLicense->signboard_square_feet }}"
                                                           name="signboard_square_feet"
                                                           class="form-control col-md-7 col-xs-12"
                                                           onblur="calculatesignboardtax()"
                                                           style="font-family: 'Times New Roman';"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label13">সাইন বোর্ড ফি :</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text"
                                                           value="{{ $oldLicense->signboard_fee }}"
                                                           name="signboard_fee"
                                                           class="form-control col-md-7 col-xs-12" onblur="fnblur(this)"
                                                           ReadOnly="true" style="font-family: 'Times New Roman';"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">

                                                    <span id="ContentPlaceHolder1_Label20">মোট ভ্যাট :</span>
                                                </label>


                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="{{ $oldLicense->total_tax }}"
                                                           name="total_tax"
                                                           class="form-control col-md-7 col-xs-12"
                                                           onblur="fnblur(this)" ReadOnly="true"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label23">আয়কর টাকা :</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text"
                                                           value="{{ $oldLicense->income_tax }}"
                                                           name="income_tax"
                                                           class="form-control col-md-7 col-xs-12" onblur="fnblur(this)"
                                                           ReadOnly="true"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name"
                                                       class="control-label col-md-4 col-sm-4 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblcurrenttax">সর্বমোট মূল্য/সর্বমোট ধার্যকৃত মূল্য:</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="{{ $oldLicense->total_price }}"
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
                                <i class="fa fa-plus-circle"></i> ব্যবসায়ের তথ্য (পুরাতনের ক্ষেত্রে)

                            </h4>
                            <span class="widget-toolbar">
                    </span>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main no-padding">

                                <div style="margin: 20px;">
                                    {{--                                @include('partials._alert_message')--}}
                                </div>

                                <div class="row" style="padding: 10px">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group" id=" ">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=" ">ইস্যূকৃত লাইসেন্স নং (পুরাতনের ক্ষেত্রে):</span>
                                                <span class="required" style="color: red;">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="old_issue_license_no" value="{{ $oldLicense->old_issue_license_no }}" class="form-control col-md-6 col-xs-12" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group" id=" ">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=" ">ইস্যূকৃত লাইসেন্স তারিখ (পুরাতনের ক্ষেত্রে):</span>
                                                <span class="required" style="color: red;">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="old_issue_license_date" class="form-control col-md-6 col-xs-12"
                                                       style="font-family: Georgia, 'Times New Roman', Times, serif;" value="{{ $oldLicense->old_issue_license_date }}" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group" id=" ">
                                            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                <span id=" ">নবায়ন কার্যকর করার তারিখ (পুরাতনের ক্ষেত্রে): </span>
                                                <span class="required" style="color: red;">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="old_license_renewal_effective_date" class="form-control col-md-6 col-xs-12"
                                                       style="font-family: Georgia, 'Times New Roman', Times, serif;" value="{{ $oldLicense->old_license_renewal_effective_date }}" required/>
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
                                <i class="fa fa-plus-circle"></i> সংযুক্তি
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
                                                            সংযুক্তির নাম
                                                            <select id=" " name="attachment_name" class="form-control">
                                                                <option value=" " disabled selected>--Select--</option>
                                                                @foreach($Additional as $type)
                                                                    @if($oldLicense->attachment_name == $type->id)
                                                                        <option value="{{$type->id}}" selected>{{$type->type}}</option>
                                                                    @else
                                                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 col-sm-5 col-xs-12">
                                                            মন্তব্য
                                                            <input id=" " name="attachment_description" value="{{ $oldLicense->attachment_description }}"
                                                                   class="form-control col-md-7 col-xs-12" />
                                                        </div>
                                                        <div class="col-md-2 col-sm-5 col-xs-12">
                                                            <br/>
                                                            <input type="file" id="" name="attachment_image"/>
                                                            <br>
                                                            <img src="{{ asset($oldLicense->attachment_image) }}" width="100" height="100">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id=" " type="checkbox"/>
                                                            <span id=" ">উপরের প্রদানকৃত যাবতীয় তথ্যাবলি সঠিক বলে আমি প্রতীয়মান করছি।</span>
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
                                            onclick="showPage(-1)">Previous
                                    </button>
                                </div>
                                <div class="col-md-6 align-left">
                                    <button type="button" class="nexts btn btn-primary" onclick="showPage(1)">Next
                                    </button>
                                    <input type="submit" value="দাখিল করুন" id=" " style="display: none"
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
