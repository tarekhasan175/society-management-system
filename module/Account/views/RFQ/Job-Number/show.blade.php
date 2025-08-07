


@extends('layouts.master')
@section('title', 'Sale Invoice')
@push('style')
    <style type="text/css">
        @media print {
            .d-none {
                display: block !important;
            }

            .d-print {
                display: block !important;
            }

            .signature-row {
                display: unset !important; ;
            }

            .heading {
                margin-top: -55px !important;
            }

            .invoice-logo {
                width: 180px !important;
                height: 70px !important;
                margin-top: 20px !important;
            }
        }

        /* @page {
            margin: 1in;
        } */

        .invoice-logo {
            margin-top: 20px !important;
        }

        .d-print {
            display: none;
        }

        .signature-row {
            display: none;
        }

        .note-bar {
            border-left: 5px solid #f2f2f2;
            min-height: 35px;
            line-height: 15px;
            width: 60%;
            margin-top: -190px;
        }

        .note-bar p {
            padding-top: 1px;
            margin-left: 10px !important;
        }

        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
        }

        .column-a {
            float: left;
            width: 50%;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .invoice-logo {
            width: 200px;
            height: 55px;
        }

    </style>
@endpush

@section('content')
    <div class="row heading">
        <div class="col-xs-3">
            @if(file_exists('uploads/company/'. optional($QuotationShow->company)->logo))
                <img class="invoice-logo" src="{{ asset('uploads/company/'. optional($QuotationShow->company)->logo) }}"  alt="Logo">
            @endif
        </div>
        <div class="col-xs-6 text-center">
            <h3 style="line-height: 25px !important; font-weight: 600 !important; color: darkblue !important;">{{ optional($QuotationShow->company)->name ?? '' }}</h3>
            <span>{{ optional($QuotationShow->company)->business_type }}</span><br>
{{--            <span>{{ optional($QuotationShow->company)->head_office }}</span><br>--}}
{{--            <span><strong>Email: </strong>{{ optional($QuotationShow->company)->email }}</span><br>--}}
{{--            <span><strong>Phone: </strong>{{ optional($QuotationShow->company)->phone_number }}</span> <br>--}}
            <span><strong>JOB NUMBER</strong></span> <br>
        </div>
        <div class="col-xs-3"></div>
    </div>

    <div class="row mb-3">
        <div class="column-a" style="text-align: left">
             To
            <address>
                <strong>Name  : {{ optional($QuotationShow->rfqCustomer->customer)->name }}</strong><br>
                <strong>Phone : {{ optional($QuotationShow->rfqCustomer)->phone }}</strong><br>
                <strong>Company : {{ optional($QuotationShow->ClientCompany)->name }}</strong><br>
                <strong>Address : {{ optional($QuotationShow->rfqCustomer)->address }}</strong><br>

                <span>{{ optional($QuotationShow->rfqCustomer)->email }}</span> <br>


            </address>
        </div>
        <div class="column-a" style="text-align: right ; font-size: 14px">
            <span class="text-secondary">Job No:</span>
            {{ $QuotationShow->invoice_no }}<br>
            <span class="text-secondary">Job Date :</span>
            {{ $QuotationShow->date }}
            <br>
            <span class="text-secondary">PO No:</span>
            {{ $QuotationShow->poId->invoice }}<br>
            <span class="text-secondary">PO Date :</span>
            {{ $QuotationShow->poId->created_at }}
        </div>
    </div>



    <div class="row" style="width: 100%; margin: 0 !important;">
        <div class="col-sm-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="table-header-bg">
                    <th class="text-center"   width="8%">Sl</th>
                    <th class="text-center"   width="8%">date</th>
                    <th class="pl-3"   width="20%">Product Name</th>
                    <th class="pl-3"   width="20%">Description</th>
                    <th class="pl-3"   width="20%">Worker Name</th>
                    <th class="pl-3 text-right" style="  text-align: center" width="10%">Quantity</th>
                    <th class="pl-3 text-right"   width="10%">Purchases Price</th>
                    <th class="pl-3 text-right"   width="10%">Amount</th>
                </tr>
                </thead>

                @php
                    $totalAmount = 0;
                @endphp
                <tbody>
                @foreach($QuotationShow->details ?? [] as $details)
                    @php
                        $lineTotal = $details->quantity * $details->price;
                        $totalAmount += $lineTotal;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $details->created_at }}</td>
                        <td class="pl-3">
                            <p>{{ $details->item }}</p>
{{--                            <p class="pull-right">--}}
{{--                                <img src="{{asset(optional($details->product)->image)}}" style="height:100px; width: 100px" alt="">--}}
{{--                            </p>--}}
                        </td>
                        <td class="pl-3">
                            <p>{{ $details->description }}</p>
                        </td>
                        <td class="pl-3">
                            <p>{{ $details->worker_name }}</p>
                        </td>
                        <td style="text-align: center">{{ $details->quantity }}</td>
                        <td class="text-right">{{ $details->price }}</td>
                        <td class="text-right">{{ $lineTotal }}</td>
                    </tr>
                @endforeach
                </tbody>

                @php
                    use NumberToWords\NumberToWords;
                    $numberToWords = new NumberToWords();
                    $numberTransformer = $numberToWords->getNumberTransformer('en');
                @endphp


                <tfoot>
                <tr>
                    <th colspan="7"><strong class="pull-right">Sub total </strong></th>
                    <th class="pl-3 text-right">{{$totalAmount }}</th>
                </tr>
                <tr>

                    <th colspan="7"><strong class="pull-right">
                            @if($QuotationShow->discount_percentage >0 )
                                {{$QuotationShow->discount_percentage}} %
                            @endif
                            Discount Amount</strong></th>
                    <th class="pl-3 text-right">{{ $totalAmount - $QuotationShow->total_amount }}</th>
                </tr>
                <tr>
                    <th colspan="6">
                        <strong class="pull-center">
                            {{ $QuotationShow->total_amount != 0 ? 'In Words: ' : '' }}
                            {{ $numberTransformer->toWords($QuotationShow->total_amount) }}
                            {{ $QuotationShow->total_amount!= 0 ? ' Taka Only' : '' }}
                        </strong>
                    </th>
                    <th ><strong class="pull-right">Total</strong></th>
                    <th class="pl-3 text-right">{{ $QuotationShow->total_amount }}</th>
                </tr>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="hidden-print" style="float: right; padding-right: 10px !important;">
            <div class="btn-group btn-group-xs">
                <a class="btn btn-primary btn-xs" href="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
                <a class="btn btn-danger btn-xs" href="{{ route('rfq-job-number.index') }}"><i class=" fa fa-backward"></i> Back To List</a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5 signature-row">
        <div class="column" style="text-align: left">
            Customer <br><b>{{ optional($QuotationShow->customer)->name }} </b><br>
            <hr>
            Signature and Date
        </div>
        <div class="column">
        </div>
        <div class="column" style="text-align: right">
            Issued By <br><b>{{ optional($QuotationShow->company)->name }} </b> <br>
            <hr>
            Signature and Date
        </div>
    </div>
    <br>
    <hr>
    <div class="row mt-5 mb-5 signature-row">
        <p>Office:{{ optional($QuotationShow->company)->head_office ?? '' }} ,Fax:{{ optional($QuotationShow->company)->fax ?? '' }} , Tel:{{ optional($QuotationShow->company)->phone_number ?? '' }}, Email : {{ optional($QuotationShow->company)->email ?? '' }}</p>
    </div>
@endsection

