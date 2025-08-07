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
                        <i class="fa fa-plus-circle"></i> অনুসন্ধানের শর্তাবলী
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
                            <div class="col-sm-8 col-sm-offset-1">


                                <div class="x_panel">
                                    <div class="x_title">

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                                                    <span id="ContentPlaceHolder1_lblfromdate">তারিখ থেকে</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtfromdate" type="text" id="txtfromdate" class="form-control" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">
                                                    <span id="ContentPlaceHolder1_Label1">তারিখ পর্যন্ত</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txttodate" type="text" id="txttodate" class="form-control inputeng" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblzone">অঞ্চল</span></label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$ddzone" id="ContentPlaceHolder1_ddzone" class="form-control dropdownnew" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlzone_ClientState" id="ContentPlaceHolder1_cdlzone_ClientState" />
                                                </div>
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblward">ওয়ার্ড</span></label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$ddward" id="ContentPlaceHolder1_ddward" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlward_ClientState" id="ContentPlaceHolder1_cdlward_ClientState" />
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-2">
                                                    <span id="ContentPlaceHolder1_lblsector">সেক্টর/সেকশন</span></label>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <select name="ctl00$ContentPlaceHolder1$ddsector" id="ContentPlaceHolder1_ddsector" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlsector_ClientState" id="ContentPlaceHolder1_cdlsector_ClientState" />
                                                </div>

                                                <label class="control-label col-md-2 col-sm-2 col-xs-2">
                                                    <span id="ContentPlaceHolder1_lblarea">এরিয়া/ব্লক</span></label>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <select name="ctl00$ContentPlaceHolder1$ddarea" id="ContentPlaceHolder1_ddarea" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlarea_ClientState" id="ContentPlaceHolder1_cdlarea_ClientState" />
                                                </div>
                                            </div>
                                            <div class="form-group" >

                                                <div class="col-md-4 col-sm-4 col-xs-4" style="display: none;">
                                                    <select name="ctl00$ContentPlaceHolder1$ddroad" id="ContentPlaceHolder1_ddroad" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlroad_ClientState" id="ContentPlaceHolder1_cdlroad_ClientState" />
                                                </div>




                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                                                    <span id="ContentPlaceHolder1_lblholdingtaxno">ট্রেড লাইসেন্স নং</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtTLtaxno" type="text" readonly="readonly" id="txtTLtaxno" class="form-control" style="font-family: 'Times New Roman', Georgia, Serif;" />
                                                </div>
                                            </div>
                                            <div class="form-group" >

                                                <div class="col-md-4 col-sm-4 col-xs-12" style="display: none;">
                                                    <input name="ctl00$ContentPlaceHolder1$txtoldtlno" type="text" id="txtoldtlno" class="form-control inputeng" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">
                                                    <span id="ContentPlaceHolder1_Label8">লাইসেন্সের  ধরণ </span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$licensetype" id="ContentPlaceHolder1_licensetype">
                                                        <option value="NEW">নতুন</option>
                                                        <option value="RENEW">নবায়ন</option>
                                                        <option value="UPDATE">সংশোধনী</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">
                                                    <span id="ContentPlaceHolder1_Label9">রেফারেন্স নম্বর</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtransactionno" type="text" id="txtransactionno" class="form-control inputeng" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>

                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                                                    <span id="ContentPlaceHolder1_Label2">দরখাস্ত নম্বর</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtAppNo" type="text" id="txtAppNo" class="form-control" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name" style="display: none;">
                                                    <span id="ContentPlaceHolder1_Label3">জাতীয় পরিচয়পত্র নং</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12" style="display: none;">
                                                    <input name="ctl00$ContentPlaceHolder1$txtNationalId" type="text" id="txtNationalId" class="form-control inputeng" />

                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                                                    <span id="ContentPlaceHolder1_Label6">আবেদনকারীর নাম</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtFirstName" type="text" id="txtFirstName" class="form-control" />

                                                </div>
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name" style="display: none;">
                                                    <span id="ContentPlaceHolder1_Label7">Last Name</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12" style="display: none;">
                                                    <input name="ctl00$ContentPlaceHolder1$txtLastName" type="text" id="txtLastName" class="form-control inputeng" />

                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                                                    <span id="ContentPlaceHolder1_Label4">মোবাইল নং</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtMobile" type="text" id="txtMobile" class="form-control" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit" value="অনুসন্ধান করুন" id="ContentPlaceHolder1_btnSubmit" class="btn btn-primary" />
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

@endsection






