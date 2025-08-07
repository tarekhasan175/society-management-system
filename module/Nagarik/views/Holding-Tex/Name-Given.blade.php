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
                        <i class="fa fa-plus-circle"></i> ই-হোল্ডিং নম্বর
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
                            <div class="col-sm-8 col-sm-offset-1">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        <span id=" ">ই-হোল্ডিং নম্বর</span>
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name=" " type="text" id=" " class="form-control col-md-7 col-xs-12" required="required" readonly="readonly"/>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="submit" name=" " value="অনুসন্ধান করুন" id=" " class="btn btn-primary"/>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                    <br><br>
                </div>
            </div>

        </div>
    </div>



    <div class="row form-page">
        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> বিবরণ
                    </h4>
                    <span class="widget-toolbar">
                    </span>
                </div>
                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <div style="margin: 20px;">

                        </div>


                        <div class="row ">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div id="demo-form2" data-parsley-validate
                                             class="form-horizontal form-label-left">


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id=" ">অঞ্চল</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name=" " id=" " disabled="disabled" class="aspNetDisabled form-control dropdownnew" style="font-family: sutonnyMJ;">
                                                        <option selected="selected" value=""></option>
                                                    </select>
                                                    <input type="hidden" name="" id=""/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">ওয়ার্ড</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="" id="" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>
                                                    </select>
                                                    <input type="hidden" name="" id=""/>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">সেক্টর/সেকশন</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="" id="" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>
                                                    </select>
                                                    <input type="hidden" name="" id=""/>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">এরিয়া/ব্লক</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="" id="" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>
                                                    </select>
                                                    <input type="hidden" name="" id=""/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">রোড</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="" id="" class="form-control" style="font-family: sutonnyMJ;">
                                                        <option value=""></option>
                                                    </select>
                                                    <input type="hidden" name="" id=""/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">হাউস নম্বর</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="" type="text" id="" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">আবেদনের তারিখ</span>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="" type="text" id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" style="font-family: 'Times New Roman', Georgia, Serif;"/>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">আবেদনকারীর নাম</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="" type="text" id="" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span
                                                        id="">আবেদনকারীর বর্তমান ঠিকানা</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <textarea name="" rows="8" cols="20" id="" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span
                                                        id="">আবেদনকারীর ই-হোল্ডিং নম্বর</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <textarea name="" rows="8" cols="20" id="" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">ষোলো আনা / আংশিক</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="" type="text" id="" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">জমির পরিমাণ , জমির চৌহিদ্দি</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <textarea name="" rows="8" cols="20" id="" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">সংক্ষিপ্ত বিবরণ</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="" rows="8" cols="20" id="" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <span id="">ফী</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="" type="text" value="৫০.০০" readonly="readonly" id="" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                    <span id="">পেমেন্ট মেথড </span>
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="" id="" class="form-control">
                                                        <option value="1">DBBL Nexus</option>
                                                        <option value="2">DBBL Master</option>
                                                        <option value="3">DBBL Visa</option>
                                                        <option value="4">Visa card</option>
                                                        <option value="5">Master Card</option>
                                                        <option value="6">Mobile Banking</option>
                                                    </select>

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

    <div class="row form-page">
        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> নথিপত্র সংযুক্তিকরণ
                    </h4>
                    <span class="widget-toolbar">
                    </span>
                </div>
                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <div style="margin: 20px;">

                        </div>


                        <div class="row ">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">

                                            <span class="flat"><input id="" type="checkbox" name=""/></span>
                                                <span id="">মালিকানা দলিল</span></label>


                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="" type="text" id="" class="form-control" placeholder="&lt;&lt;আইডি>>"/>
                                            </div>

                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                             <textarea name="" rows="2" cols="20" id="" class="form-control col-md-7 col-xs-12" placeholder="&lt;&lt;মন্তব্য>>"></textarea>
                                            </div>

                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple" name="" id="" onchange="fntest(this,1);"/>
                                                </label>
                                                <span id="sp1"></span>
                                            </div>
                                        </div>



                                        <div class="form-group">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat">
                                                <input id="" type="checkbox" name=""/>
                                            </span>
                                                <span id="">উত্তরাধিকারীদের সনাক্তকরণ/ওয়ারিশান সনদপত্র কপি :</span>
                                            </label>


                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="" type="text" id="" class="form-control" placeholder="&lt;&lt;আইডি>>"/>
                                            </div>


                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                              <textarea name="" rows="2" cols="20" id="" class="form-control col-md-7 col-xs-12" placeholder="&lt;&lt;মন্তব্য>>"></textarea>
                                            </div>


                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple" name="" id="" onchange="fntest(this,2);"/>
                                                </label>
                                                <span id="sp2"></span>
                                            </div>

                                        </div>


                                        <div class="form-group" style="display:none;">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                <span class="flat">
                                                    <input id="" type="checkbox"  name=""/>
                                                </span>
                                                <span id="  ">Court succession/ degree certificate</span>
                                            </label>


                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name=" " type="text" id=" " class="form-control"/>
                                            </div>

                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                                <textarea name="" rows="2" cols="20" id="" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>

                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple" name="" id="" onchange="fntest(this,3);"/>
                                                </label>
                                                <span id="sp3"></span>
                                            </div>

                                        </div>


                                        <div class="form-group" style="display:none;">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                 <span class="flat">
                                                   <input id="" type="checkbox" name=""/>
                                                 </span>
                                                 <span id=" ">Heba-bel aajnama deed</span>
                                            </label>

                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="" type="text" id="" class="form-control"/>
                                            </div>


                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                                <textarea name="" rows="2" cols="20" id="" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>

                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple" name="" id="" onchange="fntest(this,4);"/>
                                                </label>
                                                <span id="sp4"></span>
                                            </div>

                                        </div>

                                        <div class="form-group" style="display:none;">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">

                                            <span class="flat">
                                                <input id="" type="checkbox" name=""/>
                                            </span>
                                                <span id="">Solonama deed</span></label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="" type="text" id="" class="form-control"/>
                                            </div>


                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                               <textarea name="" rows="2" cols="20"  id="" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>


                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple" name="" id="" onchange="fntest(this,5);"/>
                                                </label>
                                                <span id="sp5"></span>
                                            </div>


                                        </div>

                                        <div class="form-group" style="display:none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat">
                                                <input id="" type="checkbox" name=""/>
                                            </span>
                                                <span id="">Gifted deed</span>
                                            </label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="" type="text" id="" class="form-control"/>
                                            </div>

                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                                <textarea name="" rows="2" cols="20"  id="" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>


                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple"  name="" id="" onchange="fntest(this,6);"/>
                                                </label>
                                                <span id="sp6"></span>
                                            </div>

                                        </div>


                                        <div class="form-group" style="display:none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat">
                                                <input id="" type="checkbox"  name=""/>
                                            </span>
                                                <span id="">Correction deed</span>
                                            </label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="" type="text" id="" class="form-control"/>
                                            </div>

                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                               <textarea name="" rows="2" cols="20" id="" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>

                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple" name=""  id="" onchange="fntest(this,7);"/>
                                                </label>
                                                <span id="sp7"></span>
                                            </div>

                                        </div>



                                        <div class="form-group" style="display:none;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat"><input id="ContentPlaceHolder1_chk8" type="checkbox"
                                                                      name="ctl00$ContentPlaceHolder1$chk8"/></span>
                                                <span id="ContentPlaceHolder1_lblLease_deed">Lease deed</span></label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtdoc8" type="text"
                                                       id="ContentPlaceHolder1_txtdoc8" class="form-control"/>
                                            </div>
                                            <div class="col-md-4 col-sm-5 col-xs-12">

                            <textarea name="ctl00$ContentPlaceHolder1$txtrem8" rows="2" cols="20"
                                      id="ContentPlaceHolder1_txtrem8" class="form-control col-md-7 col-xs-12">
</textarea>
                                            </div>
                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple"
                                                           name="ctl00$ContentPlaceHolder1$uploadfil8"
                                                           id="ContentPlaceHolder1_uploadfil8" onchange="fntest(this,8);"/>
                                                </label>
                                                <span id="sp8"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat"><input id="ContentPlaceHolder1_chk9" type="checkbox"
                                                                      name="ctl00$ContentPlaceHolder1$chk9"/></span>
                                                <span
                                                    id="ContentPlaceHolder1_lblcspa">সি, এস/এস, এ, পর্চা/সিটি জরিপ কপি</span></label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtdoc9" type="text"
                                                       id="ContentPlaceHolder1_txtdoc9" class="form-control"
                                                       placeholder="&lt;&lt;আইডি>>"/>
                                            </div>
                                            <div class="col-md-4 col-sm-5 col-xs-12">

                            <textarea name="ctl00$ContentPlaceHolder1$txtrem9" rows="2" cols="20"
                                      id="ContentPlaceHolder1_txtrem9" class="form-control col-md-7 col-xs-12">
</textarea>
                                            </div>
                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple"
                                                           name="ctl00$ContentPlaceHolder1$uploadfil9"
                                                           id="ContentPlaceHolder1_uploadfil9" onchange="fntest(this,9);"/>
                                                </label>
                                                <span id="sp9"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat"><input id="ContentPlaceHolder1_chk10" type="checkbox"
                                                                      name="ctl00$ContentPlaceHolder1$chk10"/></span>
                                                <span id="ContentPlaceHolder1_lbldcr">ডুপ্লিকেট কার্বন রশিদ/নকল কপি (ডি.সি.আর)</span></label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtdoc10" type="text"
                                                       id="ContentPlaceHolder1_txtdoc10" class="form-control"
                                                       placeholder="&lt;&lt;আইডি>>"/>
                                            </div>
                                            <div class="col-md-4 col-sm-5 col-xs-12">

                            <textarea name="ctl00$ContentPlaceHolder1$txtrem10" rows="2" cols="20"
                                      id="ContentPlaceHolder1_txtrem10" class="form-control col-md-7 col-xs-12">
</textarea>
                                            </div>
                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple"
                                                           name="ctl00$ContentPlaceHolder1$uploadfil10"
                                                           id="ContentPlaceHolder1_uploadfil10"
                                                           onchange="fntest(this,10);"/>
                                                </label>
                                                <span id="sp10"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat"><input id="ContentPlaceHolder1_chk11" type="checkbox"
                                                                      name="ctl00$ContentPlaceHolder1$chk11"/></span>
                                                <span id="ContentPlaceHolder1_lblgpd">সরকারী প্লটের ধরণের জন্য সংশ্লিষ্ট সংস্থার/মন্ত্রণালয় অনুমোদনের প্রমাণপত্র</span></label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtdoc11" type="text"
                                                       id="ContentPlaceHolder1_txtdoc11" class="form-control"
                                                       placeholder="&lt;&lt;আইডি>>"/>
                                            </div>
                                            <div class="col-md-4 col-sm-5 col-xs-12">

                            <textarea name="ctl00$ContentPlaceHolder1$txtrem11" rows="2" cols="20"
                                      id="ContentPlaceHolder1_txtrem11" class="form-control col-md-7 col-xs-12">
</textarea>
                                            </div>
                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple"
                                                           name="ctl00$ContentPlaceHolder1$uploadfil11"
                                                           id="ContentPlaceHolder1_uploadfil11"
                                                           onchange="fntest(this,11);"/>
                                                </label>
                                                <span id="sp11"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span class="flat"><input id="ContentPlaceHolder1_chk12" type="checkbox"
                                                                      name="ctl00$ContentPlaceHolder1$chk12"/></span>
                                                <span id="ContentPlaceHolder1_lbllandtax" placeholder="&lt;&lt;আইডি>>">ল্যান্ড ট্যাক্স/ভূমি কর রশিদ</span></label>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input name="ctl00$ContentPlaceHolder1$txtdoc12" type="text"
                                                       id="ContentPlaceHolder1_txtdoc12" class="form-control"/>
                                            </div>
                                            <div class="col-md-4 col-sm-5 col-xs-12">

                            <textarea name="ctl00$ContentPlaceHolder1$txtrem12" rows="2" cols="20"
                                      id="ContentPlaceHolder1_txtrem12" class="form-control col-md-7 col-xs-12">
</textarea>
                                            </div>
                                            <div class="col-md-2 col-sm-5 col-xs-12">
                                                <label class="file-upload">
                                                    <span><strong>আপলোড করুন</strong></span>
                                                    <input type="file" multiple="multiple"
                                                           name="ctl00$ContentPlaceHolder1$uploadfil12"
                                                           id="ContentPlaceHolder1_uploadfil12"
                                                           onchange="fntest(this,12);"/>
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
                                    onclick="showPage(-1)">Previous
                            </button>
                        </div>
                        <div class="col-md-6 align-left">
                            <button type="button" class="nexts btn btn-primary" onclick="showPage(1)">Next</button>
                            <input type="submit" value="দাখিল করুন" id=" " style="display: none"
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

{{--    <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--        <div class="x_panel">--}}
{{--            <div class="form-group">--}}
{{--                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">--}}

{{--                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnSave" value="পে এন্ড সাবমিট" id="ContentPlaceHolder1_btnSave" class="btn btn-primary" />--}}
{{--                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnCancel" value="ক্যানসেল" id="ContentPlaceHolder1_btnCancel" class="btn btn-success" />--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}





    @include('Holding-Tex.side-section.newApply.newApply_js')



@endsection






