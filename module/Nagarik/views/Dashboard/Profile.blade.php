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



    <div class="row form-page active">

        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i>   {{ __('language.My-Profile') }}
                    </h4>

                    <span class="widget-toolbar">
                   <a href="{{route('nagorik-users.edit', auth()->user()->id)}}" style="margin-top: 1px">   {{ __('language.user_edit') }}</a>
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
                                                            <img id="ContentPlaceHolder1_Image1" class="img-thumbnail"
                                                                 src="{{ optional($profile )->image ? asset(optional($profile )->image) : asset('placeholder_image_path.jpg') }}"
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
                                                                            style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.full_name') }}</span>
                                                                  </span>
                                                                </td>
                                                                <td class="">:</td>
                                                                <td>
                                                                <span>
                                                                    <span id=" " class="control-label"
                                                                          style="font-weight:normal;text-align: left">{{$profile->full_name ??  ''}}</span>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label25"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.father_name') }}</span>
                                                                 </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_lblFatherName"
                                                                           class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                         {{$profile->father_name ??  ''}}
                                                                     </span>
                                                                 </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label20"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.mother_name') }}</span>
                                                                </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_lblMotherName"
                                                                           class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                                   {{$profile->mother_name ??  ''}}
                                                                     </span>
                                                                 </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label10"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.nid_number') }}</span>
                                                                </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_lblNID"
                                                                          class="control-label"
                                                                          style="font-weight:normal;text-align: left">
                                                                     {{$profile->nid_no ??  ''}}
                                                                    </span>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label5"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.phone_number') }}</span>
                                                                 </span>
                                                                </td>
                                                                <td class="auto-style6">:</td>
                                                                <td>
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_lblMobile"
                                                                           class="control-label"
                                                                           style="font-weight:normal;text-align: left">
                                                                     {{$profile->phone ??  ''}}
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
                   <a href="{{route('nagorik-users.edit', auth()->user()->id)}}">{{ __('language.user_edit') }}</a>

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
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.Spouse_Name') }}</span>
                                                                </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_lblSpouseName"
                                                                          class="control-label"
                                                                          style="font-weight:normal;text-align: left">

                                                                      {{$profile->depent_name ??  ''}}
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
                                                        <span id="ContentPlaceHolder1_lblDOB" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                               {{$profile->depent_name ??  ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label7"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.r_email') }}</span>
                                                                 </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_lblemail"
                                                                          class="control-label"
                                                                          style="font-weight:normal;text-align: left">
                                                                    {{$profile->mail ??  ''}}
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_Label27"
                                                                           class="auto-style1"
                                                                           style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.bin_no') }}</span>
                                                                 </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                                 <span>
                                                                     <span id="ContentPlaceHolder1_lblBinNo"
                                                                           class="control-label"
                                                                           style="font-weight:normal;text-align: left">

                                                                          {{$profile->bin_no ??  ''}}

                                                                     </span>
                                                                 </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label12"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.passport_no') }}</span>
                                                                </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_lblPassport"
                                                                          class="control-label"
                                                                          style="font-weight:normal;text-align: left">
                                                                           {{$profile->passport_no ??  ''}}

                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_Label4"
                                                                          class="auto-style1"
                                                                          style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.birth_regi_no') }}</span>
                                                                </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                                <span>
                                                                    <span id="ContentPlaceHolder1_lblBirthRegNo"
                                                                          class="control-label"
                                                                          style="font-weight:normal;text-align: left">
                                                                           {{$profile->birth_no ??  ''}}

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
                   <a href="{{route('nagorik-users.edit', auth()->user()->id)}}"> {{ __('language.user_edit') }}</a>

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
                                                            <td class="auto-style5" colspan="3">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id=" " class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.division') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id=" " class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                           {{$profileInstAdd->division ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id=" " class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.district') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id=" " class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                           {{$profileInstAdd->district ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id=" " class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.sub_district') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id=" " class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                              {{$profileInstAdd->sub_district ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id=" " class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.post_code') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id=" " class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                              {{$profileInstAdd->post_code ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id=" " class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.village') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                              {{$profileInstAdd->village ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id="" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.road') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                            {{$profileInstAdd->road_no ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="auto-style7">
                                                                  <span>
                                                                      <span id="" class="auto-style1"
                                                                            style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.plot_holding_no') }}</span>
                                                                  </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                                  <span>
                                                                      <span id="" class="control-label"
                                                                            style="font-weight:normal;text-align: left">
                                                                      {{$profileInstAdd->holding_no ?? ''}}
                                                                      </span>
                                                                  </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id="" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.description') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                          {{$profileInstAdd->details ?? ''}}
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
                        <i class="fa fa-plus-circle"></i> {{ __('language.My-Profile') }}
                    </h4>

                    <span class="widget-toolbar">
                   <a href="{{route('nagorik-users.edit', auth()->user()->id)}}">{{ __('language.user_edit') }}</a>

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
                                                              style="font-weight:normal;text-decoration:underline;text-align: left; font-weight: 700;"> {{ __('language.permanent_address') }}</span>
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
                                                        <span id=" " class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.division') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                            {{$profilePerAdd->division ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id=" " class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.district') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                          {{$profilePerAdd->district ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id="" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.sub_district') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                             {{$profilePerAdd->sub_district ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id="" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.post_code') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                         {{$profilePerAdd->post_code ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id="" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.village') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                           {{$profilePerAdd->village ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id="" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;">  {{ __('language.road') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">

                                                               {{$profilePerAdd->road_no ?? ''}}
                                                        </span>
                                                    </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="auto-style7">
                                                                  <span>
                                                                      <span id=" " class="auto-style1"
                                                                            style="font-weight:normal;text-align: left; font-weight: 700;">{{ __('language.plot_holding_no') }}</span>
                                                                  </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                                  <span>
                                                                      <span id="" class="control-label"
                                                                            style="font-weight:normal;text-align: left">

                                                                                 {{$profilePerAdd->holding_no ?? ''}}
                                                                      </span>
                                                                  </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="auto-style7">
                                                    <span>
                                                        <span id="" class="auto-style1"
                                                              style="font-weight:normal;text-align: left; font-weight: 700;"> {{ __('language.description') }}</span>
                                                    </span>
                                                            </td>
                                                            <td class="auto-style6">:</td>
                                                            <td>
                                                    <span>
                                                        <span id="" class="control-label"
                                                              style="font-weight:normal;text-align: left">
                                                        {{$profilePerAdd->details ?? ''}}
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


    <div class="  mt-4">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 ">
                <div class="navigation ">
                    <div class="row">
                        <div class="col-md-6 align-right">
                            <button class="previous btn btn-primary" style="display: none" onclick="showPage(-1)">
                                  {{ __('language.Previous') }}
                            </button>
                        </div>
                        <div class="col-md-6 align-left">
                            <button class="nexts btn btn-primary" onclick="showPage(1)">{{ __('language.next') }}</button>
                            <input type="hidden" name=" " value="{{ __('language.submit') }}" id=" " style="display: none"
                                   class="sub  btn btn-primary"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>


    @include('Trade-licence.side-section.old-licence-js')

@endsection






