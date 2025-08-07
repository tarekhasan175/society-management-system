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
                        <i class="fa fa-plus-circle"></i> জেনারেল অনুরোধ

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
                                        <h2>
                                            <span id="ContentPlaceHolder1_lblsearchoptions"></span>
                                        </h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>

                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                    <span id="ContentPlaceHolder1_lblapplno1">ই-হোল্ডিং নম্বর :</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtEHoldingNo" type="text" id="ContentPlaceHolder1_txtEHoldingNo" class="form-control col-md-7 col-xs-12" required="required" readonly="readonly" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">

                                                    <span id="ContentPlaceHolder1_Label1">বিবরণ :</span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="ctl00$ContentPlaceHolder1$txtDesc" rows="10" cols="20" id="ContentPlaceHolder1_txtDesc" class="form-control col-md-7 col-xs-12" required="required">
</textarea>

                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnSave" value="দাখিল করুন" id="ContentPlaceHolder1_btnSave" class="btn btn-primary" />

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






