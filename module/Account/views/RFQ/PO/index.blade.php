@extends('layouts.master')


@section('title', 'Receive Vouchers')


@section('page-header')
    <i class="fa fa-info-circle"></i> Purchase Order  List
@stop


@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />


    <style>
        .table {
            margin-bottom: 0 !important;
        }
    </style>
@endpush





@section('content')
    <div class="row">
        <div class="col-sm-12">

            @include('partials._alert_message')


            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">

                <!-- heading -->
                <div class="widget-header widget-header-small">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>

                    <div class="widget-toolbar">
                        <a href="{{ request()->url() }}" ><i class="fa fa-refresh"></i> Refresh</a>
                    </div>

                    {{--                    @if(hasPermission("voucher-receives.create", $slugs))--}}
                    <div class="widget-toolbar">
                        <a href="{{ route('po.create') }}" ><i class="fa fa-plus"></i> Create</a>
                    </div>
                    {{--                    @endif--}}
                </div>

                <div class="space"></div>


                <!-- Filtering -->
                <div class="row px-3 pb-2" style="width: 100%; margin: 0 !important;" >
                    <form action="{{ route('po.index') }}" method="get">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="input-group">
                                    <label class="input-group-addon" for="">
                                        Purchase Order Number
                                    </label>
                                    <input type="text" name="invoice_no" value="{{ request('invoice_no') }}" class="form-control" placeholder="Purchase Order Number ">
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm date-picker" name="from_date" value="{{ request('from_date') }}" autocomplete="off">
                                    <span class="input-group-addon">From|To</span>
                                    <input type="text" class="form-control input-sm date-picker" name="to_date" value="{{ request('to_date') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="btn-group btn-corner">
                                    <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ request()->url() }}" class="btn btn-default btn-xs"><i class="fa fa-refresh"></i> Refresh</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <br>
                    <br>

                    <!-- LIST -->
                    <div class="row" style="width: 100%; margin: 0 !important;">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="table-header-bg">
                                    <th class="text-center" style="color: white !important;" width="8%">Sl</th>
                                    <th class="pl-3" style="color: white !important;" width="20%">Purchase Order Number </th>
                                    <th class="pl-3" style="color: white !important;">Company</th>
                                    <th class="pl-3" style="color: white !important;">Customer</th>
                                    <th class="pl-3" style="color: white !important;">Date</th>
                                    <th class="pl-3" style="color: white !important;">Invoice</th>

                                    <th class="text-center" style="color: white !important;">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($PO as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="pl-3">{{ $item->invoice }}</td>
                                        <td class="pl-3">{{ $item->ClientCompany->name }}</td>
                                        <td class="pl-3">{{ $item->rfqCustomer->customer->name ?? '' }}</td>
                                        <td class="pl-3">{{ $item->created_at }}</td>
                                        <td class="pl-3">
                                            <div class="btn"><a href="{{ asset($item->file) }}" target="_blank">View</a></div>
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group btn-corner">

                                                @include('partials._user-log', ['data' => $item])

                                                <a href="{{ route('po.edit', $item->id) }}" target="_blank" class="btn btn-success btn-xs" title="View Details"><i class="fa fa-edit"></i></a>

{{--                                                @if(hasPermission("po.delete", $slugs))--}}
                                                    <button type="button" onclick="delete_item('{{ route('po.destroy', $item->id) }}')" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></button>
{{--                                                @endif--}}
                                            </div>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <th colspan="50" class="text-center py-4">
                                            <strong class="text-danger">No Records Found!</strong>
                                        </th>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            @include('partials._paginate', ['data' => $PO])
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @endsection






        @section('js')

            <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
            <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>
            <script src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>

            <script type="text/javascript">

                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'yyyy-mm-dd',
                });

            </script>


@stop
