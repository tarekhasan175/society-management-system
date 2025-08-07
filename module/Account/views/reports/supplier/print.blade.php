@extends('layouts.master')
@section('title','Account Ledger')
@section('page-header')
    <i class="fa fa-list"></i> Account Ledger
@stop
@push('style')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }


        .text-center {
            text-align: center !important;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">

        @include('partials._alert_message')

            <!-- Buttons -->
            <div class="row px-1 pt-2 pb-2 text-right no-print" style="width: 100%; margin: 0 !important;">
                <div class="btn-group btn-corner">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="print()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>

            <!-- Header image -->
            @php
                $companies = \App\Models\Company::first();
            @endphp
            <div class="row heading d-print ">
                <div class="col-xs-3">
                    @if(file_exists('uploads/company/'. optional($companies)->logo))
                        <img class="invoice-logo" src="{{ asset('uploads/company/'. optional($companies)->logo) }}" alt="Logo">
                    @endif
                </div>
                <div class="col-xs-6 text-center">
                    <h3 style="line-height: 15px !important; font-weight: 600 !important; color: darkblue !important;">{{ optional($companies)->name ?? '' }}</h3>
                    <span>{{ optional($companies)->head_office }}</span><br>
                    <span><strong>Email: </strong>{{ optional($companies)->email }}</span><br>
                    <span><strong>Phone: </strong>{{ optional($companies)->phone_number }}</span>
                </div>
                <div class="col-xs-3"></div>

            </div>
          

            <!-- Sub Header -->
            <div class="row pb-1" style="width: 100%; margin: 0 !important;">
                <div class="col-sm-12 px-1" style="width: 100%">
                    <h4 style="background-color: #eee; padding: 12px; text-align: center">Supplier Ledger</h4>
{{--                    <!-- <h4 style="padding: 0; margin: 0; text-align: center">{{ optional(optional($transactions->first())->account)->name }}</h4> -->--}}
                    <h5 style="text-align: center;">Date From {{fdate(request('from'),'d/m/Y')}} To {{fdate(request('to'),'d/m/Y')}}</h5>
                </div>
            </div>

            <!-- LIST -->
            <div class="row" style="width: 100%; margin: 0 !important;">
                <div class="col-sm-12 px-1" style="width: 100%">
                    <div class="row" style="width: 100%; margin: 0 !important;">
                        <div class="col-sm-12 px-4">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0">
                                <thead>
                                <tr class="table-header-bg">
                                    <th class="text-center">Sl</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Inv No</th>
                                    <th class="pl-3">Company</th>
                                    <th class="pl-3">Supplier</th>
                                    <th class="pl-3 text-right">Paid</th>
                                    <th class="pl-3 text-right">Due</th>
                                    <th class="pl-3 text-right">Total</th>
                                </tr>
                                </thead>

                                <tbody>

                                @php
                                    $total_amount = 0;
                                    $total_paid = 0;
                                    $total_due = 0;
                                @endphp


                                @foreach ($purchases as $key => $purchase)
                                    @php
                                        $total_amount += $purchase->total_amount;
                                        $total_paid += $purchase->paid_amount;
                                        $total_due += $purchase->due_amount;
                                    @endphp
                                    <tr>
                                        <td class="text-center"> </td>
                                        <td class="text-center">{{ $purchase->date }}</td>
                                        <td class="text-center">{{ $purchase->invoice_no }}</td>
                                        <td class="pl-3">{{ optional($purchase->company)->name }}</td>
                                        <td class="pl-3">{{ optional($purchase->supplier)->name }}</td>
                                        <td class="text-right pr-1">{{ number_format($purchase->paid_amount, 2) }}</td>
                                        <td class="text-right pr-1">{{ number_format($purchase->due_amount, 2) }}</td>
                                        <td class="text-right pr-1">{{ number_format($purchase->total_amount, 2) }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <th class="text-center" colspan="5">Total In Page</th>
                                    <th class="text-right pr-1">{{ number_format($total_paid, 2) }}</th>
                                    <th class="text-right pr-1">{{ number_format($total_due, 2) }}</th>
                                    <th class="text-right pr-1">{{ number_format($total_amount, 2) }}</th>
                                </tr>

                                {{-- @if($transactions->currentPage() == $transactions->lastPage())
                                    <tr style="font-size: 18px">
                                        <th class="text-center" colspan="4">Grand Total</th>
                                        <th class="text-right pr-1">{{ number_format($grand_total_debit_balance, 2) }}</th>
                                        <th class="text-right pr-1">{{ number_format($grand_total_credit_balance, 2) }}</th>
                                        <th></th>
                                    </tr>
                                @endif --}}

                                </tbody>
                            </table>

{{--                            @include('partials._paginate', ['data' => $purchases])--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


