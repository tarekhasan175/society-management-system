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
                        <i class="fa fa-plus-circle"></i>আবেদনকারীর বিস্তারিত বিবরণ
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
                                <div class="x_panel">
                                    <div class="x_title">
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                    <span id="ContentPlaceHolder1_lblFirstName">আবেদনকারীর নাম</span>
                                                    <span class="required">(*)</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtfirstname" type="text" id="txtfirstname" class="form-control col-md-7 col-xs-12" required="required" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" style="display:none;">
                                                    <span id="ContentPlaceHolder1_lblLastName">পদবী</span>
                                                    <span class="required">(*)</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
                                                    <input name="ctl00$ContentPlaceHolder1$txtlastname" type="text" id="ContentPlaceHolder1_txtlastname" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group" style="display : none;">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblMiddleName">ডাক নাম</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtmiddlename" type="text" id="ContentPlaceHolder1_txtmiddlename" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblfathername">পিতা / স্বামীর নাম</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtfathername" type="text" id="ContentPlaceHolder1_txtfathername" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblmothername">মাতার নাম</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtmothername" type="text" id="ContentPlaceHolder1_txtmothername" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="display:none;">

                                                    <span id="ContentPlaceHolder1_lblspoucename">স্বামী /স্ত্রীর নাম</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
                                                    <input name="ctl00$ContentPlaceHolder1$txtspoucename" type="text" id="ContentPlaceHolder1_txtspoucename" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="display:none;">

                                                    <span id="ContentPlaceHolder1_lblrelationwithspace">তার সাথে সম্পর্ক</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
                                                    <select name="ctl00$ContentPlaceHolder1$ddrelationwithspouce" id="ContentPlaceHolder1_ddrelationwithspouce" class="form-control">
                                                        <option value="-1">নির্বাচন করুন</option>
                                                        <option value="Husband">স্বামী</option>
                                                        <option value="Wife">স্ত্রী</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblapplsex">লিঙ্গ</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$ddsex" id="ContentPlaceHolder1_ddsex" class="form-control">
                                                        <option value="-1">নির্বাচন করুন</option>
                                                        <option value="M">পুরুষ</option>
                                                        <option value="F">মহিলা</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblMobileNo" for="txtmobileno">মোবাইল নম্বর</span>
                                                    <span class="required">(*)</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtmobileno" type="text" id="ContentPlaceHolder1_txtmobileno" class="form-control col-md-7 col-xs-12" required="required" data-validate-length-range="8,15" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblemailid1">ই-মেইল আইডি</span>
                                                    <span class="required">(*)</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtemailid" type="text" id="ContentPlaceHolder1_txtemailid" class="form-control col-md-7 col-xs-12" required="required" style="font-family: 'Times New Roman', Georgia, Serif;" />
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblNewApplDate">আবেদনের তারিখ</span>
                                                    <span class="required">(*)</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$birthday" type="text" id="birthday" class="date-picker form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman', Georgia, Serif;" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lbladdress">বর্তমান ঠিকানা</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea name="ctl00$ContentPlaceHolder1$txtcommaddress" rows="2" cols="20" id="ContentPlaceHolder1_txtcommaddress" class="form-control col-md-7 col-xs-12">
</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblPermanentAddress">স্থায়ী ঠিকানা</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea name="ctl00$ContentPlaceHolder1$txtPermanentAddress" rows="2" cols="20" id="ContentPlaceHolder1_txtPermanentAddress" class="form-control col-md-7 col-xs-12">
</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label1">বয়স</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtAge" type="number" value="18" id="ContentPlaceHolder1_txtAge" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblnationalid">জাতীয় পরিচয়পত্র নম্বর</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtnationalid" type="text" id="ContentPlaceHolder1_txtnationalid" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblwheelType">যান-বাহনের ধরণ</span>
                                                    <span class="required">(*)</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtWheelType" type="text" id="ContentPlaceHolder1_txtWheelType" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lbldrivinglicense">ড্রাইভিং লাইসেন্স নম্বর </span>
                                                    <span class="required">(*)</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtdrivinglicense" type="text" id="ContentPlaceHolder1_txtdrivinglicense" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblLicense">পুরাতন লাইসেন্স নম্বর</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtLicense" type="text" id="ContentPlaceHolder1_txtLicense" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblType">মালিকানার ধরণ</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select name="ctl00$ContentPlaceHolder1$ddType" id="ContentPlaceHolder1_ddType" class="form-control">
                                                        <option value="Own">নিজস্ব</option>
                                                        <option value="Rent">ভাড়া</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btnSave" value="দাখিল করুন" id="ContentPlaceHolder1_btnSave" class="btn btn-primary" />
                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btnCancel" value="বাতিল করুন" id="ContentPlaceHolder1_btnCancel" class="btn btn-success" />
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






