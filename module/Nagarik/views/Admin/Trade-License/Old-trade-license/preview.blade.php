<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Hide elements with the 'no-print' class when printing */
        @media print {
            .no-print {
                display: none;
            }
            .bg-img img{
                width: 70%!important;
                height: 90%!important;
            }
        }
        .bg-img {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0.1;
        }
        .bg-img img{
            width: 50%;
            height: 100%;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body style="padding: 30px   ">

<a href="{{route('trade-license-approved-index')}}"  class="no-print " style="text-decoration: none ; ">Back</a>
<button onclick="printContent()" class="no-print  ">Print</button>
{{--<div style="background-image: url('{{ asset('CC_logo.png') }}');background-color: rgba(0, 0, 0, 0.5);   ">--}}
<!-- Your content here -->
@php
    $company = \App\Models\Company::first();
@endphp
<section class="mt-4">
    <div class="row text-center">
        <div class="col-md-4"> </div>
        <div class="col-md-4 center " >
            <span style="font-size: 24px ; font-weight: bolder">{{$company->name}}</span> <br>
            {{$company->email}}
        </div>
        <div class="col-md-4"> </div>
    </div>
</section>


<section class="mt-0 ">
    <div class="row text-center">
        <div class="col-md-4">
            <span>
{{--               {!! QrCode::size(100)->generate(Request::url()); !!}--}}
                {!! QrCode::size(100)->generate("
                 Company Name: {$company->name}
                 Business Name: {$old_license->business_name}
                 License No:  $old_license->license_no
                 User's Full Name: ".optional($old_license->user->details)->full_name."
                 "); !!}

          </span> <br>
            <span style="font-size: 17px"> লাইসেন্স ইস্যুর বিবরণ</span>
            <hr style="padding: 0 !important;margin: 4px!important;">

            ইস্যুর তারিখ :24/07/2023
            <br>
            ইস্যুর সময় :       12:28:50

        </div>

        <div class="col-md-4 center " >
          <span >
          <img src="{{ asset('uploads/company/' . $company->logo) }}" style="height: 65px ; width: 70px; border-radius: 50% " alt="">
          </span>
            <br>
            <br>
            <span style="font-size: 24px ; font-weight: bolder">ই-ট্রেড লাইসেন্স</span> <br>
            লাইসেন্স নং:  {{ $old_license->license_no }}
        </div>
        <div class="col-md-4 center">
            <img src="{{ asset(optional($old_license->user->details)->image) }}" style="height: 120px; width: 110px" alt="">
        </div>
    </div>
</section>

<section class=" ">
    <div class="row text-center">
        <div class="col-md-12 text-center" style="font-size: 10px"  >
            <span style="padding: 0 20px 0 20px">
            স্থানীয় সরকার (সিটি কর্পোরেশন) আইন, ২০০৯ (২০০৯ সনের ৬০ নং আইন। এর যার ৬৪- তে প্রথর কমলালে ব্যবসা, বৃত্তি, পেশা বা শিল্প প্রতিষ্ঠানের উপর আরোপিত কর আদায়ের লক্ষ্যে নিম্নবর্ণিত ব্যাক্তি প্রারিবে অনুলেখা
            </span>
        </div>
    </div>
</section>






<section class=" " style="margin-right: 50px ; margin-left: 50px">
    <div style="position: relative">
        <div class="bg-img">
            <img src="{{ asset('uploads/company/' . $company->logo)}}" alt="">
        </div>
        <div class="row " style="font-weight: bolder">

            {{--        1-8 strat--}}

            <div class="col-md-4" style="font-size: 12px"> ব্যবসা প্রতিষ্ঠানের নাম</div>
            <div class="col-md-8" style="font-size: 12px">:  {{ $old_license->business_name }}  </div>



            <div class="col-md-4" style="font-size: 12px">   প্রতিষ্ঠানের মালিকের নাম </div>
            <div class="col-md-8" style="font-size: 12px">: {{optional($old_license->user->details)->full_name }} </div>



            <div class="col-md-4" style="font-size: 12px"> পিতা/স্বামীর নাম</div>
            <div class="col-md-8" style="font-size: 12px">:  {{optional($old_license->user->details)->father_name }}  </div>



            <div class="col-md-4" style="font-size: 12px"> মাতার নাম</div>
            <div class="col-md-8" style="font-size: 12px">: {{optional($old_license->user->details)->mother_name }}  </div>

            <div class="col-md-4" style="font-size: 12px">  ব্যবসার প্রকৃতি</div>
            <div class="col-md-8" style="font-size: 12px">:   {{ $old_license->business_type }}   </div>

            <div class="col-md-4" style="font-size: 12px">  ব্যবসার ধরণ</div>
            <div class="col-md-8" style="font-size: 12px">:   {{ $old_license->businessCategory->type }}   </div>



            <div class="col-md-4" style="font-size: 12px">  প্রতিষ্ঠানের ঠিকানা</div>
            <div class="col-md-8" style="font-size: 12px">:   {{ $old_license->ward->name }},        {{ $old_license->sector->name }} , {{ $old_license->block->name }} ,   {{ $old_license->road->name }}

            </div>







            <div class="col-md-4" style="font-size: 12px">অঞ্চল/বাজার শাখা
                <hr style="padding: 0 !important;margin: 2px!important;">    </div>
            <div class="col-md-8" style="font-size: 12px">: {{ $old_license->region->name }}   </div>
            <br>


            {{--        8-10 start--}}

            <div class="col-md-3" style="font-size: 12px">এনআইডি /অন্যান্য পরিচয় পত্র নম্বর  </div>
            <div class="col-md-3" style="font-size: 12px">:  {{ $old_license->applicants_additional_ids }}





            </div>
            <div class="col-md-3" style="font-size: 12px">ই-টিন নম্বর</div>
            <div class="col-md-3" style="font-size: 12px">:  {{ $old_license->tin_no }}  </div>



            <div class="col-md-3" style="font-size: 12px">  অর্থ বছর   </div>
            <div class="col-md-3" style="font-size: 12px">:  {{ $old_license->financialYear->year }}</div>
            <div class="col-md-3" style="font-size: 12px"> ই-মেইল</div>
            <div class="col-md-3" style="font-size: 12px">: {{optional($old_license->user->details)->mail }} </div>



            <div class="col-md-3" style="font-size: 12px">প্রস্তাবিত ব্যবসায়ের স্থান সরকারি ভূমির উপর কিনা</div>
            <div class="col-md-3" style="font-size: 12px">:
                @if($old_license->is_business_land_ownership_govt == 'Y')

                    yes
                @else
                    No

                @endif


            </div>
            <div class="col-md-3" style="font-size: 12px"> ব্যবসায়ের আরম্ভ করার তারিখ </div>
            <div class="col-md-3" style="font-size: 12px">:   {{ $old_license->business_start_date }}</div>

            <br>


            {{--11 start--}}

            <div class="col-md-3" style="font-size: 14px">মালিকের বর্তমান ঠিকানা<hr style="padding: 0 !important;margin: 2px!important;"> </div>
            <div class="col-md-3"> </div>
            <div class="col-md-3" style="font-size: 14px">মালিকের স্থায়ী ঠিকানা<hr style="padding: 0 !important;margin: 2px!important;"></div>
            <div class="col-md-3"> </div>




            <div class="col-md-3" style="font-size: 12px"> হোল্ডিং </div>
            <div class="col-md-3" style="font-size: 12px">:  {{optional($old_license->user->instant)->holding_no }} </div>
            <div class="col-md-3" style="font-size: 12px"> হোল্ডিং </div>
            <div class="col-md-3" style="font-size: 12px">:  {{optional($old_license->user->permanent)->holding_no }}</div>


            <div class="col-md-3" style="font-size: 12px"> গ্রাম মহল্লা</div>
            <div class="col-md-3" style="font-size: 12px">:   {{optional($old_license->user->instant)->village }}</div>
            <div class="col-md-3" style="font-size: 12px">  গ্রাম মহল্লা</div>
            <div class="col-md-3" style="font-size: 12px">:   {{optional($old_license->user->permanent)->village }}</div>


            <div class="col-md-3" style="font-size: 12px">  পোস্টকোড</div>
            <div class="col-md-3" style="font-size: 12px">: {{optional($old_license->user->instant)->post_code }}</div>
            <div class="col-md-3" style="font-size: 12px">  পোস্টকোড</div>
            <div class="col-md-3" style="font-size: 12px">: {{optional($old_license->user->permanent)->post_code }}</div>


            <div class="col-md-3" style="font-size: 12px">    জেলা</div>
            <div class="col-md-3" style="font-size: 12px">: {{optional($old_license->user->instant)->district }}</div>
            <div class="col-md-3" style="font-size: 12px">    জেলা</div>
            <div class="col-md-3" style="font-size: 12px">:  {{optional($old_license->user->permanent)->district }}</div>


            <div class="col-md-3" style="font-size: 12px">   বিভাগ</div>
            <div class="col-md-3" style="font-size: 12px">: {{optional($old_license->user->instant)->division }}</div>
            <div class="col-md-3" style="font-size: 12px">   বিভাগ</div>
            <div class="col-md-3" style="font-size: 12px">:  {{optional($old_license->user->permanent)->division }}</div>

            <br>

            {{--12 start--}}
            <div class="col-md-3" style="font-size: 14px">  ট্রেড লাইসেন্স/নবায়ন ফি (বার্ষিক)<hr style="padding: 0 !important;margin: 2px!important;"> </div>
            <div class="col-md-3"> </div>
            <div class="col-md-3"> </div>
            <div class="col-md-3"> </div>



            <div class="col-md-3" style="font-size: 12px">  লাইসেন্স/নবায়ন ফি</div>
            <div class="col-md-3" style="font-size: 12px">: {{ $old_license->license_fee }}</div>
            <div class="col-md-3" style="font-size: 12px">  সাইনবোর্ড কর</div>
            <div class="col-md-3" style="font-size: 12px">: {{ $old_license->signboard_fee }}</div>


            <div class="col-md-3" style="font-size: 12px">আয়কর/ উৎসেকর</div>
            <div class="col-md-3" style="font-size: 12px">:0</div>
            <div class="col-md-3" style="font-size: 12px"> ভ্যাট</div>
            <div class="col-md-3" style="font-size: 12px">:   {{ $old_license->total_tax }}</div>


            <div class="col-md-3" style="font-size: 12px">   সারচার্জ</div>
            <div class="col-md-3" style="font-size: 12px">: 0</div>
            <div class="col-md-3" style="font-size: 12px"> ফর্ম ফি</div>
            <div class="col-md-3" style="font-size: 12px">:0</div>


            <div class="col-md-3" style="font-size: 12px">  বকেয়া ()</div>
            <div class="col-md-3" style="font-size: 12px">: 0</div>
            <div class="col-md-3" style="font-size: 12px"> </div>
            <div class="col-md-3" style="font-size: 12px">  </div>

            <div class="col-md-3" style="font-size: 12px"> সংশোধনী ফি</div>
            <div class="col-md-3" style="font-size: 12px">: 0</div>
            <div class="col-md-3" style="font-size: 12px">            সর্বমোট</div>
            <div class="col-md-3" style="font-size: 12px">: 0</div>


        </div>
    </div>


</section>

<section class="py-4">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            অত্র ট্রেড লাইসেন্স এর মেয়াদ ৩০ শে জুন, 2024 পর্যন্ত
        </div>
    </div>
</section>


<section class="mt-2 ">
    <div class="row text-center">
        <div class="col-md-4">

            <img src="{{asset('uploads/company/extra/'.$company->company_details->header) }}" style="height: 60px ; width: 100px" alt="">
            <br>
            <br>
            <span style="font-size: 10px ; font-weight: bolder"> লাইসেন্স ও বিজ্ঞাপন সুপারভাইজার</span>

        </div>

        <div class="col-md-4 center " >
          <span>
          <img src="{{ asset('assets/images/paid.png') }}" style="height: 60px ; width: 50px; border-radius: 50% " alt="">
          </span>
        </div>
        <div class="col-md-4 center">
            <img src="{{ asset('uploads/company/extra/'.$company->company_details->footer) }}" style="height: 60px; width:100px" alt="">
            <br>
            <br>
            <span style="font-size: 10px ; font-weight: bolder">কর কর্মকর্তা</span>
        </div>
    </div>
</section>



<script>
    window.print();

    function printContent() {
        window.print();
    }
</script>
</body>
</html>





