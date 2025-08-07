@extends('layouts.master')
@section('title','Add New User')
@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-database"></i> {{ $old_license->business_name }} ({{ $old_license->businessCategory->type }}), {{ $old_license->financialYear->year }}
                    </h4>
                    <span class="widget-toolbar">

                    </span>
                    <span class="widget-toolbar">
                        <a href="{{ route('trade-license-approved-index') }}">
                                                    লাইসেন্স তালিকা
                                                </a>
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
                                    <div class="x_content">




































                                        <div class="row">
                                            <div class="col-xs-12 ">


                                                <div class="col-md-6">
                                                    <div>

                                                        <div class="col-md-6 bolder">
                                                            ব্যবসা প্রতিষ্ঠানের নাম :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_name }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            অর্থ বছর :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->financialYear->start_year }}-{{ $old_license->financialYear->end_year }}
                                                        </div>


                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            ব্যবসার ধরণ :
                                                        </div>

                                                        <div class="col-md-6">
                                                            {{ $old_license->businessCategory->type }}
                                                        </div>

                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            লাইসেন্স ফি :
                                                        </div>

                                                        <div class="col-md-6">
                                                            {{ $old_license->license_fee }}
                                                        </div>

                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            ব্যবসা প্রতিষ্ঠানের প্রকৃতি :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_type }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            পরিশোধিত মূলধন (লি: কোম্পানির ক্ষেত্রে) :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->payout_capital }}
                                                        </div>

                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            ব্যবসায়ের আরম্ভ করার তারিখ :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_start_date }}
                                                        </div>

                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            মব্যবসায়ের মূলধন :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_capital }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            প্রতিষ্ঠানের সাথে আবেদনকারীর সম্পর্ক :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->applicants_relation_with_company }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            প্রস্তাবিত ব্যবসায়ের সঠিক ঠিকানা :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_location_address }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            আয়কর প্রদান করিলে TIN নম্বর  :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->tin_no }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            ব্যবসার জায়গা (ভাড়া/নিজের) :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_land_ownership }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            বব্যবসার দোকান/গৃহ (ভাড়া/নিজের):
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_house_ownership }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            মোট আয়তন (বর্গফুট) :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_land_square_feet }}
                                                        </div>
                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            সাইন বোর্ড আছে কিনা :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->is_signboard }}

                                                        </div>

                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            সংযুক্তির নাম :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->attachment_name }}

                                                        </div>

                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            মন্তব্য :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->attachment_description }}

                                                        </div>


                                                    </div>
                                                </div>


                                                <div class="col-md-6">

                                                    <div>
                                                        <div class="col-md-6 bolder">
                                                            প্রস্তাবিত ব্যবসায়ের স্থান সরকারি ভূমির উপর কিনা :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->is_business_land_ownership_govt }}

                                                        </div>

                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            পদোকান ঘর / অফিস কোন তলায় :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->business_house_floor_level }}

                                                        </div>

                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            অন্যান্য পরিচয়পত্র :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->applicants_additional_ids }}

                                                        </div>

                                                        <hr>
                                                        <hr>


                                                        <div class="col-md-6 bolder">
                                                            অঞ্চল:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->region->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            ওয়ার্ড:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->ward->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            সেক্টর:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->sector->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            এরিয়া/ব্লক:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->block->name }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            রোড:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->road->name }}

                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            প্লট/ হোল্ডিং নং:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->holding_no }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            দোকান নং:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->shop_no }}
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            সাইন বোর্ড বর্গফুট:
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->signboard_square_feet }}
                                                        </div>


                                                        <hr>
                                                        <hr>
                                                        <div class="col-md-6 bolder">
                                                            সাইন বোর্ড ফি :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->signboard_fee }}
                                                        </div>


                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            মোট ভ্যাট :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->total_tax }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            আয়কর টাকা :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->income_tax }}
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            ইস্যূকৃত লাইসেন্স নং (পুরাতনের ক্ষেত্রে) :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->old_issue_license_no }}
                                                        </div>

                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            ইস্যূকৃত লাইসেন্স তারিখ (পুরাতনের ক্ষেত্রে) :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->old_issue_license_date }}
                                                        </div>

                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            নবায়ন কার্যকর করার তারিখ (পুরাতনের ক্ষেত্রে) :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->old_license_renewal_effective_date }}
                                                        </div>

                                                        <hr>
                                                        <hr>

                                                        <div class="col-md-6 bolder">
                                                            সর্বমোট মূল্য/সর্বমোট ধার্যকৃত মূল্য :
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{ $old_license->total_price }}
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <hr>
                                                <div class="align-center bolder" style="font-size: 20px;">
                                                    <span>প্রদর্শিত নথিপত্র</span>
                                                </div>
                                                <hr>

                                                <div class="row ">
                                                    <div class="col-md-6 align-center bolder">
                                                        ব্যবসার জায়গা ইমেজ :
                                                    </div>
                                                    <div class="col-md-6 align-center"><img src="{{ asset($old_license->business_land_image) }}" width="auto" height="200px"></div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6 align-center bolder">
                                                        সংযুক্তির ইমেজ :
                                                    </div>
                                                    <div class="col-md-6 align-center"><img src="{{ asset($old_license->attachment_image) }}" width="auto" height="200px"></div>
                                                </div>
                                                <hr>
                                                <hr>


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
