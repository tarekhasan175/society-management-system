@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
@stop


@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> ই হোল্ডিং ডিটেলস
                    </h4>

                    <span class="widget-toolbar">
{{--                        <a href="">--}}
                        {{--                            <i class="ace-icon fa fa-list-alt"></i> User List--}}
                        {{--                        </a>--}}
                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row">


                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblholdingtaxno">ই-হোল্ডিং নম্বর :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtHoldingTaxNo" type="text"
                                                   id="txtHoldingTaxNo" class="form-control col-md-7 col-xs-12"
                                                   required="required" readonly="readonly"/>
                                        </div>

                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label1">এসেসি/দখলকারের নাম :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtAppName" type="text"
                                                   id="txtAppName" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label2">বাড়ির নম্বর :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtHouseNo" type="text"
                                                   id="txtHouseNo" class="form-control col-md-7 col-xs-12"
                                                   required="required" readonly="readonly"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label3">ঠিকানা :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtAddress" type="text"
                                                   id="txtAddress" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label4">মোবাইল নম্বর :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtMobile1" type="text"
                                                   id="txtMobile1" class="form-control col-md-7 col-xs-12"
                                                   required="required" readonly="readonly"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label5">বিকল্প যোগাযোগের নং :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtContact2" type="text"
                                                   id="txtContact2" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label6">ই-মেইল আই ডি. :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtEmail1" type="text" id="txtEmail1"
                                                   class="form-control col-md-7 col-xs-12" required="required"
                                                   readonly="readonly"
                                                   style="font-family: 'Times New Roman', Georgia, Serif;"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label7">বিকল্প ই-মেইল আইডি :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtEmail2" type="text" id="txtEmail2"
                                                   class="form-control col-md-7 col-xs-12" readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblZone">অঞ্চল :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtZone" type="text"
                                                   readonly="readonly" id="txtZone"
                                                   class="form-control col-md-7 col-xs-12" required="required"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblWard">ওয়ার্ড :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtWard" type="text"
                                                   readonly="readonly" id="txtWard"
                                                   class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblSector">সেক্টর/সেকশন :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtSector" type="text"
                                                   readonly="readonly" id="txtSector"
                                                   class="form-control col-md-7 col-xs-12" required="required"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblArea">এরিয়া/ব্লক :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtArea" type="text"
                                                   readonly="readonly" id="txtArea"
                                                   class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label8">রোড :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtholdingward" type="text"
                                                   id="txtholdingward" class="form-control col-md-7 col-xs-12"
                                                   required="required" readonly="readonly"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label9">মোট পরিমান(বর্গফুট) :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtareaoftheland" type="text"
                                                   id="txtareaoftheland" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblusedbyowner">মালিক দ্বারা ব্যবহৃত অংশ (বর্গফুট) :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtusedbyowner" type="text"
                                                   id="txtusedbyowner" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblusedbytenant">ভাড়াটিয়া দ্বারা ব্যবহৃত অংশ(বর্গফুট) :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">

                                            <input name="ctl00$ContentPlaceHolder1$txtusedbytenant" type="text"
                                                   id="txtusedbytenant" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblmonthlyrental">মাসিক ভাড়া :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input name="ctl00$ContentPlaceHolder1$txtmonthlyrental" type="text"
                                                   id="txtmonthlyrental" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblannualvaluation">বার্ষিক মূল্যায়ন :</span>
                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">
                                            <input name="ctl00$ContentPlaceHolder1$txtannualvaluation" type="text"
                                                   id="txtannualvaluation" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblhold_tax_annual_tax">বার্ষিক কর :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input name="ctl00$ContentPlaceHolder1$txtlblhold_tax_annual_tax"
                                                   type="text" id="txtlblhold_tax_annual_tax"
                                                   class="form-control col-md-7 col-xs-12" readonly="readonly"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblhold_tax_house_tax">হোল্ডিং কর :</span>
                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">
                                            <input name="ctl00$ContentPlaceHolder1$txthousetax" type="text"
                                                   id="txthousetax" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblhold_tax_cleaning_tax">ময়লা ও নিষ্কাশন রেইট :</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input name="ctl00$ContentPlaceHolder1$txthold_tax_cleaning_tax" type="text"
                                                   id="txthold_tax_cleaning_tax" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_lblelectrictax">সড়ক বাতি রেইট :</span>
                                        </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">
                                            <input name="ctl00$ContentPlaceHolder1$txtelectrictax" type="text"
                                                   id="txtelectrictax" class="form-control col-md-7 col-xs-12"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_content">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                            <span id="ContentPlaceHolder1_Label10">ফ্ল্যাট নং:</span>

                                        </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input name="ctl00$ContentPlaceHolder1$txtFlat" type="text" id="txtFlat"
                                                   class="form-control col-md-7 col-xs-12" readonly="readonly"/>
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
    </div>

@endsection






