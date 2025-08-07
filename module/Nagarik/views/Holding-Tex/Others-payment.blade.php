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
                        <i class="fa fa-plus-circle"></i> কুইক পে

                    </h4>

                    <span class="widget-toolbar">

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
                                        <br/>
                                        <div id="demo-form2" data-parsley-validate
                                             class="form-horizontal form-label-left">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="first-name">

                                                    <span id="ContentPlaceHolder1_lblapplno1">ই-হোল্ডিং নম্বর :</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtEHoldingNo" type="text"
                                                           id="ContentPlaceHolder1_txtEHoldingNo"
                                                           class="form-control col-md-7 col-xs-12" required="required"
                                                           readonly="readonly"
                                                           style="font-family: 'Times New Roman', Georgia, Serif;"/>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="first-name">

                                                    <span id="ContentPlaceHolder1_Label2">ধরণ :</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select name="ctl00$ContentPlaceHolder1$ddType"
                                                            onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddType\&#39;,\&#39;\&#39;)&#39;, 0)"
                                                            id="ContentPlaceHolder1_ddType" disabled="disabled"
                                                            class="aspNetDisabled form-control">
                                                        <option value="-1">-</option>
                                                        <option selected="selected" value="1">নামজারী আবেদন ফি</option>
                                                        <option value="2">নয়াবাদী ফি</option>
                                                        <option value="3">পি ফরম ফি</option>
                                                        <option value="4">নতুন হোল্ডিং আবেদন ফি</option>
                                                        <option value="5">হোল্ডিং পেমেন্ট</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="first-name">

                                                    <span id="ContentPlaceHolder1_Label3">ফি :</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtAmt" type="text"
                                                           value="10000" id="ContentPlaceHolder1_txtAmt"
                                                           class="form-control col-md-7 col-xs-12" required="required"/>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="first-name">

                                                    <span id="ContentPlaceHolder1_Label1">বিবরণ :</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="ctl00$ContentPlaceHolder1$txtDesc" rows="10" cols="20"
                                              id="ContentPlaceHolder1_txtDesc" class="form-control col-md-7 col-xs-12"
                                              required="required">
</textarea>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="first-name">

                                                    <span
                                                        id="ContentPlaceHolder1_lblPaymentGateway">Payment Gateway :</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$ddPF"
                                                            onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddPF\&#39;,\&#39;\&#39;)&#39;, 0)"
                                                            id="ContentPlaceHolder1_ddPF" class="form-control">
                                                        <option selected="selected" value="SONALIBANK">SONALI BANK
                                                        </option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnSave"
                                                           value="জমা করুন" id="ContentPlaceHolder1_btnSave"
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
            </div>


        </div>
    </div>

@endsection






