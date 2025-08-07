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
                        <i class="fa fa-plus-circle"></i> অঞ্চল নির্ধারণ
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

                                                    <span id="ContentPlaceHolder1_lblapplno">অঞ্চল নাম</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtApplicationNumber" type="text" id="txtApplicationNumber" class="form-control" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <div class="col-md-12 col-sm-6 col-xs-12" align="center">
                                                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit" value="সংরক্ষণ" id="ContentPlaceHolder1_btnSubmit" class="btn btn-primary" />
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
                                <div class="x_title">
                                    <div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row" style="display: none;">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">

                                            <div class="col-md-12 col-sm-6 col-xs-12" align="center">
                                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnsave" value="পেমেন্ট করুন" id="ContentPlaceHolder1_btnsave" class="btn btn-primary" />
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






