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
                        <i class="fa fa-plus-circle"></i> মালিকানা পরিবর্তনের আবেদন
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
                            <div class="col-lg-12">
                                <div class="panel ">

                                    <div class="panel-body">
                                        <!-- Admin Dashboard-->

                                        <div class="form-horizontal" style="padding-left: 15%; padding-top: 2%">
                                            <div id="ContentPlaceHolder1_UpdatePanel1">

                                                <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <span id="ContentPlaceHolder1_lblMgs" class="text-danger"
                                                                  style="color:Red;font-size:X-Large;font-weight:bold;"></span>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_lblSearch"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:bold;text-align: left">লাইসেন্স নং </span>
                                                        <div class="col-md-5">
                                                            <input name="ctl00$ContentPlaceHolder1$txtSerachLicense"
                                                                   type="text" id="ContentPlaceHolder1_txtSerachLicense"
                                                                   class="form-control" placeholder="লাইসেন্স নং"
                                                                   style="font-weight:bold;">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="submit"
                                                                   name="ctl00$ContentPlaceHolder1$btnSearch"
                                                                   value="অনুসন্ধান" id="ContentPlaceHolder1_btnSearch"
                                                                   class="btn btn-primary" style="font-weight:bold;">
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label4"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">লাইসেন্স নং </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtGetLicense"
                                                                   type="text" id="ContentPlaceHolder1_txtGetLicense"
                                                                   disabled="disabled"
                                                                   class="aspNetDisabled form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label12"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">ব্যবসা প্রতিষ্ঠানের নাম </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtBusName"
                                                                   type="text" id="ContentPlaceHolder1_txtBusName"
                                                                   disabled="disabled"
                                                                   class="aspNetDisabled form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">
                                                    <div class="form-group" style="margin-top: 5px; margin-left: 1px">
                                                 <span>
                                                     <strong>
                                                         <span id="ContentPlaceHolder1_Label27"
                                                               style="text-decoration:underline;">বাক্তিগত তথ্য : </span>
                                                     </strong>
                                                 </span>
                                                    </div>

                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label6"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পূর্ণ নাম (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtFullNameBN"
                                                                       type="text"
                                                                       id="ContentPlaceHolder1_txtFullNameBN"
                                                                       class="form-control"
                                                                       placeholder="পূর্ণ নাম (বাংলা) দিন">
                                                            </div>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtFullNameBN"
                                                                data-val-errormessage="অনুগ্রহ করে পূর্ণ নাম (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidatortxtname"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">অনুগ্রহ করে পূর্ণ নাম (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label1"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পূর্ণ নাম (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtFullNameEN"
                                                                       type="text"
                                                                       id="ContentPlaceHolder1_txtFullNameEN"
                                                                       class="form-control"
                                                                       placeholder="পূর্ণ নাম (ইংরেজি) দিন">
                                                            </div>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtFullNameEN"
                                                                data-val-errormessage="অনুগ্রহ করে পূর্ণ নাম (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator13"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">অনুগ্রহ করে পূর্ণ নাম (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label7"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পিতার নাম (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtFatherBN"
                                                                       type="text" id="ContentPlaceHolder1_txtFatherBN"
                                                                       class="form-control"
                                                                       placeholder="পিতার নাম (বাংলা) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label21"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পিতার নাম (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtFatherEN"
                                                                       type="text" id="ContentPlaceHolder1_txtFatherEN"
                                                                       class="form-control"
                                                                       placeholder="পিতার নাম (ইংরেজি) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label32"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">মাতার নাম (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtMotherBN"
                                                                       type="text" id="ContentPlaceHolder1_txtMotherBN"
                                                                       class="form-control"
                                                                       placeholder="মাতার নাম (বাংলা) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label33"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">মাতার নাম (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtMotherEN"
                                                                       type="text" id="ContentPlaceHolder1_txtMotherEN"
                                                                       class="form-control"
                                                                       placeholder="মাতার নাম (ইংরেজি) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label34"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">স্বামী/স্ত্রীর নাম (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtSpouseBN"
                                                                       type="text" id="ContentPlaceHolder1_txtSpouseBN"
                                                                       class="form-control"
                                                                       placeholder="স্বামী/স্ত্রীর নাম (বাংলা) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label35"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">স্বামী/স্ত্রীর নাম (ইংরেজি)</span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtSpouseEN"
                                                                       type="text" id="ContentPlaceHolder1_txtSpouseEN"
                                                                       class="form-control"
                                                                       placeholder="স্বামী/স্ত্রীর নাম (ইংরেজি) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label22"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left"> জন্ম তারিখ </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group date form_date"
                                                                 data-date="1970-01-01" data-date-format="dd MM yyyy"
                                                                 data-link-field="Label22" data-link-format="yyyy-mm-dd"
                                                                 aria-readonly="True">
                                                                <span class="input-group-addon"><span
                                                                        class="glyphicon glyphicon-calendar"></span></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtDOB"
                                                                       type="text" id="ContentPlaceHolder1_txtDOB"
                                                                       class="form-control" placeholder="দিন/মাস/বছর">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label2"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">মোবাইল নং (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-mobile-phone fa-lg"
                                                                        aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtMobile"
                                                                       type="text" maxlength="11"
                                                                       id="ContentPlaceHolder1_txtMobile"
                                                                       class="form-control"
                                                                       placeholder="মোবাইল নং (ইংরেজি) দিন">
                                                            </div>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtMobile"
                                                                data-val-errormessage="অনুগ্রহ করে মোবাইল নং দিন (ইংরেজি)"
                                                                id="ContentPlaceHolder1_RequiredFieldValidatortxtMobile"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">অনুগ্রহ করে মোবাইল নং দিন (ইংরেজি)</span>
                                                            <br>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtMobile"
                                                                data-val-errormessage="অনুগ্রহ করে ১১ সংখ্যার মোবাইল নং দিন ।"
                                                                data-val-display="Dynamic"
                                                                id="ContentPlaceHolder1_RegularExpressionValidator1"
                                                                class="text-danger" data-val="true"
                                                                data-val-evaluationfunction="RegularExpressionValidatorEvaluateIsValid"
                                                                data-val-validationexpression="^[\s\S]{11,11}$"
                                                                style="display:none;">অনুগ্রহ করে ১১ সংখ্যার মোবাইল নং দিন ।</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label3"
                                                              class="col-md-4 control-label"
                                                              placeholder="ইমেইল (ইংরেজি) দিন"
                                                              style="font-weight:normal;text-align: left">ইমেইল (ইংরেজি)</span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-envelope fa"
                                                                        aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtEmail"
                                                                       type="email" id="ContentPlaceHolder1_txtEmail"
                                                                       class="form-control"
                                                                       placeholder="ইমেইল (ইংরেজি) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label11"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">জাতীয় পরিচয়পত্র (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-shield fa-lg"
                                                                        aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtNID"
                                                                       type="text" maxlength="19"
                                                                       id="ContentPlaceHolder1_txtNID"
                                                                       class="form-control"
                                                                       placeholder="জাতীয় পরিচয়পত্র (ইংরেজি) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label5"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পাসপোর্ট নং (ইংরেজি)</span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-briefcase fa"
                                                                        aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtPassport"
                                                                       type="text" id="ContentPlaceHolder1_txtPassport"
                                                                       class="form-control"
                                                                       placeholder="পাসপোর্ট নং (ইংরেজি) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label8"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">জন্ম নিবন্ধন নং (ইংরেজি)</span>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-briefcase fa"
                                                                        aria-hidden="true"></i></span>
                                                                <input name="ctl00$ContentPlaceHolder1$txtBirthRegNo"
                                                                       type="text"
                                                                       id="ContentPlaceHolder1_txtBirthRegNo"
                                                                       class="form-control"
                                                                       placeholder="জন্ম নিবন্ধন নং (ইংরেজি) দিন">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">
                                                    <div class="form-group" style="margin-top: 5px; margin-left: 1px">
                                                 <span>
                                                     <strong>
                                                         <span id="ContentPlaceHolder1_Label24"
                                                               style="text-decoration:underline;">বর্তমান ঠিকানা : </span>
                                                     </strong>
                                                 </span>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label19"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">হোল্ডিং নং (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPreHoldingBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPreHoldingBN"
                                                                   class="form-control"
                                                                   placeholder="হোল্ডিং নং (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreHoldingBN"
                                                                data-val-errormessage="হোল্ডিং নং (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator8"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">হোল্ডিং নং (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label9"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">হোল্ডিং নং (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPreHoldingEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPreHoldingEN"
                                                                   class="form-control"
                                                                   placeholder="হোল্ডিং নং (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreHoldingEN"
                                                                data-val-errormessage="হোল্ডিং নং (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator14"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">হোল্ডিং নং (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label14"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">বিস্তারিত (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <textarea name="ctl00$ContentPlaceHolder1$txtPreDetailsBN"
                                                                      rows="2" cols="20"
                                                                      id="ContentPlaceHolder1_txtPreDetailsBN"
                                                                      class="form-control"
                                                                      placeholder="বিস্তারিত (বাংলা) দিন"></textarea>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreDetailsBN"
                                                                data-val-errormessage="বিস্তারিত (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator6"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">বিস্তারিত (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label30"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">বিস্তারিত (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <textarea name="ctl00$ContentPlaceHolder1$txtPreDetailsEN"
                                                                      rows="2" cols="20"
                                                                      id="ContentPlaceHolder1_txtPreDetailsEN"
                                                                      class="form-control"
                                                                      placeholder="বিস্তারিত (ইংরেজি) দিন"></textarea>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreDetailsEN"
                                                                data-val-errormessage="বিস্তারিত (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator15"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">বিস্তারিত (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label36"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">রোড (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPreRoadBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPreRoadBN"
                                                                   class="form-control" placeholder="রোড (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreRoadBN"
                                                                data-val-errormessage="রোড (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator2"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">রোড (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label37"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">রোড (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPreRoadEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPreRoadEN"
                                                                   class="form-control" placeholder="রোড (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreRoadEN"
                                                                data-val-errormessage="রোড (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator16"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">রোড (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label38"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">গ্রাম/মহল্লা (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPreVillageBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPreVillageBN"
                                                                   class="form-control"
                                                                   placeholder="গ্রাম/মহল্লা (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreVillageBN"
                                                                data-val-errormessage="গ্রাম/মহল্লা (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator10"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">গ্রাম/মহল্লা (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label39"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">গ্রাম/মহল্লা (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPreVillageEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPreVillageEN"
                                                                   class="form-control"
                                                                   placeholder="গ্রাম/মহল্লা (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPreVillageEN"
                                                                data-val-errormessage="গ্রাম/মহল্লা (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator17"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">গ্রাম/মহল্লা (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label40"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পোস্ট কোড (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPrePostCodeBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPrePostCodeBN"
                                                                   class="form-control"
                                                                   placeholder="পোস্ট কোড (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPrePostCodeBN"
                                                                data-val-errormessage="পোস্ট কোড (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator18"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">পোস্ট কোড (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label41"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পোস্ট কোড (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPrePostCodeEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPrePostCodeEN"
                                                                   class="form-control"
                                                                   placeholder="পোস্ট কোড (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPrePostCodeEN"
                                                                data-val-errormessage="পোস্ট কোড (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator19"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">পোস্ট কোড (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label10"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">বিভাগ </span>
                                                        <div class="col-md-8">
                                                            <select name="ctl00$ContentPlaceHolder1$ddPreDivision"
                                                                    onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddPreDivision\&#39;,\&#39;\&#39;)&#39;, 0)"
                                                                    id="ContentPlaceHolder1_ddPreDivision"
                                                                    class="form-control">
                                                                <option selected="selected" value="">--বাছাই করুন--
                                                                </option>
                                                                <option value="1">বরিশাল</option>
                                                                <option value="2">চট্টগ্রাম</option>
                                                                <option value="3">ঢাকা</option>
                                                                <option value="4">খুলনা</option>
                                                                <option value="5">রাজশাহী</option>
                                                                <option value="6">রংপুর</option>
                                                                <option value="7">সিলেট</option>
                                                                <option value="9">ময়মনসিংহ</option>

                                                            </select>

                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_ddPreDivision"
                                                                data-val-errormessage="বিভাগ বাছাই করুন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator3"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">বিভাগ বাছাই করুন</span>
                                                        </div>

                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label13"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">জেলা </span>
                                                        <div class="col-md-8">
                                                            <select name="ctl00$ContentPlaceHolder1$ddPreDistrict"
                                                                    onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddPreDistrict\&#39;,\&#39;\&#39;)&#39;, 0)"
                                                                    id="ContentPlaceHolder1_ddPreDistrict"
                                                                    class="form-control">
                                                                <option selected="selected" value="">--বাছাই করুন--
                                                                </option>

                                                            </select>

                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_ddPreDistrict"
                                                                data-val-errormessage="জেলা বাছাই করুন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator5"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">জেলা বাছাই করুন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label15"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">থানা</span>
                                                        <div class="col-md-8">
                                                            <select name="ctl00$ContentPlaceHolder1$ddPreThana"
                                                                    id="ContentPlaceHolder1_ddPreThana"
                                                                    class="form-control">
                                                                <option value="">--বাছাই করুন--</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">
                                                    <div class="form-group">
                                                        <div class="col-md-4" style="margin-top: 5px; margin-left: 1px">
                                                     <span>
                                                         <strong>
                                                             <span id="ContentPlaceHolder1_Label25"
                                                                   style="text-decoration:underline;">স্থায়ী ঠিকানা: </span>
                                                         </strong>
                                                     </span>
                                                        </div>
                                                        <div class="col-md-1"
                                                             style="margin-top: 15px; margin-left: 1px">
                                                     <span>
                                                         <strong>
                                                             <div id="ContentPlaceHolder1_UpdatePanel8">

                                                                     <input id="ContentPlaceHolder1_CheckBox1"
                                                                            type="checkbox"
                                                                            name="ctl00$ContentPlaceHolder1$CheckBox1"
                                                                            onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$CheckBox1\&#39;,\&#39;\&#39;)&#39;, 0)">

	</div>
                                                         </strong>
                                                     </span>
                                                        </div>
                                                        <div class="col-md-5"
                                                             style="margin-top: 15px; margin-left: 1px">
                                                     <span>
                                                         <strong>
                                                             <span id="ContentPlaceHolder1_Label29">বর্তমান ঠিকানার অনুরুপ </span>
                                                         </strong>
                                                     </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label23"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">হোল্ডিং নং (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerHoldingBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerHoldingBN"
                                                                   class="form-control"
                                                                   placeholder="হোল্ডিং নং (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerHoldingBN"
                                                                data-val-errormessage="হোল্ডিং নং (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator9"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">হোল্ডিং নং (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <span id="ContentPlaceHolder1_Label16"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">হোল্ডিং নং (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerHoldingEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerHoldingEN"
                                                                   class="form-control"
                                                                   placeholder="হোল্ডিং নং (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerHoldingEN"
                                                                data-val-errormessage="হোল্ডিং নং (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator20"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">হোল্ডিং নং (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label18"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">বিস্তারিত (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <textarea name="ctl00$ContentPlaceHolder1$txtPerDetailsBN"
                                                                      rows="2" cols="20"
                                                                      id="ContentPlaceHolder1_txtPerDetailsBN"
                                                                      class="form-control"
                                                                      placeholder="বিস্তারিত (বাংলা) দিন"></textarea>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerDetailsBN"
                                                                data-val-errormessage="বিস্তারিত (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator7"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">বিস্তারিত (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label43"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">বিস্তারিত (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <textarea name="ctl00$ContentPlaceHolder1$txtPerDetailsEN"
                                                                      rows="2" cols="20"
                                                                      id="ContentPlaceHolder1_txtPerDetailsEN"
                                                                      class="form-control"
                                                                      placeholder="বিস্তারিত (ইংরেজি) দিন"></textarea>
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerDetailsEN"
                                                                data-val-errormessage="বিস্তারিত (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator23"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">বিস্তারিত (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label31"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">রোড (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerRoadBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerRoadBN"
                                                                   class="form-control" placeholder="রোড (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerRoadBN"
                                                                data-val-errormessage="রোড (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator11"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">রোড (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label44"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">রোড (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerRoadEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerRoadEN"
                                                                   class="form-control" placeholder="রোড (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerRoadEN"
                                                                data-val-errormessage="রোড (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator24"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">রোড (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label42"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">গ্রাম/মহল্লা (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerVillageBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerVillageBN"
                                                                   class="form-control"
                                                                   placeholder="গ্রাম/মহল্লা (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerVillageBN"
                                                                data-val-errormessage="গ্রাম/মহল্লা (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator4"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">গ্রাম/মহল্লা (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label45"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">গ্রাম/মহল্লা (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerVillageEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerVillageEN"
                                                                   class="form-control"
                                                                   placeholder="গ্রাম/মহল্লা (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerVillageEN"
                                                                data-val-errormessage="গ্রাম/মহল্লা (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator25"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">গ্রাম/মহল্লা (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label46"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পোস্ট কোড (বাংলা) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerPostCodeBN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerPostCodeBN"
                                                                   class="form-control"
                                                                   placeholder="পোস্ট কোড (বাংলা) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerPostCodeBN"
                                                                data-val-errormessage="পোস্ট কোড (বাংলা) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator21"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">পোস্ট কোড (বাংলা) দিন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label47"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">পোস্ট কোড (ইংরেজি) </span>
                                                        <div class="col-md-8">
                                                            <input name="ctl00$ContentPlaceHolder1$txtPerPostCodeEN"
                                                                   type="text" id="ContentPlaceHolder1_txtPerPostCodeEN"
                                                                   class="form-control"
                                                                   placeholder="পোস্ট কোড (ইংরেজি) দিন">
                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_txtPerPostCodeEN"
                                                                data-val-errormessage="পোস্ট কোড (ইংরেজি) দিন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator22"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">পোস্ট কোড (ইংরেজি) দিন</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label17"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">বিভাগ </span>
                                                        <div class="col-md-8">
                                                            <select name="ctl00$ContentPlaceHolder1$ddPerDivision"
                                                                    onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddPerDivision\&#39;,\&#39;\&#39;)&#39;, 0)"
                                                                    id="ContentPlaceHolder1_ddPerDivision"
                                                                    class="form-control">
                                                                <option selected="selected" value="">--বাছাই করুন--
                                                                </option>
                                                                <option value="1">বরিশাল</option>
                                                                <option value="2">চট্টগ্রাম</option>
                                                                <option value="3">ঢাকা</option>
                                                                <option value="4">খুলনা</option>
                                                                <option value="5">রাজশাহী</option>
                                                                <option value="6">রংপুর</option>
                                                                <option value="7">সিলেট</option>
                                                                <option value="9">ময়মনসিংহ</option>

                                                            </select>

                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_ddPerDivision"
                                                                data-val-errormessage="বিভাগ বাছাই করুন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator12"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">বিভাগ বাছাই করুন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label20"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">জেলা </span>
                                                        <div class="col-md-8">
                                                            <select name="ctl00$ContentPlaceHolder1$ddPerDistrict"
                                                                    onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddPerDistrict\&#39;,\&#39;\&#39;)&#39;, 0)"
                                                                    id="ContentPlaceHolder1_ddPerDistrict"
                                                                    class="form-control">
                                                                <option selected="selected" value="">--বাছাই করুন--
                                                                </option>

                                                            </select>

                                                            <span
                                                                data-val-controltovalidate="ContentPlaceHolder1_ddPerDistrict"
                                                                data-val-errormessage="জেলা বাছাই করুন"
                                                                id="ContentPlaceHolder1_RequiredFieldValidator1"
                                                                class="text-warning" data-val="true"
                                                                data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid"
                                                                data-val-initialvalue="" style="visibility:hidden;">জেলা বাছাই করুন</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <span id="ContentPlaceHolder1_Label26"
                                                              class="col-md-4 control-label"
                                                              style="font-weight:normal;text-align: left">থানা</span>
                                                        <div class="col-md-8">
                                                            <select name="ctl00$ContentPlaceHolder1$ddPerThana"
                                                                    id="ContentPlaceHolder1_ddPerThana"
                                                                    class="form-control">
                                                                <option value="">--বাছাই করুন--</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">
                                                    <div class="form-group" style="margin-top: 5px; margin-left: 1px">
                                                 <span>
                                                     <strong>
                                                         <span id="ContentPlaceHolder1_Label28"
                                                               style="text-decoration:underline;">ফিস : </span>
                                                     </strong>
                                                 </span>
                                                    </div>

                                                    <div id="ContentPlaceHolder1_FeesViewDiv" class="form-group">
                                                        <div class="col-md-12">
                                                            <div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>

                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btnUpdate"
                                                               value="সংরক্ষণ করুন"
                                                               onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnUpdate&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))"
                                                               id="ContentPlaceHolder1_btnUpdate"
                                                               class="btn btn-success">
                                                    </div>
                                                </div>
                                                <br>

                                            </div>
                                        </div>

                                        <!-- Admin Dashboard End-->

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






