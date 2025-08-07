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
                        <i class="fa fa-plus-circle"></i> অনুসন্ধানের অপশন

                    </h4>

                    <span class="widget-toolbar">

                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-8 col-sm-offset-1">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                        <span id="ContentPlaceHolder1_lblapplno">ট্রেড লাইসেন্স নম্বর</span>
                                        <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="ctl00$ContentPlaceHolder1$txtApplicationNumber" type="text"
                                               id="txtApplicationNumber" class="form-control"
                                               style="font-family: 'Times New Roman', Georgia, Serif;"/>

                                    </div>
                                </div>
                                <div class="form-group" style="display : none;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                        <span id="ContentPlaceHolder1_lbltodate">প্রদানের তারিখ</span>
                                        <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="ctl00$ContentPlaceHolder1$txtpaymentdate" type="text"
                                               id="txtpaymentdate" class="form-control inputeng"
                                               style="font-family: 'Times New Roman', Georgia, Serif;"/>

                                    </div>
                                </div>
                                <div class="form-group " style="margin-top: 60px">

                                    <div class="col-md-12 col-sm-6 col-xs-12" align="center">
                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit"
                                               value="অনুসন্ধান করুন" id="ContentPlaceHolder1_btnSubmit"
                                               class="btn btn-primary"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>


    <div class="row">


        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        {{--                        <i class="fa fa-plus-circle"></i> অনুসন্ধানের অপশন--}}

                    </h4>

                    <span class="widget-toolbar">

                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row mb-4">
                            {{--                            <div class="col-sm-8 col-sm-offset-1">--}}
                            {{--                                --}}
                            {{--                                --}}
                            {{--                                main contenst--}}

                            {{--                            </div>--}}
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <div class="row">


        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        {{--                        <i class="fa fa-plus-circle"></i> অনুসন্ধানের অপশন--}}

                    </h4>

                    <span class="widget-toolbar">

                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row mb-4">
                            {{--                            <div class="col-sm-8 col-sm-offset-1">--}}
                            {{--                                --}}
                            {{--                                --}}
                            {{--                                main contenst--}}

                            {{--                            </div>--}}
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>




    <div class="row">


        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> তথ্য

                    </h4>

                    <span class="widget-toolbar">

                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-8 col-sm-offset-1">


                                <div class="x_panel">
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                        <div class="form-group">

                                            <div class="col-md-12 col-sm-6 col-xs-12" align="center">
                                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnprocess" value="প্রসেস করুন" id="ContentPlaceHolder1_btnprocess" class="btn btn-primary" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                <span id="ContentPlaceHolder1_Label2">ট্রেডলাইসেন্স ফী :</span>
                                            </label>


                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txttradelicensefee" type="text" value="0" id="ContentPlaceHolder1_txttradelicensefee" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                <span id="ContentPlaceHolder1_Label3">সাইনবোর্ড কর :</span>
                                            </label>


                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtsignboardtax" type="text" value="0" id="ContentPlaceHolder1_txtsignboardtax" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                <span id="ContentPlaceHolder1_Label5">বই ফি :</span>
                                            </label>


                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtbookvalue" type="text" value="0" id="ContentPlaceHolder1_txtbookvalue" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                <span id="ContentPlaceHolder1_Label6">ফর্ম ফি :</span>
                                            </label>


                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtnewbookfee" type="text" value="0" id="ContentPlaceHolder1_txtnewbookfee" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                <span id="ContentPlaceHolder1_Label8">অন্যান্য ফি :</span>
                                            </label>


                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtothercharges" type="text" value="0" id="ContentPlaceHolder1_txtothercharges" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                <span id="ContentPlaceHolder1_Label4">সারচার্জ :</span>
                                            </label>


                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtsurcharge" type="text" value="0" id="ContentPlaceHolder1_txtsurcharge" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                <span id="ContentPlaceHolder1_Label24">সর্বমোট মূল্য/সর্বমোট ধার্যকৃত মূল্য:</span>
                                            </label>


                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txttotalamount" type="text" value="0" id="ContentPlaceHolder1_txttotalamount" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_Label7">ব্যাংকের সার্ভিস চার্জ টাকা</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtbankservicecharge" type="text" value="0" id="ContentPlaceHolder1_txtbankservicecharge" class="form-control col-md-7 col-xs-12" onblur="fnblur1(this)" />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_Label1">আয়কর টাকা</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtincometax" type="text" value="0" id="ContentPlaceHolder1_txtincometax" class="form-control col-md-7 col-xs-12" onblur="fnblur1(this)" />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lblvat">ভ্যাট</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtvat" type="text" value="0" id="ContentPlaceHolder1_txtvat" class="form-control col-md-7 col-xs-12" onblur="fnblur1(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="display:none;">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="button" class="btn btn-primary" value="গণনা করুন" onclick="trclac();" />

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lbltotalpayable">মোট টাকা</span>
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txttotalpayable" type="text" value="0" id="ContentPlaceHolder1_txttotalpayable" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />
                                                <label id="lbltxt" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lblpaymenttype">পেমেন্ট পদ্ধতি </span>
                                                <span class="required">(*)</span></label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="ctl00$ContentPlaceHolder1$ddpaymenttype" id="ContentPlaceHolder1_ddpaymenttype">
                                                    <option value="-1">বাছাই করুন</option>
                                                    <option value="DBBL">DBBL</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lblbankname">ব্যাংকের নাম </span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtbankname1" type="text" id="ContentPlaceHolder1_txtbankname1" class="form-control col-md-7 col-xs-12" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lblbranch">শাখার নাম</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtbranch1" type="text" id="ContentPlaceHolder1_txtbranch1" class="form-control col-md-7 col-xs-12" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lblchqname">চেক নম্বর</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtchequename" type="text" id="ContentPlaceHolder1_txtchequename" class="form-control col-md-7 col-xs-12" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lblchequedate">চেক তারিখ</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtchqdate" type="text" id="txtchqdate" class="date-picker form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_Label25">চালান নম্বর </span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtchallanno" type="text" id="txtchallanno" class="date-picker form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_Label26">চালান তারিখ</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtchallandate" type="text" id="txtchallandate" class="date-picker form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_Label10">কাহার মারফত প্রদত্ত </span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtuseraccepted" type="text" id="txtuseraccepted" class="date-picker form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="display : none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                <span id="ContentPlaceHolder1_lblremarks">মন্ত্যব্য</span>

                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtremarks" type="text" id="ContentPlaceHolder1_txtremarks" class="form-control col-md-7 col-xs-12" />

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






