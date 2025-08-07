@extends('layouts.master')


@section('title', 'Account Receivable')


@section('page-header')
    <i class="fa fa-list"></i> Account Receivable
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

            <!-- Buttons -->
    <div class="row px-1 pt-2 pb-2 text-right no-print" style="width: 100%; margin: 0 !important;">
        <div class="btn-group btn-corner">
            <button type="submit" class="btn btn-danger btn-sm" onclick="print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>



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
            <hr>

    <!-- Sub Header -->
    <div class="row pb-1" style="width: 100%; margin: 0 !important;">
        <div class="col-sm-12 px-1" style="width: 100%">
            <h4 style="background-color: #eee; padding: 12px; text-align: center">Account Receivable</h4>
        </div>
    </div>




    <!-- LIST -->
    <div class="row" style="width: 100%; margin: 0 !important;">
        <div class="col-sm-12 px-1" style="width: 100%">
            <table class="table table-bordered table-striped" style="margin-bottom: 0; width: 100%">
                <thead>
                    <tr class="table-header-bg">
                        <th class="text-center">Sl</th>
                        <th>Account Name</th>
                        <th class="text-right pr-1">Balance</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($transactions as $account)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $account->name }}</td>
                            <td class="text-right pr-1">
                                {{ number_format($account->balance, 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>



                @if(count($transactions) > 0)
                    <tfoot>
                        <tr style="font-size: 18px">
                            <th class="text-right" colspan="2">
                                <strong>Total=</strong>
                            </th>
                            <th class="text-right pr-1">
                                <strong>{{ number_format($transactions->sum('balance'), 2) }}</strong>
                            </th>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>

@endsection


