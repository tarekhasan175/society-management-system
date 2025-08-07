@extends('layouts.master')


@section('title', 'Cash Flow')


@section('page-header')
    <i class="fa fa-info-circle"></i> Cash Flow Report
@stop


@push('style')

    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}"/>

    <style type="text/css">
        table, td, tr {
            /* border: none !important; */
            background-color: transparent !important;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 3px;
        }
    </style>
@endpush


@section('content')
    <div class="row">
        <div class="col-sm-12">

            @include('partials._alert_message')

            @php
                $from = request('from',date('Y-m-d'));
                $to = request('to',date('Y-m-d'));
            @endphp


            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">


                <!-- heading -->
                <div class="widget-header widget-header-small">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>

                    <div class="widget-toolbar border smaller">
                        <a href="{{ request()->url() }}">
                            <i class="fa fa-refresh bigger-110"></i> Refresh
                        </a>
                    </div>

                    <div class="widget-toolbar border smaller">

                        <a href="{{ request()->fullUrlWithQuery(['print' => 1, 'from' => $from, 'to' => $to]) }}" style="color: maroon !important;">
                            <i class="fa fa-print bigger-110"></i> Print
                        </a>
                    </div>
                </div>


                <div class="space"></div>




                <div class="row px-3 pb-2" style="width: 100%; margin: 0 !important;">
                    <form action="" method="get">

                        <div class="col-sm-4 col-sm-offset-1">
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

                        <div class="col-sm-3">
                            @include('includes.input-groups.date-field', ['date' => $from, 'is_read_only' => true])
                        </div>

                        <div class="col-sm-2">
                            <div class="btn-group btn-corner">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>

                    </form>
                </div>







                <!-- LIST -->
                <div class="row" style="width: 100%; margin: 0 !important;">
                    <div class="col-sm-12 px-4">
                     
                        <div class="row">
                            <div class="col-sm-12">

                                <table class="table table-bordered table-striped" style="margin-bottom: 0; margin-left: 10%; width: 85%;">

                                    <tbody>
                                        <tr>
                                            <td>Sl.</td>
                                            <td><strong>Particular</strong></td>
                                            <td width="150px" class="text-center pr-1">Tk.</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <strong>Cash flows from operating activities: </strong>
                                            </td>
                                            <td width="150px" class="text-right pr-1"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Net Profit/Loss
                                            </td>
                                            <td width="150px" class="text-right pr-1">{{ number_format($equity_balance, 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Adjustment to reconcile net profit to net cash: 
                                            </td>
                                            <td width="150px" class="text-right pr-1"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Depriciation exp
                                            </td>
                                            <td width="150px" class="text-right pr-1">{{ number_format($depreciations, 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Current Asset Increase/Decrease 
                                            </td>
                                            <td width="150px" class="text-right pr-1">{{ $asset[0] >= 0 ? '(' . number_format(abs($asset[0]), 0) . ')' : number_format(abs($asset[0]), 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Current Liabilities Increase/Decrease
                                            </td>
                                            <td width="150px" class="text-right pr-1">{{ $liabilities[0] < 0 ? '(' . number_format(abs($liabilities[0]), 0) . ')' : number_format(abs($liabilities[0]), 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Net cash provided/used by Operating Activities
                                            </td>
                                            
                                            @php 
                                                $new_asset = (int)((-1) * $asset[0]);
                                                
                                                $operating_activities = $equity_balance 
                                                                        + $depreciations 
                                                                        + $new_asset
                                                                        + ($liabilities[0] >= 0 ? $liabilities[0] : (-1 * $liabilities[0]))
                                                                        ;
                                            @endphp 
                                            <td width="150px" class="text-right pr-1">
                                                <strong>{{ $operating_activities >= 0 ? '(' . number_format(abs($operating_activities), 0) . ')' : number_format(abs($operating_activities), 0) }}</strong>
                                            </td>
                                        </tr>












                                        
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <strong>Cash flows from investing activities: </strong>
                                            </td>
                                            <td width="150px" class="text-right pr-1"></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                Fixed Assets Increase/Decrease
                                            </td>
                                            <td width="150px" class="text-right pr-1">{{ $asset[1] >= 0 ? '(' . number_format(abs($asset[1]), 0) . ')' : number_format(abs($asset[1]), 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Net cash provided/used by I.A 
                                            </td>
                                            <td width="150px" class="text-right pr-1">
                                                <strong>{{ $asset[1] >= 0 ? '(' . number_format(abs($asset[1]), 0) . ')' : number_format(abs($asset[1]), 0) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <strong>Cash flows from financing activities:</strong> 
                                            </td>
                                            <td width="150px" class="text-right pr-1"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Long Time Liabilities Increase/Decrease
                                            </td>
                                            <td width="150px" class="text-right pr-1">{{ $liabilities[1] < 0 ? '(' . number_format(abs($liabilities[1]), 0) . ')' : number_format(abs($liabilities[1]), 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Net cash provided/used by F.A 
                                            </td>
                                            <td width="150px" class="text-right pr-1">
                                                <strong>{{ $liabilities[1] < 0 ? '(' . number_format(abs($liabilities[1]), 0) . ')' : number_format(abs($liabilities[1]), 0) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                Net Cash Charged 
                                                <br>
                                                Add Opening Balance
                                                <br>
                                                <strong>Closing Balance</strong>
                                            </td>
                                            <td width="150px" class="text-right pr-1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')


    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>


    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/date-picker.js') }}"></script>

@endsection


