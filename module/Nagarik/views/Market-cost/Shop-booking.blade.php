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
                        <i class="fa fa-plus-circle"></i> আবেদনকারীর বিস্তারিত বিবরণ
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
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="title_left">

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                    <span id="ContentPlaceHolder1_lblFirstName">আবেদনকারীর নাম</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtfirstname" type="text" id="txtfirstname" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                    <span id="ContentPlaceHolder1_lblLastName">Last Name</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtlastname" type="text" id="ContentPlaceHolder1_txtlastname" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblfathername">পিতা/স্বামীর নাম</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtfathername" type="text" id="ContentPlaceHolder1_txtfathername" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblmothername">মাতার নাম</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtmothername" type="text" id="ContentPlaceHolder1_txtmothername" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblbirthdate">জন্ম তারিখ</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtbirthdate" type="text" id="txtbirthdate" class="date-picker form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman', Georgia, Serif;" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblnationality">জাতিয়তা</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtnationality" type="text" id="txtnationality" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">

                                                    <span id="ContentPlaceHolder1_lblapplsex">লিঙ্গ </span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$ddsex" id="ContentPlaceHolder1_ddsex" class="form-control">
                                                        <option value="-1">-</option>
                                                        <option value="M">পুরুষ</option>
                                                        <option value="F">মহিলা</option>
                                                        <option value="U">উভয়</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblpermanentaddress">স্থায়ী ঠিকানা</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea name="ctl00$ContentPlaceHolder1$txtpermanentaddress" rows="2" cols="20" id="ContentPlaceHolder1_txtpermanentaddress" class="form-control col-md-7 col-xs-12">
</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lbladdress">বর্তমান ঠিকানা</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea name="ctl00$ContentPlaceHolder1$txtcommaddress" rows="2" cols="20" id="ContentPlaceHolder1_txtcommaddress" class="form-control col-md-7 col-xs-12">
</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblnationalid">জাতীয় পরিচয় পত্র নং</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtnationalid" type="text" id="ContentPlaceHolder1_txtnationalid" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblprofession">পেশা</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtproffession" type="text" id="ContentPlaceHolder1_txtproffession" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblpresentbusiness">বর্তমানে কি ব্যবসায়রত (প্রযোজ্য ক্ষেত্রে) </span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtnatureofbusinesstobeundertaken" type="text" id="ContentPlaceHolder1_txtnatureofbusinesstobeundertaken" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lbltin">Tax Identification No. ( যদি থাকে)</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtTIN" type="text" id="ContentPlaceHolder1_txtTIN" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblbin">Business Identification No. (যদি থাকে)</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtbin" type="text" id="ContentPlaceHolder1_txtbin" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblpassport">পাসর্পোট নম্বর (যদি থাকে)</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtpassport" type="text" id="ContentPlaceHolder1_txtpassport" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblincomecertificate">বিগত বৎসরের আয়কর প্রধানের সার্টিফিকেট (যদি থাকে)</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select name="ctl00$ContentPlaceHolder1$dditcert" id="ContentPlaceHolder1_dditcert" class="form-control">
                                                        <option value="NO">No</option>
                                                        <option value="YES">Yes</option>

                                                    </select>
                                                    <input type="file" name="ctl00$ContentPlaceHolder1$FileUpload2" id="ContentPlaceHolder1_FileUpload2" onchange="PreviewImageBeforeUpload1(this);" />
                                                    <img id="ContentPlaceHolder1_Image2" src="" style="width:50px;" />
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$hdnidimage" id="ContentPlaceHolder1_hdnidimage" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lbltypeofapplication">আবেদনের ধরন</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$Code1$ddCode" id="ContentPlaceHolder1_Code1_ddCode" class="form-control">
                                                        <option selected="selected" value="-1">-</option>
                                                        <option value="MUKTI YODHYA">মুক্তি  যোদ্ধা</option>
                                                        <option value="SPECIAL CONTRIBUTION">বিশেষ ক্ষেত্রে অবদান</option>
                                                        <option value="HANDICAPPED">প্রতিবন্ধী</option>
                                                        <option value="GENERAL QUOTA">সাধারণ কোটা</option>
                                                        <option value="MAYOR QUOTA">মেয়র  কোটা</option>
                                                        <option value="OTHERS">অন্যান্য</option>

                                                    </select>
                                                    <span id="ContentPlaceHolder1_Code1_CompareValidator1" style="visibility:hidden;">*</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_nameofthemarket">মার্কেটের নাম</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">


                                                    <select name="ctl00$ContentPlaceHolder1$ddbazar" id="ContentPlaceHolder1_ddbazar" class="form-control dropdownnew" style="font-family: SutonnyMJ;">
                                                        <option value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlbazar_ClientState" id="ContentPlaceHolder1_cdlbazar_ClientState" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblfloor">তলা নং</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select name="ctl00$ContentPlaceHolder1$ddfloor" id="ContentPlaceHolder1_ddfloor" class="form-control">
                                                        <option value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlfloor_ClientState" id="ContentPlaceHolder1_cdlfloor_ClientState" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblshopno">দোকান নং</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select name="ctl00$ContentPlaceHolder1$ddstall" id="ContentPlaceHolder1_ddstall" class="form-control" onchange="Fetchvolume()">
                                                        <option selected="selected" value=""></option>

                                                    </select>
                                                    <input type="hidden" name="ctl00$ContentPlaceHolder1$cdlstall_ClientState" id="ContentPlaceHolder1_cdlstall_ClientState" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblmsp">সালামী ফি (টাকা)</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtmrp" type="text" id="ContentPlaceHolder1_txtmrp" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblvolumeofthestall">প্রার্থীত দোকানের আয়তন</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtvolumeofthestall" type="text" id="ContentPlaceHolder1_txtvolumeofthestall" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblothershop">কর্পোরেশনের কোন মার্কেটে নিজ বা পরিবারের সদস্যের নামে দোকান বরাদ্দ আছে কিনা ?</span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="ctl00$ContentPlaceHolder1$ddowner" id="ContentPlaceHolder1_ddowner" class="form-control">
                                                        <option value="NO">No</option>
                                                        <option value="YES">Yes</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblpayorderno">পে-অর্ডার/চেক নং</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtpono" type="text" id="ContentPlaceHolder1_txtpono" class="form-control col-md-7 col-xs-12" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblpayorderdate">পে-অর্ডার/চেক তারিখ</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtpodate" type="text" id="txtpodate" class="form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman';" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblpayorderamount">পে অর্ডার টাকার পরিমান </span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtpoamount" type="text" id="ContentPlaceHolder1_txtpoamount" class="form-control col-md-7 col-xs-12" onblur="fnblur(this)" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblbankname">ব্যাংকের নাম</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtbankname" type="text" id="ContentPlaceHolder1_txtbankname" class="form-control col-md-7 col-xs-12" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblbranch">ব্যাংকের শাখা</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtbranch" type="text" id="ContentPlaceHolder1_txtbranch" class="form-control col-md-7 col-xs-12" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblaccountno">আবেদনকারীর হিসাব নং ( যে হিসাবে তিনি টাকা ফেরত নিতে চান) </span>

                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtapplbankac" type="text" id="ContentPlaceHolder1_txtapplbankac" class="form-control col-md-7 col-xs-12" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label1">ব্যাংকের নাম ( যে ব্যাংকে তিনি টাকা ফেরত নিতে চান)</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtreturnbank" type="text" id="ContentPlaceHolder1_txtreturnbank" class="form-control col-md-7 col-xs-12" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_Label2">ব্যাংকের শাখা  ( যে ব্যাংকে তিনি টাকা ফেরত নিতে চান)</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="ctl00$ContentPlaceHolder1$txtreturnbankbranch" type="text" id="ContentPlaceHolder1_txtreturnbankbranch" class="form-control col-md-7 col-xs-12" />

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblNewApplDate">আবেদনের তারিখ</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$applicationdate" type="text" id="applicationdate" class="date-picker form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman', Georgia, Serif;" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblMobileNo" for="txtmobileno">মোবাইল নং</span>
                                                    <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtmobileno" type="text" id="ContentPlaceHolder1_txtmobileno" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblaltcontno">বিকল্প যোগাযোগের নং</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtalternatecontactno" type="text" id="ContentPlaceHolder1_txtalternatecontactno" class="form-control col-md-7 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblemailid1">ই-মেইল আইডি</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtemailid" type="text" id="ContentPlaceHolder1_txtemailid" class="form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman';" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="ContentPlaceHolder1_lblemailid2">বিকল্প ই-মেইল আইডি</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input name="ctl00$ContentPlaceHolder1$txtalternateemailid" type="text" id="ContentPlaceHolder1_txtalternateemailid" class="form-control col-md-7 col-xs-12" style="font-family: 'Times New Roman';" />
                                                </div>
                                            </div>


                                            <div class="ln_solid"></div>


                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                            <input type="submit" name="ctl00$ContentPlaceHolder1$btnSave" value="দাখিল করুন" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnSave&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ContentPlaceHolder1_btnSave" class="btn btn-primary" />
                                            <input type="submit" name="ctl00$ContentPlaceHolder1$btnCancel" value="বাতিল করুন" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnCancel&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ContentPlaceHolder1_btnCancel" class="btn btn-success" />
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>


                </div>
            </div>

@endsection






