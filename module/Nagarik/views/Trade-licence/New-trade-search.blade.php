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
                        <i class="fa fa-plus-circle"></i> নতুন ট্রেড লাইসেন্সের আবেদন অনুসন্ধান
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
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                                        <span id="ContentPlaceHolder1_Label3">আবেদন নম্বর</span>
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="" type="text" id="txtAppNo" class="form-control" style="font-family: 'Times New Roman', Georgia, Serif;" />

                                    </div>


                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
                                        <span id="ContentPlaceHolder1_Label6">আবেদনকারীর নাম</span>
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="" type="text" id="txtFirstName" class="form-control" />

                                    </div>


                                </div>

                                <div class="form-group">
                                </div>
                                <div class="form-group" style=" margin-top: 50px">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit" value="অনুসন্ধান করুন" id="ContentPlaceHolder1_btnSubmit" class="btn btn-primary" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

@endsection






