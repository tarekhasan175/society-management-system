@extends('layouts.master')


@section('title', 'Sale Details')



@push('style')
    <style>
        #print_body {
            background-color: #fff;
            /* padding: 10px 20px; */
            overflow: hidden;
        }

        .company-info {
            color: #000;
        }

        .company-info h3 {
            font-weight: bold;
            margin-bottom: 0;
        }

        .table {
            box-shadow: none !important;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border: .4px solid #f0d9d9;
            padding: 4.5px;
        }



        .admitted {
            color: #0cb634;
        }

        .company-info p {
            margin-bottom: 2px;
        }

        .patient {
            margin: 0px;
        }

        p {
            margin: 0px 5px 0px;
        }

        . {
            /* background: greenyellow; */
            background: #63bee8;
            box-shadow: none;
            padding-top: 12px !important;
            padding-bottom: 12px !important;
        }

        .watermarked {
            position: relative;
        }

        .watermarked:after {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 49%;
            left: 30%;
            background-image: url("{{ asset('assets/images/paid.png') }}");
            background-size: 20% 31%;
            background-position: 30px 30px;
            background-repeat: no-repeat;
            opacity: 0.4;

        }


        input[type="checkbox"]:checked::before {
            transform: scale(1);
        }

        @media print {
            .company-info h4 {
                font-weight: bold;
                margin-bottom: 0;
            }


            .company-info p {
                margin-bottom: 2px;
            }

            .no-print {
                display: none !important;
            }

            .widget-box {
                border: none !important;
                width: 100%;
            }

            .bg-img img{
                width: 70%!important;
                height: 90%!important;
            }

        }

        .bg-img {
            position: absolute;
            width: 70%;
            height: 50%;
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
@endpush

@section('content')
    <div class="row">

        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header no-print">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> Payment Details
                    </h4>

                    <span class="widget-toolbar">
                        <a href="javascript:void(0)" onclick="window.print()">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </span>
                    <span class="widget-toolbar">
                        <a href="{{ route('holding-tex-payment.index') }}">
                            <i class="ace-icon fa fa-list-alt"></i>
                            List
                        </a>
                    </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        @php
                            $company = \App\Models\Company::first();
                        @endphp
                        <div class="row">



                                <div id="print_body" class="col-xs-12  ">



                                    <div style="position: relative">
                                        <div class="bg-img">
                                            <img src="{{ asset('uploads/company/' . $company->logo)}}" alt="">
                                        </div>

                                          <div id="customer_info" style="padding: 0 10px;">
                                    <div class="row">


                                        <!-- company info -->
                                        <div class="company-info text-center">
                                            <p><img src="{{ asset('/uploads/company/'.companyInfo()->logo) }}" width="80" height="80"></p>
                                            <h4>{{ companyInfo()->name }}</h4>
                                            <h5>Holding Tex Payment Invoice</h5>
                                        </div>



                                        <!-- panel title -->
                                        <h6 style="width: 100%;text-align: center;margin-top: 15px;">
                                            <b style="font-size: 15px;">
{{--                                                {{ $invoice->source->license_no }}--}}
                                            </b>
                                        </h6>


                                        <hr>



                                        <!-- patient info -->
                                        <div class="customerInfo" style="width: 50%;float: left;">
                                            <h6><b><u>Civil Information : </u></b></h6>

                                            <p class="supplier"><b>Name : </b>
                                                {{ $ShowPaymentList->holdingtex->user->name }}</p>

                                            <p class="supplier"><b>Mobile : </b>
                                                {{  $ShowPaymentList->holdingtex->user->details->phone }}</p>
{{--                                            <p class="supplier"><b>Address : </b>--}}
{{--                                                {{  $ShowPaymentList->holdingtex->region->name }}</p>--}}
                                        </div>






                                        <!-- invoice info -->
                                        <div class="invoiceInfo" style="width: 50%; float: left;margin-top: 5px;">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td> Invoice No : </td>
                                                    <td>NSTL0{{ $ShowPaymentList->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td> Date : </td>
                                                    <td>{{ $ShowPaymentList->created_at }}</td>
                                                </tr>

                                                <tr>
                                                    <td> Account : </td>
                                                    <td>
                                                        {{ $ShowPaymentList->holdingtex->user->name }}
                                                    </td>
                                                </tr>



                                            </table>
                                        </div>



                                    </div>
                                </div>





                                           <br>

                                         <div class="invoice-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border: none !important">
                                            <thead>

                                            <tr class="heading">
                                                <th style="border: 1px solid #f0d9d9; text-align: center"  >SL
                                                </th>
                                                <th style="border: 1px solid #f0d9d9;" width=50%">Region</th>
                                                <th style="border: 1px solid #f0d9d9; text-align: center !important" width="7%">Holding NUmber</th>
                                                <th style="border: 1px solid #f0d9d9; text-align: center !important"
                                                    width="10%">Applicant</th>
                                                <th style="border: 1px solid #f0d9d9; text-align: center !important"
                                                    width="10%">Session</th>

                                                <th style="border: 1px solid #f0d9d9; text-align: center !important"
                                                    width="10%">Applicant Relation</th>



                                                <th style="border: 1px solid #f0d9d9; text-align: right !important"
                                                    width="20%" align="right">License Fee</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            <tr>
                                                <td style="text-align: center">1</td>
                                                <td>
                                                    {{ $ShowPaymentList->holdingtex->cityarea->name }} ,
                                                    {{ $ShowPaymentList->holdingtex->wordareya->name }},
                                                    {{ $ShowPaymentList->holdingtex->nagoriksector->name }},
                                                    {{ $ShowPaymentList->holdingtex->nagorikbloc->name }},
                                                    {{ $ShowPaymentList->holdingtex->nagorikroad->name }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $ShowPaymentList->holdingtex->holding_number }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $ShowPaymentList->holdingtex->user->name }}
                                                </td>
                                                <td style="text-align: center">
                                                  Start  - {{date('Y')}}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ 	$ShowPaymentList->holdingtex->h_depent_r }}
                                                </td>



                                                <td class="text-right">
                                                    {{ number_format($ShowPaymentList->amount , 2) }}
                                                    ৳
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="text-align: right; border:none !important">Total
                                                    :</td>
                                                <th style="text-align: right; border:none !important">
                                                    {{ number_format($ShowPaymentList->amount , 2)  }}
                                                    ৳</th>
                                            </tr>

                                            <tr>
                                                <td style="border: none !important; font-size: 15px" colspan="5">
                                                    {{--                                                        Note : <span> 100</span>--}}
                                                </td>
                                                <td style="text-align: right; border:none !important">
                                                    VAT(+)
                                                    :</td>
                                                <th style="text-align: right; border:none !important">
                                                    {{($ShowPaymentList->amount * ( companyInfo()->company_details->vat  / 100))}}
                                                    ৳</th>
                                            </tr>

                                            <tr>
                                                <td colspan="6" style="text-align: right; border:none !important">
                                                    Total Payable :</td>
                                                <th style="text-align: right; border:none !important">

                                                    {{ $ShowPaymentList->amount + ($ShowPaymentList->amount * ( companyInfo()->company_details->vat  / 100)) }}
                                                    ৳
                                                </th>
                                            </tr>

                                            <tr>
                                                <td style="border: none !important; font-size: 15px" colspan="5">
                                                    Paid : <span> {{ getInWord( $ShowPaymentList->amount + ($ShowPaymentList->amount * ( companyInfo()->company_details->vat  / 100) )) }}
                                                    .</span>
                                                </td>
                                                <td style="text-align: right; border:none !important">
                                                    Paid :</td>
                                                <th style="text-align: right; border:none !important">
                                                    {{ floatval($ShowPaymentList->amount + ($ShowPaymentList->amount * ( companyInfo()->company_details->vat  / 100)) )}}
                                                    ৳
                                                </th>
                                            </tr>


{{--                                            <tr>--}}
{{--                                                <td style="border: none !important; font-size: 15px" colspan="6">--}}
{{--                                                    Due :<span>--}}
{{--                                                    <strong>{{ getInWord(($invoice->source->license_fee + 150) - floatval($invoice->amount)) }}</strong>--}}
{{--                                                    </span>--}}
{{--                                                </td>--}}
{{--                                                <td style="text-align: right; border:none !important">--}}
{{--                                                    Due :</td>--}}
{{--                                                <th style="text-align: right; border:none !important">--}}
{{--                                                    {{ ($invoice->source->license_fee + 150) - floatval($invoice->amount) }}--}}
{{--                                                    ৳--}}
{{--                                                </th>--}}
{{--                                            </tr>--}}

                                            <tr>
                                                <td colspan="6" style="text-align: right; border:none !important">
                                                    Method :</td>
                                                <th style="text-align: right; border:none !important">
                                                    <code>HAND CASH</code>
                                                </th>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                          <div class="print-footer"
                                     style="margin-top: 40px;overflow: hidden;width: 100%;padding: 0 10px;">
                                    <div class="sign" style="width: 100%; overflow: hidden;">
                                        <div class="company_sign" style="width: 33%; float: left;">
                                            <h5 style="width:50%; margin: 0 auto; padding: 10px 0;text-align: center;">
                                                &nbsp;</h5>
                                            <h5
                                                style="width:50%;margin: 0 auto;border-top: 1px solid #000;padding: 10px 0;text-align: center;">
                                                Received By</h5>
                                        </div>

                                        <div class="company_sign" style="width: 33%; float: left;">
                                            <h5 style="width:50%; margin: 0 auto; padding: 10px 0;text-align: center;">
                                                {{ optional(auth()->user())->name }}
                                                &nbsp;</h5>
                                            <h5
                                                style="width:50%;margin: 0 auto;border-top: 1px solid #000;padding: 10px 0;text-align: center;">
                                                Prepared By</h5>
                                        </div>

                                        <div class="company_sign" style="width: 33%; float: left;">
                                            <h5 style="width:50%; margin: 0 auto; padding: 10px 0;text-align: center;">
                                                &nbsp;</h5>
                                            <h5
                                                style="width:50%;margin: 0 auto;border-top: 1px solid #000;padding: 10px 0;text-align: center;">
                                                Authorized By</h5>
                                        </div>
                                    </div>
                                    <div class="copyright" style="padding: 0px !important;">
                                        <br>
                                        <div class="copyright-section">
                                            <p class="pull-left">NB: This is system generated report.</p>
                                            <p class="design_band pull-right">Powered By: <a href="#"> Smart Software
                                                    LTD.</a></p>
                                        </div>
                                    </div>
                                    <br>
                                </div>




                            </div>

                            </div>


                            <br>
                            <hr>
                            <br>
                            <div id="second_copy" style="width: 100%;overflow: hidden;">
                                <!-- Load First Copy -->
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        window.print()
    </script>

@endsection
