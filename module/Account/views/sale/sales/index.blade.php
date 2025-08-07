@extends('layouts.master')

@section('title', 'Sale List')

@section('page-header')
<i class="fa fa-info-circle"></i> Sale List
@stop


@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom_css/chosen-required.css') }}" />

@endpush

@section('content')

    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">

            @include('partials._alert_message')

            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">

                <!-- heading -->
                <div class="widget-header widget-header-small">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>

                    <div class="widget-toolbar">
                        <a href="{{ route('acc-sales.index') }}" ><i class="fa fa-refresh"></i> Refresh</a>
                    </div>

                    <div class="widget-toolbar">
                        <a href="{{ route('acc-sales.create') }}" ><i class="fa fa-plus"></i> Create</a>
                    </div>
                </div>



                <div class="space"></div>
                <div class="row px-3 pb-2" style="width: 100%; margin: 0 !important;">
                    <form action="" method="get">

                        <div class="col-sm-3">
                            <div class="input-group">
                                <label class="input-group-addon">Invoice</label>
                                <select id="invoice_no" name="invoice_no"   class="chosen-select-100-percent  required" data-placeholder="- Select Account -" style="display: none;">
                                    <option value=""></option>
                                    @foreach($sales as $value)
                                        <option value="{{ $value->invoice_no }}" {{ request('invoice_no') == $value->invoice_no ? 'selected' : '' }}>{{ $value->invoice_no ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <label class=" input-group-addon" for="account_id">
                                    Customer
                                    <sup class="text-danger">  </sup>
                                </label>
                                <select id="customer_id" name="customer_id"  class="chosen-select-100-percent  required" data-placeholder="- Select Account -" style="display: none;">
                                    <option value=""></option>
                                    @foreach($sales as $value)
                                        <option value="{{ $value->customer_id }}" {{ request('customer_id') == $value->customer_id ? 'selected' : '' }}>{{ $value->customer->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
{{--                            <div class="input-daterange input-group">--}}
{{--                                <span class="input-group-addon" style="border-left: 1px solid #ccc;">--}}
{{--                                    Date--}}
{{--                                </span>--}}
{{--                                <input type="text" name="from" class="input-sm form-control date-picker" value="{{ request('from') ?? date('Y-m-d') }}" autocomplete="off" placeholder="From" style="cursor: pointer"   >--}}
{{--                                <span class="input-group-addon">--}}
{{--                                    <i class="fa fa-exchange"></i>--}}
{{--                                </span>--}}
{{--                                <input type="text" name="to" class="input-sm form-control date-picker" value="{{ request('to') ?? date('Y-m-d') }}" autocomplete="off" placeholder="To" style="cursor: pointer"   >--}}
{{--                            </div>--}}
                        </div>

                        <div class="col-sm-2">
                            <div class="btn-group btn-corner">
                                <a href="{{ request()->url() }}" class="btn btn-default btn-sm">
                                    <i class="fa fa-refresh"></i>
                                    Refresh
                                </a>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="row">
                    <div class="col-sm-12 px-4">
                        <table id="data-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Invoice No</th>
                                    <th>Customer Name</th>
                                    <th class="text-right">Total Amount</th>
                                    <th class="text-right">Discount Amount</th>
                                    <th class="text-right">Paid Amount</th>
                                    <th class="text-right">Due Amount</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sale->date }}</td>
                                        <td>{{ $sale->invoice_no }}</td>
                                        <td>{{ $sale->customer->name ?? '' }}</td>
                                        <td class="text-right">{{ $sale->qty_amount }}</td>
                                        <td class="text-right">{{ $sale->discount_amount }}</td>
                                        <td class="text-right">{{ $sale->paid_amount }}</td>
                                        <td class="text-right">{{ $sale->due_amount }}</td>

                                        <td class="text-center">
                                            <div class="btn-group btn-corner">

                                                @include('partials._user-log', ['data' => $sale])

                                                @if(hasPermission("account-sales.view", $slugs))
                                                <a href="{{route('acc-sales.show', $sale->id)}}" target="_blank" class="btn btn-success btn-xs" title="View Details">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @endif

                                                @if(hasPermission("account-sales.delete", $slugs))
                                                    <button type="button" onclick="delete_item(`{{ route('acc-sales.destroy', $sale->id) }}`)" class="btn btn-xs btn-danger" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>




                    @if(count($sales) <= 0)
                        <div class="text-center">
                            <span class="text-warning">No Records Founds Yet!</span>
                        </div>
                        <br>
                    @else
                        @include('partials._paginate', ['data' => $sales])
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>
    <script src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>
@endsection
