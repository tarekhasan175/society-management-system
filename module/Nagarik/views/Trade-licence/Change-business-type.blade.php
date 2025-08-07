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
                        <i class="fa fa-plus-circle"></i>  ব্যবসায়ের ধরণ পরিবর্তনের আবেদন
                    </h4>

                    <span class="widget-toolbar">
{
                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row">
                            <div class="">

                                <div class="col-lg-12">
                                    <div class="panel ">

                                        <div class="panel-body">
                                            <!-- Admin Dashboard-->

                                            <div class="form-horizontal" style="padding-left: 0%; padding-top: 2%">
                                                <div id="ContentPlaceHolder1_UpdatePanel1">

                                                    <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <span id="ContentPlaceHolder1_lblMgs" class="text-danger" style="color:Red;font-size:X-Large;font-weight:bold;"></span>
                                                                <input type="hidden" name="ctl00$ContentPlaceHolder1$txtBusSubCatList" id="ContentPlaceHolder1_txtBusSubCatList">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group required">
                                                            <span id="ContentPlaceHolder1_lblSearch" class="col-md-4 control-label" style="font-weight:bold;text-align: left">লাইসেন্স নং </span>
                                                            <div class="col-md-5">
                                                                <input name="ctl00$ContentPlaceHolder1$txtSerachLicense" type="text" id="ContentPlaceHolder1_txtSerachLicense" class="form-control" placeholder="লাইসেন্স নং" style="font-weight:bold;">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnSearch" value="অনুসন্ধান" id="ContentPlaceHolder1_btnSearch" class="btn btn-primary" style="font-weight:bold;">
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div class="form-group">
                                                            <span id="ContentPlaceHolder1_Label1" class="col-md-4 control-label" style="font-weight:bold;text-align: left">লাইসেন্স নং </span>
                                                            <div class="col-md-8">
                                                                <input name="ctl00$ContentPlaceHolder1$txtGetLicense" type="text" id="ContentPlaceHolder1_txtGetLicense" disabled="disabled" class="aspNetDisabled form-control">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <span id="ContentPlaceHolder1_Label12" class="col-md-4 control-label" style="font-weight:bold;text-align: left">ব্যবসা প্রতিষ্ঠানের নাম </span>
                                                            <div class="col-md-8">
                                                                <input name="ctl00$ContentPlaceHolder1$txtBusName" type="text" id="ContentPlaceHolder1_txtBusName" disabled="disabled" class="aspNetDisabled form-control">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">
                                                        <div class="form-group" style="margin-top: 5px; margin-left: 1px">
                                                 <span>
                                                     <strong>
                                                         <span id="ContentPlaceHolder1_Label27" style="text-decoration:underline;">ব্যবসায়ের তথ্য : </span>
                                                     </strong>
                                                 </span>
                                                        </div>

                                                        <div class="form-group required">
                                                            <span id="ContentPlaceHolder1_Label7" class="col-md-4 control-label" style="font-size:Medium;font-weight:bold;text-align: left">ব্যবসায়ের প্রকৃতি </span>
                                                            <div class="col-md-8">
                                                                <table id="ContentPlaceHolder1_RadioButtonList1" class="aspNetDisabled radio-inline">
                                                                    <tbody><tr>
                                                                        <td><span class="aspNetDisabled"><input id="ContentPlaceHolder1_RadioButtonList1_0" type="radio" name="ctl00$ContentPlaceHolder1$RadioButtonList1" value="1" checked="checked" disabled="disabled"><label for="ContentPlaceHolder1_RadioButtonList1_0">কোম্পানী  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></span></td><td><span class="aspNetDisabled"><input id="ContentPlaceHolder1_RadioButtonList1_1" type="radio" name="ctl00$ContentPlaceHolder1$RadioButtonList1" value="2" disabled="disabled" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$RadioButtonList1$1\&#39;,\&#39;\&#39;)&#39;, 0)"><label for="ContentPlaceHolder1_RadioButtonList1_1">অন্যান্য - একক  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></span></td><td><span class="aspNetDisabled"><input id="ContentPlaceHolder1_RadioButtonList1_2" type="radio" name="ctl00$ContentPlaceHolder1$RadioButtonList1" value="3" disabled="disabled" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$RadioButtonList1$2\&#39;,\&#39;\&#39;)&#39;, 0)"><label for="ContentPlaceHolder1_RadioButtonList1_2">অন্যান্য - অংশীদারী  </label></span></td>
                                                                    </tr>
                                                                    </tbody></table>
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div id="ContentPlaceHolder1_AuthCapDiv" class="form-group required">
                                                            <span id="ContentPlaceHolder1_Label23" class="col-md-4 control-label" style="font-weight:bold;text-align: left">অনুমোদিত মূলধণ </span>
                                                            <div class="col-md-8">
                                                                <input name="ctl00$ContentPlaceHolder1$txtAuthCapital" type="text" id="ContentPlaceHolder1_txtAuthCapital" class="form-control" placeholder="অনুমোদিত মূলধণ">
                                                                <span data-val-controltovalidate="ContentPlaceHolder1_txtAuthCapital" data-val-errormessage="অনুমোদিত মূলধণ দিন" id="ContentPlaceHolder1_RequiredFieldValidator6" class="text-warning" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">অনুমোদিত মূলধণ দিন</span>
                                                            </div>
                                                        </div>

                                                        <div id="ContentPlaceHolder1_PaidCapDiv" class="form-group required">
                                                            <span id="ContentPlaceHolder1_Label24" class="col-md-4 control-label" style="font-weight:bold;text-align: left">পরিশোধিত মূলধণ </span>
                                                            <div class="col-md-8">
                                                                <input name="ctl00$ContentPlaceHolder1$txtPaidCapital" type="text" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$txtPaidCapital\&#39;,\&#39;\&#39;)&#39;, 0)" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" id="ContentPlaceHolder1_txtPaidCapital" class="form-control" placeholder="পরিশোধিত মূলধণ">
                                                                <span data-val-controltovalidate="ContentPlaceHolder1_txtPaidCapital" data-val-errormessage="পরিশোধিত মূলধণ দিন" id="ContentPlaceHolder1_RequiredFieldValidator7" class="text-warning" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">পরিশোধিত মূলধণ দিন</span>
                                                            </div>
                                                        </div>

                                                        <div id="ContentPlaceHolder1_BusCatDiv" class="form-group required">
                                                            <span id="ContentPlaceHolder1_Label30" class="col-md-4 control-label" style="font-weight:bold;text-align: left">ব্যবসায়ের ধরণ </span>
                                                            <div class="col-md-8">
                                                                <select name="ctl00$ContentPlaceHolder1$ddCategory" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddCategory\&#39;,\&#39;\&#39;)&#39;, 0)" id="ContentPlaceHolder1_ddCategory" class="form-control">
                                                                    <option selected="selected" value="">--বাছাই করুন--</option>
                                                                    <option value="108">অন্যান্য</option>
                                                                    <option value="102">অযান্ত্রিক যানবাহন</option>
                                                                    <option value="29">অলংকার/ শো-পিস</option>
                                                                    <option value="75">আইন ব্যাবসায়ী (স্ব-নিয়োজিত)</option>
                                                                    <option value="12">আইসক্রিম শপ উৎপাদনকারী/ পরিবেশক(লিমিটেড কোম্পানি না হইলে)</option>
                                                                    <option value="18">আটোমোবাইল মেরামতের দোকান/ ওয়ার্কশপ</option>
                                                                    <option value="13">আবাসিক হোটেল/ গেস্ট হাউজ/ রেস্ট হাউজ</option>
                                                                    <option value="22">আড়ত</option>
                                                                    <option value="87">ইট ভাটা</option>
                                                                    <option value="96">ইট, বালু, সিমেন্ট ও পাথর ব্যবসা(খুচরা)</option>
                                                                    <option value="6">উৎপাদনকারী/ পরিবেশক(লিমিটেড কোম্পানী না হইলে )</option>
                                                                    <option value="5">এজেন্সি/ রিপ্রেজেন্টেটিভ</option>
                                                                    <option value="37">এম,এস,রড/ সিমেন্ট/ সি আই শীট/ এ্যাংগেল/ প্লেইন শীট দোকান/ এজেন্ট</option>
                                                                    <option value="65">এল পি গ্যাস বিক্রেতা/ ডিলার</option>
                                                                    <option value="66">এ্যাকুরিয়াম মাছ/ পশু (বন্যপ্রাণী ব্যতীত) বিক্রেতা</option>
                                                                    <option value="7">ওয়ার্কশপ/ মেরামত</option>
                                                                    <option value="19">ওয়েব বেসড সফটওয়্যার লাইসেন্স</option>
                                                                    <option value="47">ওয়্যার হাউজ/ বায়িং হাউজ</option>
                                                                    <option value="10">কনফেকশনারি উৎপাদনকারী</option>
                                                                    <option value="15">কমিউনিটি সেন্টার</option>
                                                                    <option value="81">কম্পিউটার বিক্রয় দোকান</option>
                                                                    <option value="91">কারুপণ্য/ হস্তশিল্প</option>
                                                                    <option value="95">গার্মেন্টস এক্সেসরিজ ব্যবসা</option>
                                                                    <option value="30">চলচ্চিত্র নির্মাতা</option>
                                                                    <option value="68">চশমার দোকান</option>
                                                                    <option value="43">চা-পান দোকান</option>
                                                                    <option value="46">চামড়ার স্যুটকেস/ ব্যাগ</option>
                                                                    <option value="21">জাহাজ নির্মাণ</option>
                                                                    <option value="41">জুতার দোকান</option>
                                                                    <option value="51">টায়ার টিউব বিক্রেতা/ডিলার</option>
                                                                    <option value="93">টিভি পার্টস ও এন্টিনা বিক্রেতা(ছোট)</option>
                                                                    <option value="54">টিভি, ফ্রিজ এবং অন্যান্য ইলেক্ট্রনিক সামগ্রীর দোকান/ এজেন্সি</option>
                                                                    <option value="3">ঠিকাদার/ কনস্ট্রাকশন/ সরবরাহকারী প্রতিষ্ঠান</option>
                                                                    <option value="48">ডিপার্টমেন্টাল স্টোর</option>
                                                                    <option value="16">ডেকোরেটর</option>
                                                                    <option value="62">ঢেউটিন</option>
                                                                    <option value="26">তৈজসপত্র</option>
                                                                    <option value="39">তৈরী পোশাক</option>
                                                                    <option value="109">দর্জির দোকান</option>
                                                                    <option value="44">নার্সারী</option>
                                                                    <option value="38">নিত্য প্রয়োজনীয় সামগ্রীর খুচরা বিক্রেতা</option>
                                                                    <option value="20">নৌযান </option>
                                                                    <option value="88">পরিবহন এজেন্সি/ পরিবহন ঠিকাদার</option>
                                                                    <option value="103">পশু জবাই ফি (বাণিজ্যিক অথবা ব্যবসায়িক উদ্দেশ্যে পশু জবাই করা হইলে)</option>
                                                                    <option value="25">পাইকারী বিক্রেতা</option>
                                                                    <option value="76">পুরাতন কাপড়ের দোকান</option>
                                                                    <option value="64">পেট্রোল পাম্প/ সিএনজি স্টেশন/ ফিলিং স্টেশন</option>
                                                                    <option value="101">পোষা জন্তু পালন বিষয়ক-বন্য প্রাণী সংরক্ষণ আদেশ এর অতিরিক্ত(বার্ষিক হারে)</option>
                                                                    <option value="74">প্রকৌশলী, চিকিৎসক, দন্ত চিকিৎসকের চেম্বার (স্ব-নিয়োজিত)</option>
                                                                    <option value="104">প্রিন্টিং/ প্যাকেজিং</option>
                                                                    <option value="63">প্লেন শীট</option>
                                                                    <option value="35">ফটো স্টুডিও/ ল্যাব</option>
                                                                    <option value="34">ফটোস্ট্যাট/ এ্যামোনিয়া প্রিন্ট</option>
                                                                    <option value="42">ফলের দোকান</option>
                                                                    <option value="23">ফার্নিচার</option>
                                                                    <option value="67">ফার্মেসী</option>
                                                                    <option value="11">ফাস্ট ফুড শপ উৎপাদনকারী</option>
                                                                    <option value="45">ফুল বিক্রেতা</option>
                                                                    <option value="61">ফোম</option>
                                                                    <option value="99">বন্দুক ক্রয়-বিক্রয় ও মেরামতের দোকান</option>
                                                                    <option value="69">বাঁধাই কারখানা</option>
                                                                    <option value="59">বাই সাইকেল পার্টস বিক্রেতা</option>
                                                                    <option value="58">বাই সাইকেল বিক্রেতা</option>
                                                                    <option value="27">বিউটি পার্লার</option>
                                                                    <option value="100">বিবাহ, দত্তক, জন্ম ও মৃত্যু সার্টিফিকেট নিবন্ধন</option>
                                                                    <option value="36">বিবিধ ছোট প্রতিষ্ঠান/ দোকান</option>
                                                                    <option value="32">বিভিন্ন প্রকার কার্ড/ পোস্টার বিক্রেতা</option>
                                                                    <option value="90">বিভিন্ন মাপের চেরাই কাঠের ব্যবসা</option>
                                                                    <option value="4">বিল্ডার্স/ ডেভেলপার্স/ রিয়েল এস্টেট </option>
                                                                    <option value="92">বেকারী কারখানা</option>
                                                                    <option value="53">বেডিং স্টোর</option>
                                                                    <option value="72">বেসরকারি স্বাস্থ্য ক্লিনিক, নার্সিং হোম/ হাসপাতাল</option>
                                                                    <option value="55">বৈদ্যুতিক সরঞ্জাম বিক্রেতা</option>
                                                                    <option value="1">ব্যাংক, বীমা ও আর্থিক প্রতিষ্ঠান</option>
                                                                    <option value="52">ব্যাটারী বিক্রেতা</option>
                                                                    <option value="50">মটর পার্টস/লুব্রিকেন্ট</option>
                                                                    <option value="57">মটর ভেহিকেল বিক্রেতা/ শোরুম</option>
                                                                    <option value="79">মদের দোকান/ বার (লাইসেন্সধারী)</option>
                                                                    <option value="80">মাইক ভাড়ার দোকান</option>
                                                                    <option value="84">মানি লন্ডার</option>
                                                                    <option value="9">মিষ্টির দোকান উৎপাদনকারী(লিমিটেড কোম্পানী না হইলে)</option>
                                                                    <option value="56">মেশিন টুলস এন্ড ইকুইপমেন্ট</option>
                                                                    <option value="83">মোবাইল পার্টস/ এক্সেসরিজ বিক্রেতা/ এজেন্সি</option>
                                                                    <option value="107">ম্যারেজ মিডিয়া</option>
                                                                    <option value="94">মৎস্য হ্যাচারী</option>
                                                                    <option value="17">যান্ত্রিক যানবাহন/ পরিবহন উৎপাদনকারী (লিমিটেড কোম্পানী না হইলে)</option>
                                                                    <option value="78">রিক্সা ও রিক্সা ভ্যান তৈরি কারখানা</option>
                                                                    <option value="77">রেকটিফাইড স্পিরিটের দোকান</option>
                                                                    <option value="60">রেকসিন</option>
                                                                    <option value="8">রেস্তোরাঁ/ কফি শপ উৎপাদনকারী/ পরিবেশক(লিমিটেড কোম্পানী না হইলে)</option>
                                                                    <option value="49">লন্ড্রি</option>
                                                                    <option value="31">লাইব্রেরী/ প্রকাশনা</option>
                                                                    <option value="110">লিমিটেড কোম্পানি</option>
                                                                    <option value="40">শাড়ী/থান কাপড়</option>
                                                                    <option value="2">শিক্ষা প্রতিষ্ঠান/ ট্রেনিং সেন্টার প্রভৃতি</option>
                                                                    <option value="105">শিপ ব্রেকিং </option>
                                                                    <option value="71">সংবাদপত্রের স্টল</option>
                                                                    <option value="85">সার/ কীটনাশক ঔষধ বিক্রেতা</option>
                                                                    <option value="89">সিগারেট, বিড়ি (পাইকারী/ এজেন্সি)</option>
                                                                    <option value="14">সিনেমা হল </option>
                                                                    <option value="86">সিরামিক ফ্যাক্টরি</option>
                                                                    <option value="70">সুতার ব্যবসায়ী/ পরিবেশক (পাইকারী)</option>
                                                                    <option value="33">স্টেশনারী সামগ্রী</option>
                                                                    <option value="82">স্ট্যাম্প ভেন্ডার</option>
                                                                    <option value="73">স্থাপত্য/প্রকৌশল ফার্ম</option>
                                                                    <option value="106">স্যানিটারী কারখানা</option>
                                                                    <option value="24">হার্ডওয়্যার</option>
                                                                    <option value="98">হেলথ ক্লাব/ ফিটনেস ক্লাব</option>
                                                                    <option value="28">হেয়ার ড্রেসিং সেলুন</option>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div id="ContentPlaceHolder1_BusSubDiv" class="form-group required">
                                                            <span id="ContentPlaceHolder1_Label11" class="col-md-4 control-label" style="font-weight:bold;text-align: left">ব্যবসায়ের উপ-ধরণ </span>
                                                            <div class="col-md-8">
                                                                <select name="ctl00$ContentPlaceHolder1$ddSubCategory" id="ContentPlaceHolder1_ddSubCategory" class="form-control">
                                                                    <option value="">--বাছাই করুন--</option>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div id="ContentPlaceHolder1_BusButtonDiv" class="form-group">
                                                            <span id="ContentPlaceHolder1_Label10" class="col-md-7 control-label" style="font-weight:bold;text-align: left"></span>
                                                            <div class="col-md-2">
                                                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnAdd" value="যোগ করুন" id="ContentPlaceHolder1_btnAdd" class="btn btn-primary" style="font-weight:bold;height:32px;">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnClear" value="মুছে ফেলুন" id="ContentPlaceHolder1_btnClear" class="btn btn-primary" style="font-weight:bold;height:32px;">
                                                            </div>
                                                        </div>



                                                    </div>

                                                    <div class="col-md-10 panel panel-group" style="border-color: #CCCCCC">
                                                        <div class="form-group" style="margin-top: 5px; margin-left: 1px">
                                                 <span>
                                                     <strong>
                                                         <span id="ContentPlaceHolder1_Label28" style="text-decoration:underline;">ফিস : </span>
                                                     </strong>
                                                 </span>
                                                        </div>

                                                    </div>

                                                    <br>
                                                    <br>

                                                    <div class="form-group">
                                                        <div class="col-md-3">
                                                            <input type="submit" name="ctl00$ContentPlaceHolder1$btnUpdaet" value="সংরক্ষণ করুন" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnUpdaet&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ContentPlaceHolder1_btnUpdaet" class="btn btn-success">
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
    </div>
@endsection






