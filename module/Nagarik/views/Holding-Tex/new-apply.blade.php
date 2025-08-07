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

    <div style="margin: 20px;">
        @include('partials._alert_message')
    </div>
    <form action="{{route('holding-taxApply.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row form-page  active">
            <div class="col-sm-12">
                <div class="widget-box">

                    <div class="widget-header">
                        <h4 class="widget-title">
                            <i class="fa fa-plus-circle"></i> {{ __('language.personal_info') }}
                        </h4>
                        <span class="widget-toolbar">
                        <a href="{{route('holding-taxApply.index')}}">{{ __('language.go_back') }}</a>
                    </span>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
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
                                                        <span id=" ">{{ __('language.Name_of_Occupant') }}</span>
                                                        <span class="required">(*)</span>
                                                    </label>

                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_occupant" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"
                                                               required="required"/>
                                                    </div>

                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                           for="last-name">
                                                        <span id="">{{ __('language.occupation') }}</span>
                                                        <span class="required">(*)</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_occupation" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"
                                                               required="required"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.father_name') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_father" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"
                                                               value="  {{$profile->father_name ??  ''}}"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.mother_name') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_mother" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"
                                                               value="{{$profile->mother_name ??  ''}}" required/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.Spouse_Name') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_depent" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"
                                                               value=" {{$profile->depent_name ??  ''}}" required/>
                                                    </div>
                                                </div>


                                                <div class="form-group" style=" ">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.Relationship_with_the_applicant') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="h_depent_r" id="" class="form-control" required>
                                                            <option value=" ">{{ __('language.select') }} </option>
                                                            <option value="Husband">স্বামী</option>
                                                            <option value="Wife">স্ত্রী</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.gender') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="h_gender" id="" class="form-control" required>
                                                            <option value=" ">{{ __('language.select') }} </option>
                                                            <option value="M">পুরুষ</option>
                                                            <option value="F">মহিলা</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.phone_number') }}</span>
                                                        <span class="required">(*)</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                        <input name=" " type="text" value="+৮৮" maxlength="3" id=""
                                                               class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                        <input name="h_phone" type="text" id=""
                                                               value="{{$profile->phone ??  ''}}"
                                                               class="form-control col-md-7 col-xs-12"
                                                               required="required" data-validate-length-range="8,20" />
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.Alternate_Contact_Number') }}</span>
                                                        <span class="required">(*)</span></label>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                        <input name=" " type="text" value="+৮৮" maxlength="3" id=""
                                                               class="form-control col-md-7 col-xs-12" required/>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                        <input name="h_xt_phone" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.e_mail_id') }}</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_mail" type="text" id=""
                                                               value="   {{$profile->mail ??  ''}}"
                                                               class="form-control col-md-7 col-xs-12"
                                                               style="font-family: 'Times New Roman', Georgia, Serif;" required/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.Alternate_e_mail_id') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_xt_mail" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"
                                                               style="font-family: 'Times New Roman', Georgia, Serif;" />
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.application_date') }}</span>
                                                        <span class="required">(*)</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_applydate" type="date" id="datePicker" value=""
                                                               class="date-picker form-control col-md-7 col-xs-12"
                                                               required="required"
                                                               style="font-family: 'Times New Roman', Georgia, Serif;"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.address') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea name="h_address" rows="2" cols="20" id=""
                                                                  class="form-control col-md-7 col-xs-12"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="display: none">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">সমাপ্তির তারিখ</span>
                                                        <span class="required"></span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_applylastdate" type="text" id=""
                                                               class="date-picker form-control col-md-7 col-xs-12"
                                                               readonly="readonly"
                                                               style="font-family: 'Times New Roman', Georgia, Serif;"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.nid_number') }}</span>
                                                        <span class="required"></span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_nid" type="text" id=""
                                                               value="{{$profile->nid_no ??  ''}}"
                                                               class="form-control col-md-7 col-xs-12" required/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.other_nid_number') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_xt_nid" type="text" id="" value=" "
                                                               class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.tin_number') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_tin" type="text" id=""
                                                               class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                </div>


                                                <div class="form-group" style=display:none;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">এন আই ডি নম্বর</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_lid" type="text" id=""
                                                               value="{{$profile->nid_no ??  ''}}"
                                                               class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.small_description') }}:</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea name="h_description" rows="2" cols="20" id=""
                                                                  class="form-control col-md-7 col-xs-12"></textarea>
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
            </div>
        </div>

        <div class="row form-page ">
            <div class="col-sm-12">
                <div class="widget-box">

                    <div class="widget-header">
                        <h4 class="widget-title">
                            <i class="fa fa-plus-circle"></i>  {{ __('language.Property_location') }}
                        </h4>
                        <span class="widget-toolbar">
                        <a href="{{route('holding-taxApply.index')}}">{{ __('language.go_back') }}</a>
                    </span>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
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
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.area') }}</span>
                                                        <span class="required">(*)</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="city_area_id" id="city" onchange="wordSection()"
                                                                class="form-control dropdownnew"
                                                                style="font-family: sutonnyMJ;" required>
                                                            <option value="">--{{ __('language.select') }} --</option>
                                                            @foreach($cityAdd as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="" id="" value="-1"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id=""> {{ __('language.word') }}</span>
                                                        <span class="required">(*)</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="nagorik_word_id" id="word"
                                                                onchange="sectorSection()" class="form-control"
                                                                style="font-family: sutonnyMJ;">
                                                            <option value="">--{{ __('language.select') }} --</option>
                                                            @foreach($wordAdd as $type)
                                                                <option style="display: none"
                                                                        value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="" id=""/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.sector') }} </span>
                                                        <span class="required">(*)</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="nagorik_sector_id" id="section"
                                                                onchange="blockSection()" class="form-control"
                                                                style="font-family: sutonnyMJ;">
                                                            <option value="">--{{ __('language.select') }} --</option>
                                                            @foreach($sectorAdd as $type)
                                                                <option style="display: none"
                                                                        value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="" id=""/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.block') }}</span>
                                                        <span class="required">(*)</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="nagorik_block_id" id="block"
                                                                onchange="roadSection()" class="form-control"
                                                                style="font-family: sutonnyMJ;">
                                                            <option value="">--{{ __('language.select') }} --</option>
                                                            @foreach($bkockAdd as $type)
                                                                <option style="display: none"
                                                                        value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="" id=""/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.road') }}</span>
                                                        <span class="required">(*)</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="nagorik_road_id" id="road" class="form-control"
                                                                style="font-family: sutonnyMJ;">
                                                            <option value="">--{{ __('language.select') }} --</option>
                                                            @foreach($roadAdd as $type)
                                                                <option style="display: none"
                                                                        value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="" id=""/>
                                                    </div>
                                                </div>


                                                <div class="form-group" style=" ">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.holding_number') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="holding_number" type="text" value="0" id=""
                                                               class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                </div>


                                                <div class="form-group" style=" ">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.Amount_of_land') }}</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_land_wide" type="text" value="0" id=""
                                                               class="form-control col-md-7 col-xs-12" required/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.land_user_type') }}</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="h_land_use_type" id="" class="form-control" required>

                                                            <option value="">--{{ __('language.select') }} --</option>
                                                            @foreach($NagorikLandType as $type)
                                                                <option
                                                                        value="{{$type->id}}">{{$type->type}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        <span id="">{{ __('language.all_aria') }}</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input name="h_land_square" type="text" value="0" id=""
                                                               class="form-control col-md-7 col-xs-12" required/>
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


        <div class="row form-page ">
            <div class="col-sm-12">
                <div class="widget-box">

                    <div class="widget-header">
                        <h4 class="widget-title">
                            <i class="fa fa-plus-circle"></i>{{ __('language.Attachment_of_documents') }}
                        </h4>
                        <span class="widget-toolbar">
                        <a href="{{route('holding-taxApply.index')}}">{{ __('language.go_back') }}</a>
                    </span>
                    </div>


                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">

                                        <div class="x_title">
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="x_content">


                                            <div class="form-group">

                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                <span class="flat">
                                                    <input id="" type="checkbox" name=""/>
                                                </span>
                                                    <span id="">{{ __('language.Ownership_Deed') }}</span>
                                                </label>

                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <input name="h_checkbox1_input" type="text" id=""
                                                           class="form-control"/>
                                                </div>

                                                <div class="col-md-4 col-sm-5 col-xs-12">
                                                    <textarea name="h_checkbox1_comment" rows="2" cols="20" id=""
                                                              class="form-control col-md-7 col-xs-12"
                                                              placeholder="&lt;&lt;মন্তব্য>>"></textarea>
                                                </div>

                                                <div class="col-md-2 col-sm-5 col-xs-12">
                                                    <label class="file-upload">
                                                        <span><strong>{{ __('language.upload') }}</strong></span>
                                                        <input type="file" name="h_checkbox1_upload"
                                                               id=" " style="height: 30px ; width: 150px"/>
                                                    </label>
                                                    <span id="sp1"></span>
                                                </div>

                                            </div>

                                            <br>
                                            <br>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span class="flat"><input id=" " type="checkbox" name=" "/></span>
                                                    <span id=" ">{{ __('language.cs_sa') }}</span>
                                                </label>
                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <input name="h_checkbox2_input" type="text" id=" "
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-4 col-sm-5 col-xs-12">
                                                    <textarea name="h_checkbox2_comment" rows="2" cols="20" id=" "
                                                              class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                                <div class="col-md-2 col-sm-5 col-xs-12">
                                                    <label class="file-upload">
                                                        <span><strong>{{ __('language.upload') }}</strong></span>
                                                        <input type="file" name="h_checkbox2_upload"
                                                               id=" " style="height: 30px ; width: 150px"/>
                                                    </label>
                                                    <span id="sp9"></span>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span class="flat"><input id=" " type="checkbox" name=" "/></span>
                                                    <span id=" ">{{ __('language.Carbon_copy') }}</span>
                                                </label>
                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <input name="h_checkbox3_input" type="text" id=" "
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-4 col-sm-5 col-xs-12">
                                                    <textarea name="h_checkbox3_comment" rows="2" cols="20" id=" "
                                                              class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                                <div class="col-md-2 col-sm-5 col-xs-12">
                                                    <label class="file-upload">
                                                        <span><strong>{{ __('language.upload') }}</strong></span>
                                                        <input type="file" name="h_checkbox3_upload"
                                                               id=" " style="height: 30px ; width: 150px"/>
                                                    </label>
                                                    <span id="sp10"></span>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span class="flat"><input id=" " type="checkbox" name=" "/></span>
                                                    <span id=" ">{{ __('language.plot_type') }}</span></label>
                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <input name="h_checkbox4_input" type="text" id=" "
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-4 col-sm-5 col-xs-12">
                                                    <textarea name="h_checkbox4_comment" rows="2" cols="20" id=" "
                                                              class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                                <div class="col-md-2 col-sm-5 col-xs-12">
                                                    <label class="file-upload">
                                                        <span><strong>{{ __('language.upload') }}</strong></span>
                                                        <input type="file" name="h_checkbox4_upload"
                                                               id=" " style="height: 30px ; width: 150px"/>
                                                    </label>
                                                    <span id="sp11"></span>
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span class="flat"><input id=" " type="checkbox" name=" "/></span>
                                                    <span id=" "></span>{{ __('language.any') }}</label>
                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <input name="h_checkbox5_input" type="text" id=" "
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-4 col-sm-5 col-xs-12">
                                                <textarea name="h_checkbox5_comment" rows="2" cols="20" id=" "
                                                          class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                                <div class="col-md-2 col-sm-5 col-xs-12">
                                                    <label class="file-upload">
                                                        <span><strong>{{ __('language.upload') }}</strong></span>
                                                        <input type="file" name="h_checkbox5_upload"
                                                               id=" " style="height: 30px ; width: 150px"/>
                                                    </label>
                                                    <span id="sp12"></span>
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
                                        onclick="showPage(-1)">{{ __('language.Previous') }}
                                </button>
                            </div>
                            <div class="col-md-6 align-left">
                                <button type="button" class="nexts btn btn-primary" onclick="showPage(1)">{{ __('language.next') }}</button>
                                <input type="submit" value="{{ __('language.submit') }}" id=" " style="display: none"
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
    </form>
    @include('Holding-Tex.side-section.newApply.newApply_js')
@endsection






