@extends('layouts.master')
@section('title', 'Subsidiary Wise Ledger')
@section('page-header')
    <i class="fa fa-info-circle"></i> Subsidiary Wise Ledger
@stop
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />

    <style type="text/css">

        .d-print {
            display: none !important;
        }
        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }

            .d-print {
                display: block !important;
            }

            /*tr {*/
            /*    page-break-after: avoid !important;*/
            /*}*/

            thead {
                page-break-before: avoid !important;
            }

            .widget-box {
                border: none !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            .px-4 {
                padding: 0 !important;
            }
        }

        .rate-entry-table td,
        tr {
            border: none !important;
        }

        .bg-qty {
            background: #5759604a;
        }

        .bg-value {
            background: #33712e45;
        }

        .chosen-container>.chosen-single,
        [class*=chosen-container]>.chosen-single {
            height: 30px !important;
        }

        input[type=checkbox].ace+.lbl::before {
            margin-right: 5px !important;
        }

    </style>
@endpush


@section('content')
    <div class="row">

        <div class="col-sm-12">

            @include('partials._alert_message')

            @php
                $total_debit = 0;
                $total_credit = 0;
            @endphp

            <!-- heading -->
            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">
                <div class="widget-header widget-header-small no-print">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>

                    <div class="widget-toolbar border smaller" style="padding-right: 0 !important">
                        <div class="pull-right tableTools-container" style="margin: 0 !important">
                            <div class="dt-buttons btn-overlap btn-group">
                                <a href="{{ request()->url() }}" class="dt-button btn btn-white btn-primary btn-bold"
                                    title="Refresh Data" data-toggle="tooltip">
                                    <span>
                                        <i class="fa fa-refresh bigger-110"></i>
                                    </span>
                                </a>

{{--                                <button type="submit" class="dt-button btn btn-white btn-info btn-bold" onclick="print()"><i class="fa fa-print"></i> Print</button>--}}

{{--                                <a href="{{ request()->getRequestUri() }}&print=print" class="dt-button btn btn-white btn-info btn-bold" style="color: maroon !important;" title="Print Data" data-toggle="tooltip" tabindex="0" aria-controls="dynamic-table">--}}
{{--                                <a href="{{route('report.subsidiary-wise-ledger', ['print' => 'print'])}}" class="dt-button btn btn-white btn-info btn-bold" style="color: maroon !important;" title="Print Data" data-toggle="tooltip" tabindex="0" aria-controls="dynamic-table">--}}
                                <a href=""  class="dt-button btn btn-white btn-info btn-bold " onclick="print()" style="color: maroon !important;" title="Print Data" data-toggle="tooltip" tabindex="0" aria-controls="dynamic-table">
                                    <span>
                                        <i class="fa fa-print bigger-110"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space"></div>


                @php
                    $companiessss = \App\Models\Company::first();
                @endphp
                <div class="row heading d-print mt-0" >
                    <div class="col-xs-3">
                        @if(file_exists('uploads/company/'. optional($companiessss)->logo))
                            <img class="invoice-logo" src="{{ asset('uploads/company/'. optional($companiessss)->logo) }}" alt="Logo">
                        @endif
                    </div>
                    <div class="col-xs-6 text-center">
                        <h3 style="line-height: 15px !important; font-weight: 600 !important; color: darkblue !important;">{{ optional($companiessss)->name ?? '' }}</h3>
                        <span>{{ optional($companiessss)->head_office }}</span><br>
                        <span><strong>Email: </strong>{{ optional($companiessss)->email }}</span><br>
                        <span><strong>Phone: </strong>{{ optional($companiessss)->phone_number }}</span>
                    </div>
                    <div class="col-xs-3"></div>
                </div>
                <br>



                <form action="" method="get">
                    <div class="row px-3 pb-2 no-print" style="width: 100%; margin: 0 !important;">

                        <div class="col-sm-3">
                            <div class="input-group">
                                <label class="input-group-addon">Company</label>
                                <select class="form-control chosen-select-100-percent" name="company_id" data-placeholder="-Select Company-">
                                    <option></option>
                                    @foreach ($companies as $id => $name)
                                        <option value="{{ $id }}" {{ request('company_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="col-sm-5">
                            @include('includes.input-groups.select-group', ['modelVariable' => 'accountSubsidiaries',
                            'edit_id' => request('account_subsidiary_id')])
                        </div>

                        <div class="col-sm-3">
                            @include('includes.input-groups.date-range', ['date1' => request('from',date('Y-m-d')), 'date2'
                            => request('to',date('Y-m-d')), 'is_read_only' => true])
                        </div>

                        <div class="col-sm-1">
                            <div class="btn-group btn-corner">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <p id="selectedCompanyName" class="d-print align-center bolder" style="font-size: 20px">Company: {{ $companies[request('company_id')] ?? 'None' }}</p>
                    <!-- LIST -->
                    <div class="row " style="width: 100%; margin: 0 !important;">
                        <div class="col-sm-12 px-4">
                            @if (request('account_subsidiary_id') && $accounts->count())
                                <table class="table table-bordered table-striped no-print" style="margin-bottom: 0">
                                    <thead>
                                        <tr class="table-header-bg">
                                            <th class="text-center" style="width: 10%">
                                                <label class="no-print">
                                                    <input type="checkbox" class="ace select-all">
                                                    <span class="lbl bolder">Select All</span>
                                                </label>
                                            </th>
                                            <th class="text-left pl-3" style="font-size: 14px">Account Name</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td class="text-center">
                                                    <label class="no-print">
                                                        <input type="checkbox" class="ace account" name="accounts[]"
                                                            value="{{ $account->id }}"
                                                            {{ in_array($account->id, request('accounts') ?? []) ? 'checked' : '' }}>
                                                        <span class="lbl bolder">{{ $loop->iteration }}</span>
                                                    </label>
                                                </td>
                                                <td class="text-left pl-3">
                                                    {{ $account->name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                    </tfoot>
                                </table>

                                @if (!request('accounts'))
                                    <div class="text-right py-2 no-print">
                                        <button type="submit" class="btn btn-primary btn-sm next-btn" disabled><i
                                                class="fa fa-arrow-right"></i> Next
                                        </button>
                                    </div>
                                @else
                                    <table class="table mt-2" style="margin-bottom: 10px">

                                        <tbody>

                                            @php

                                                $balance_type = $accountTransactions->first()->balance_type;
                                            @endphp


                                            @foreach ($accountTransactions as $account)

                                                <tr>
                                                    <th class="text-center" style="border-top: none; width: 3%">
                                                        {{ $loop->iteration }}
                                                    </th>

                                                    <th class="text-left pl-2" style="border-top: none">
                                                        {{ $account->name }}
                                                    </th>

                                                    @php

                                                        if ($balance_type == 'Debit') {
                                                            $total = ($account->transaction_items->sum('credit_amount') - $account->transaction_items->sum('debit_amount'));
                                                        } else {
                                                            $total = ($account->transaction_items->sum('debit_amount') - $account->transaction_items->sum('credit_amount'));
                                                        }
                                                    @endphp

                                                    <th style="border-top: none" class="text-right pr-2">
                                                        <strong style="font-size: 15px">{{ number_format($total) }}</strong>
                                                    </th>
                                                </tr>

                                                @if ($account->transaction_items->count())
                                                    <tr>
                                                        <td>
                                                        </td>

                                                        <td colspan="2">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Date</th>
                                                                        <th>Description</th>
                                                                        <th class="text-right pr-1">Dr.</th>
                                                                        <th class="text-right pr-1">Cr.</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @foreach ($account->transaction_items as $transaction)
                                                                        <tr>
                                                                            <td>{{ $transaction->date }}</td>
                                                                            <td>{{ $transaction->getDescription() }}</td>
                                                                            <td class="text-right pr-1">{{ number_format($transaction->credit_amount, 2) }}</td>
                                                                            <td class="text-right pr-1">{{ number_format($transaction->debit_amount, 2) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="3">
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- <h1>
        <strong>Total: {{ $total_credit - $total_debit }}</strong>
    </h1> --}}
@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>


    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>
    <script src="{{ asset('assets/custom_js/date-picker.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdown = document.getElementById('companyDropdown');
            const selectedCompanyName = document.getElementById('selectedCompanyName');

            dropdown.addEventListener('change', function () {
                const selectedOption = dropdown.options[dropdown.selectedIndex].text;
                selectedCompanyName.textContent = 'Selected Company: ' + selectedOption;
            });
        });
    </script>
    <script>
        const selectAll = $('input.select-all');
        const selectAccount = $('input.account');
        const accountSubsidiaryId = $('#account_subsidiary_id');

        accountSubsidiaryId.change(function() {
            if ($(this).val() == '') {
                window.location.href = '{{ request()->url() }}';
            }
        })

        selectAll.on('click', function() {
            if ($(this).prop('checked')) {
                selectAccount.each(function() {
                    $(this).prop('checked', true);
                })
                $('.next-btn').attr('disabled', false);
            } else {
                selectAccount.each(function() {
                    $(this).prop('checked', false);
                })
                $('.next-btn').attr('disabled', true);
            }
        })

        function accountIdClickedfunction() {
            let flag = true;
            $('.next-btn').attr('disabled', true);

            selectAccount.each(function() {
                if (!$(this).prop('checked')) {
                    flag = false;
                } else {
                    $('.next-btn').attr('disabled', false);
                }
            })

            selectAll.prop('checked', flag);
        }

        selectAccount.on('click', accountIdClickedfunction)

        accountIdClickedfunction()
    </script>
@endsection
