@extends('layouts.master')


@section('title', 'Receive Vouchers')


@section('page-header')
    <i class="fa fa-info-circle"></i> Quotation List
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
                            <a href="{{ route('quotations.create') }}" ><i class="fa fa-plus"></i> Create</a>
                        </div>
{{--                    @endif--}}
                </div>

                <div class="space"></div>


                <!-- Filtering -->
                <div class="row px-3 pb-2" style="width: 100%; margin: 0 !important;" >
                    <form action="{{ route('quotations.index') }}" method="get">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <div class="input-group">
                                    <label class="input-group-addon" for="">
                                        Invoice No
                                    </label>
                                    <input type="text" name="invoice_no" value="{{ request('invoice_no') }}" class="form-control" placeholder="Invoice">
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
                                <th class="pl-3" style="color: white !important;" width="20%">Invoice No</th>
                                <th class="pl-3" style="color: white !important;">Date</th>
{{--                                <th class="pl-3" style="color: white !important;" width="15%">Reference</th>--}}
                                <th class="pr-3 text-right" style="color: white !important;">Amount</th>
                                <th class="text-center" style="color: white !important;">Status</th>
                                <th class="text-center" style="color: white !important;">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($quotation as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="pl-3">{{ $item->invoice_no }}</td>
                                    <td class="pl-3">{{ $item->date }}</td>
{{--                                    <td class="pl-3"> </td>--}}
                                    <td class="pr-3 text-right">{{ number_format($item->amount, 2) }}</td>
                                    <td class="text-center">
                                        {!! $item->is_approved == 1 ? '<span class="label label-info">Approved</span>' : '<span class="label label-warning">Created</span>' !!}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-corner">

                                            @include('partials._user-log', ['data' => $item])

                                            <a href="{{ route('quotations.show', $item->id) }}" target="_blank" class="btn btn-success btn-xs" title="View Details"><i class="fa fa-eye"></i></a>

{{--                                            @if(!$item->is_approved)--}}

{{--                                                @if(hasPermission("voucher-receives.approve", $slugs))--}}
{{--                                                    <a href="{{ route('voucher-receives.show', $item->id) }}?type=approve" target="_blank" class="btn btn-purple btn-xs" title="Approve Voucher"><i class="fa fa-check"></i></a>--}}
{{--                                                @endif--}}

{{--                                                @if(hasPermission("vouchers.edit", $slugs))--}}
{{--                                                     <a href="{{route('quotations.edit', $item->id)}}" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>--}}
{{--                                                @endif--}}
{{--                                            @endif--}}

{{--                                            @if(hasPermission("quotations.delete", $slugs))--}}
                                                <button type="button" onclick="delete_item('{{ route('quotations.destroy', $item->id) }}')" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></button>
{{--                                            @endif--}}
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

                        @include('partials._paginate', ['data' => $quotation])
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
