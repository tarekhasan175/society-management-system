@extends('layouts.master')

@section('title','Add New User')


@section('css')

    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
@stop
<style>
    .form-page {
        display: none;
    }

    .form-page.active {
        display: block;
    }

</style>


@section('content')
    @include('partials._alert_message')


    <form action="{{route('nagorik-users.update', $profile->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row form-page active">

            <div class="col-sm-12">
                <div class="widget-box">

                    <div class="widget-header">
                        <h4 class="widget-title">
                            <i class="fa fa-plus-circle"></i> {{ __('language.My-Profile') }}
                        </h4>

                        <span class="widget-toolbar">

                    </span>
                    </div>


                    <div class="widget-body">
                        <div class="widget-main no-padding">

                            <div style="margin: 20px;">
                                {{--                            @include('partials._alert_message')--}}
                            </div>

                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="panel ">

                                        <div class="panel-body">
                                            <!-- Admin Dashboard-->
                                            <div class="col-lg-12" style="padding-top: .2%; padding-left: 13%;">


                                                <div class="col-lg-10">
                                                    <div class=" ">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">

                                                                <input type="file" name="image">
                                                                <img id=" " class="img-thumbnail"
                                                                     src="{{ optional($profile->details)->image ? asset(optional($profile->details)->image) : asset('placeholder_image_path.jpg') }}"
                                                                     style="height:150px;width:140px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">

                                                            <table
                                                                style="table-layout: auto; vertical-align: top; text-align: center; width: 100%"
                                                                class="table table-responsive table-hover">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="">
                                                                  <span>
                                                                      <span id=" " class="auto-style1"
                                                                            style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.full_name') }}</span>
                                                                  </span>
                                                                    </td>
                                                                    <td class="">:</td>
                                                                    <td>
                                                                <span>
                                                                    <span id=" " class="control-label"
                                                                          style="font-weight:normal;text-align: left">

                                                                     <input type="text" name="full_name"
                                                                            value="{{ (optional($profile->details)->full_name) }}">

                                                                    </span>
                                                                </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label25"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.father_name') }}</span>
                                                                 </span>
                                                                    </td>
                                                                    <td class="auto-style6">:</td>
                                                                    <td>
                                                                 <span>
                                                                      <span id=" " class="control-label"
                                                                            style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="father_name"
                                                                            value="{{optional($profile->details)->father_name}}">

                                                                    </span>
                                                                 </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label20"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.mother_name') }}</span>
                                                                </span>
                                                                    </td>
                                                                    <td class="auto-style6">:</td>
                                                                    <td>
                                                                 <span>
                                                                      <span id=" " class="control-label"
                                                                            style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="mother_name"
                                                                            value="{{optional($profile->details)->mother_name}}">

                                                                    </span>
                                                                 </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label10"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">     {{ __('language.nid_number') }}</span>
                                                                </span>
                                                                    </td>
                                                                    <td class="auto-style6">:</td>
                                                                    <td>
                                                                <span>
                                                                     <span id=" " class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="nid_no"
                                                                            value="{{optional($profile->details)->nid_no}}">

                                                                    </span>
                                                                </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label5"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;">    {{ __('language.phone_number') }}</span>
                                                                 </span>
                                                                    </td>
                                                                    <td class="auto-style6">:</td>
                                                                    <td>
                                                                 <span>
                                                                       <span id=" " class="control-label"
                                                                             style="font-weight:normal;text-align: left">
                                                                     <input type="number" name="phone"
                                                                            value="{{optional($profile->details)->phone}}">

                                                                    </span>
                                                                 </span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
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
                            <i class="fa fa-plus-circle"></i> {{ __('language.My-Profile') }}
                        </h4>

                        <span class="widget-toolbar">

                    </span>
                    </div>


                    <div class="widget-body">
                        <div class="widget-main no-padding">

                            <div style="margin: 20px;">
                                {{--                            @include('partials._alert_message')--}}
                            </div>


                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="panel ">

                                        <div class="panel-body">
                                            <!-- Admin Dashboard-->
                                            <div class="col-lg-12" style="padding-top: .2%; padding-left: 13%;">


                                                <div class="col-lg-10">
                                                    <div class="form-horizontal  ">
                                                        <table
                                                            style="table-layout: auto; vertical-align: top; text-align: center; width: 100%"
                                                            class="table table-responsive table-hover">
                                                            <tbody>

                                                            <tr>
                                                                <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label1"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.Spouse_Name') }}</span>
                                                                </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                <span>
                                                                      <span id=" " class="control-label"
                                                                            style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="depent_name"
                                                                            value="{{optional($profile->details)->depent_name}}">

                                                                    </span>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label3"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.birth_date') }}</span>
                                                                </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="date" name="birth_date"
                                                                            value="{{optional($profile->details)->birth_date}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label7"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.r_email') }}</span>
                                                                 </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                <span>
                                                                    <span id=" " class="control-label"
                                                                          style="font-weight:normal;text-align: left">
                                                                     <input type="email" name="mail"
                                                                            value="{{optional($profile->details)->mail}}">

                                                                    </span>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label27"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;">   {{ __('language.bin_no') }}</span>
                                                                 </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                 <span>
                                                                      <span id=" " class="control-label"
                                                                            style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="bin_no"
                                                                            value="{{optional($profile->details)->bin_no}}">

                                                                    </span>
                                                                 </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label12"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">   {{ __('language.passport_no') }}</span>
                                                                </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                <span>
                                                                     <span id=" " class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="passport_no"
                                                                            value="{{optional($profile->details)->passport_no}}">

                                                                    </span>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label4"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">     {{ __('language.birth_regi_no') }}</span>
                                                                </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                <span>
                                                                     <span id=" " class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="birth_no"
                                                                            value="{{optional($profile->details)->birth_no}}">

                                                                    </span>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style5" colspan="3">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
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
                            <i class="fa fa-plus-circle"></i> {{ __('language.My-Profile') }}
                        </h4>

                        <span class="widget-toolbar">

                    </span>
                    </div>


                    <div class="widget-body">
                        <div class="widget-main no-padding">

                            <div style="margin: 20px;">
                                {{--                            @include('partials._alert_message')--}}
                            </div>


                            <div class="row  ">
                                <div class="col-lg-12">
                                    <div class="panel ">

                                        <div class="panel-body">
                                            <!-- Admin Dashboard-->
                                            <div class="col-lg-12" style="padding-top: .2%; padding-left: 13%;">


                                                <div class="col-lg-10">
                                                    <div class="form-horizontal  ">
                                                        <table
                                                            style="table-layout: auto; vertical-align: top; text-align: center; width: 100%"
                                                            class="table table-responsive table-hover">
                                                            <tbody>

                                                            <tr>
                                                                <td class="auto-style5" colspan="3">
                                                                  <span>
                                                                      <span id="ContentPlaceHolder1_Label13"
                                                                            class="auto-style1"
                                                                            style="font-weight:normal;text-decoration:underline;text-align: left; font-weight: 700;"> {{ __('language.present_address') }}</span>
                                                                  </span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="auto-style7">
                                                                     <span>
                                                                       <span id="ContentPlaceHolder1_Label15" class="auto-style1"
                                                                             style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.division') }}</span>
                                                                     </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                <span>
                                                                     <span id=" " class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="division"
                                                                            value="{{optional($profile->instant)->division}}">

                                                                      </span>
                                                                 </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label17" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.district') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="district"
                                                                            value="{{optional($profile->instant)->district}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label9" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.sub_district') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="sub_district"
                                                                            value="{{optional($profile->instant)->sub_district}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label22" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.post_code') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="post_code"
                                                                            value="{{optional($profile->instant)->post_code}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label11" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.village') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                       <span id=" " class="control-label"
                                                             style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="village"
                                                                            value="{{optional($profile->instant)->village}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label18" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.road') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="road_no"
                                                                            value="{{optional($profile->instant)->road_no}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                  <span>
                                                                      <span id="ContentPlaceHolder1_Label14"
                                                                            class="auto-style1"
                                                                            style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.plot_holding_no') }}  </span>
                                                                  </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                  <span>
                                                                      <span id=" " class="control-label"
                                                                            style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="holding_no"
                                                                            value="{{optional($profile->instant)->holding_no}}">

                                                                    </span>
                                                                  </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style5" colspan="3">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label6" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.description') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                         <span id=" " class="control-label"
                                                               style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="details"
                                                                            value="{{optional($profile->instant)->details}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
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
                            <i class="fa fa-plus-circle"></i>  {{ __('language.My-Profile') }}
                        </h4>

                        <span class="widget-toolbar">

                    </span>
                    </div>


                    <div class="widget-body">
                        <div class="widget-main no-padding">

                            <div style="margin: 20px;">

                            </div>


                            <div class="row  ">
                                <div class="col-lg-12">
                                    <div class="panel ">

                                        <div class="panel-body">
                                            <!-- Admin Dashboard-->
                                            <div class="col-lg-12" style="padding-top: .2%; padding-left: 13%;">


                                                <div class="col-lg-10">
                                                    <div class="form-horizontal  ">
                                                        <table
                                                            style="table-layout: auto; vertical-align: top; text-align: center; width: 100%"
                                                            class="table table-responsive table-hover">
                                                            <tbody>


                                                            <tr>
                                                                <td class="auto-style5" colspan="3">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label16" class="auto-style1"
                                                              style="font-weight:normal;text-decoration:underline;text-align: left; font-weight: 700;"> {{ __('language.permanent_address') }}  </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                     <span>
                                                                       <span id="ContentPlaceHolder1_Label15" class="auto-style1"
                                                                             style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.division') }}</span>
                                                                     </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                <span>
                                                                     <span id=" " class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="division"
                                                                            value="{{optional($profile->permanent)->division}}">

                                                                      </span>
                                                                 </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label17" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.district') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="district"
                                                                            value="{{optional($profile->permanent)->district}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label9" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.sub_district') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="sub_district"
                                                                            value="{{optional($profile->permanent)->sub_district}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label22" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.post_code') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="post_code"
                                                                            value="{{optional($profile->permanent)->post_code}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label11" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.village') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                       <span id=" " class="control-label"
                                                             style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="village"
                                                                            value="{{optional($profile->permanent)->village}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label18" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.road') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                          <span id=" " class="control-label"
                                                                style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="road_no"
                                                                            value="{{optional($profile->permanent)->road_no}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                  <span>
                                                                      <span id="ContentPlaceHolder1_Label14"
                                                                            class="auto-style1"
                                                                            style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.plot_holding_no') }}  </span>
                                                                  </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                  <span>
                                                                      <span id=" " class="control-label"
                                                                            style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="holding_no"
                                                                            value="{{optional($profile->permanent)->holding_no}}">

                                                                    </span>
                                                                  </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style5" colspan="3">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                    <span>
                                                        <span id="ContentPlaceHolder1_Label6" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.description') }}</span>
                                                    </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                    <span>
                                                         <span id=" " class="control-label"
                                                               style="font-weight:normal;text-align: left">
                                                                     <input type="text" name="details"
                                                                            value="{{optional($profile->permanent)->details}}">

                                                                    </span>
                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7"></td>
                                                                <td class="auto-style6"></td>
                                                                <td></td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
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


        <div class="  mt-4">
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
                                <button type="button" class="nexts btn btn-primary" onclick="showPage(1)">Next</button>
                                <input type="submit" name=" " value="দাখিল করুন" id=" " style="display: none"
                                       class="sub  btn btn-primary"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>

    <br>
    <br>
    <br>


    @include('Trade-licence.side-section.old-licence-js')

@endsection






