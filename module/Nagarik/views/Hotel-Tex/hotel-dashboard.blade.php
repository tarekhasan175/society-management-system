

@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop


@section('content')



    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> Dashboard
                    </h4>

                    <span class="widget-toolbar">

                    </span>
                </div>



                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row" style="padding: 10px">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <span id="spanzonename"></span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="txtbrand" disabled="disabled"/>

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="txtbrandeng" style="font-family: 'Times New Roman';"  disabled="disabled" />

                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="txtname"  disabled="disabled" />

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="txtnameeng" style="font-family: 'Times New Roman';"  disabled="disabled"/>

                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <select id="hoteltype" class="form-control"  disabled="disabled">
                                        <option value="">হোটেলের ধরণ (বাধ্যতামূলক)</option>
                                        <option value="3">৩ ষ্টার</option>
                                        <option value="4">৪ ষ্টার</option>
                                        <option value="5">৫ ষ্টার</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="txtaddress1"  disabled="disabled" />

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="txtaddress1eng" style="font-family: 'Times New Roman';"  disabled="disabled" />

                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                                হোটেলের প্রতিনিধির নাম ও পদবী
                            </div>
                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="contactname"  disabled="disabled" />

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="contactsurname"  disabled="disabled" />

                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="contactnameeng" style="font-family: 'Times New Roman';"  disabled="disabled"/>

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="contactsurnameeng" style="font-family: 'Times New Roman';"  disabled="disabled"/>

                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="number" class="form-control" id="txtmobile"  disabled="disabled"/>

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="email" style="font-family: 'Times New Roman';"  disabled="disabled" />

                                </div>
                            </div>
                        </div>

                    </div>
                    </div>


                </div>
            </div>




@endsection






