@extends('layouts.master')
@section('title', 'Ledger Journal')
@section('page-header')
    <i class="fa fa-list"></i> Ledger Journal
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


            <!-- Sub Header -->
            <div class="row pb-1" style="width: 100%; margin: 0 !important;">
                <div class="col-sm-12 px-1" style="width: 100%">
                    <h4 style="background-color: #eee; padding: 12px; text-align: center">Account Ledger</h4>
                    @if(optional($transactions->first())->account)
                        <h4 style="padding: 0; margin: 0; text-align: center">{{ optional(optional($transactions->first())->account)->name }}</h4>
                    @endif
                    <h5 style="text-align: center;">Date From {{ fdate(request('from'),'d/m/Y') }} To {{ fdate(request('to'),'d/m/Y') }}</h5>
                </div>
            </div>

            <!-- LIST -->
            <div class="row" style="width: 100%; margin: 0 !important;">
                <div class="col-sm-12 px-1" style="width: 100%">
                    <table class="table table-bordered table-striped" style="margin-bottom: 0; width: 100%">
                        <thead>
                            <tr class="table-header-bg">
                                <th class="text-center">Sl</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Transaction No</th>
                                <th class="pl-3">Description</th>
                                <th class="text-right pr-1">Dr.</th>
                                <th class="text-right pr-1">Cr.</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($transactions->count() < 1)
                                <tr>
                                    <td colspan="7" style="font-size: 16px" class="text-center text-danger">NO RECORDS
                                        FOUND!
                                    </td>
                                </tr>
                            @endif

                            @foreach($transactions as $transaction)

                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $transaction->date }}</td>
                                    <td class="text-center">{{ $transaction->invoice_no }}</td>
                                    <td class="pl-3">{{ $transaction->getDescription() }}</td>
                                    <td class="text-right pr-1">{{ number_format($transaction->amount < 0 ? abs($transaction->amount) : 0, 2) }}</td>
                                    <td class="text-right pr-1">{{ number_format($transaction->amount >= 0 ? $transaction->amount : 0, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="4">Total:</th>
                                <th class="text-right pr-1">{{ number_format(abs($totalDebit), 2) }}</th>
                                <th class="text-right pr-1">{{ number_format($totalCredit, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


