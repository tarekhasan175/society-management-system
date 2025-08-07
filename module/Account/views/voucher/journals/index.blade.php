@extends('layouts.master')
@section('title', 'Journal Vouchers')
@section('page-header')
    <i class="fa fa-info-circle"></i> Journal Vouchers
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

            <!-- heading -->
            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">
                <div class="widget-header widget-header-small">
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

                                @if (hasPermission('voucher-journals.create', $slugs))
                                    <a href="{{ route('voucher-journals.create') }}"
                                        class="dt-button btn btn-white btn-info btn-bold" title="Create New"
                                        data-toggle="tooltip" tabindex="0" aria-controls="dynamic-table">
                                        <span>
                                            <i class="fa fa-plus bigger-110"></i>
                                        </span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space"></div>


                <!-- Filtering -->
                <div class="row px-3 pb-2" style="width: 100%; margin: 0 !important;" >
                   <form action="" method="get">

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
                               <label class="input-group-addon" for="">
                                   Reference
                               </label>
                               <input type="text" name="reference" value="{{ request('reference') }}" class="form-control" placeholder="Reference">
                           </div>
                       </div>
                       <div class="col-sm-3">

                           <div class="input-group">
                               <input type="text" class="form-control input-sm date-picker" name="from_date"
                                   value="{{ request('from_date') }}" autocomplete="off">
                               <span class="input-group-addon">From|To</span>
                               <input type="text" class="form-control input-sm date-picker" name="to_date"
                                   value="{{ request('to_date') }}" autocomplete="off">
                           </div>
                       </div>

                       <div class="col-sm-2">
                           <div class="btn-group btn-corner">
                               <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Search</button>
                               <a href="{{ request()->url() }}" class="btn btn-default btn-xs"><i class="fa fa-refresh"></i> Refresh</a>
                           </div>
                       </div>

                   </form>
               </div>


                <!-- LIST -->
                <div class="row" style="width: 100%; margin: 0 !important; margin-bottom: 20px !important">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="table-header-bg">
                                    <th class="text-center" style="color: white !important;" width="8%">Sl</th>
                                    <th class="pl-3" style="color: white !important;" width="20%">Invoice No</th>
                                    <th class="pl-3" style="color: white !important;">Date</th>
                                    <th class="pl-3" style="color: white !important;" width="15%">Reference</th>
                                    <th class="pr-3 text-right" style="color: white !important;">Amount</th>
                                    <th class="text-center" style="color: white !important;">Status</th>
                                    <th class="text-center" style="color: white !important;">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($vouchers as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="pl-3">{{ $item->invoice_no }}</td>
                                        <td class="pl-3">{{ $item->date }}</td>
                                        <td class="pl-3">{{ $item->reference }}</td>
                                        <td class="pr-3 text-right">{{ number_format($item->amount, 2) }}</td>
                                        <td class="text-center">
                                            {!! $item->is_approved == 1 ? '<span class="label label-info">Approved</span>' : '<span class="label label-warning">Unapproved</span>' !!}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-corner">
                                                @include('partials._user-log', ['data' => $item])

                                                <a href="{{ route('voucher-journals.show', $item->id) }}" target="_blank"
                                                    class="btn btn-success btn-xs" title="View Details"><i
                                                        class="fa fa-eye"></i></a>

                                                @if (!$item->is_approved)
                                                    @if (hasPermission('voucher-journals.edit', $slugs))
                                                        <a href="{{ route('voucher-journals.edit', $item->id) }}"
                                                            class="btn btn-primary btn-xs" title="Edit"><i
                                                                class="fa fa-pencil"></i></a>
                                                    @endif

                                                    <a href=" " class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>

                                                @endif
                                                @if (hasPermission('voucher-journals.delete', $slugs))
                                                    <a href="#"
                                                        onclick="delete_item('{{ route('voucher-journals.destroy', $item->id) }}')"
                                                        class="btn btn-danger btn-xs" title="Delete"><i
                                                            class="fa fa-trash"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="30" class="text-center">
                                            <br>
                                            <strong class="text-danger" style="font-size: 18px">No records found!</strong>
                                            <br>
                                            <br>
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @include('partials._paginate', ['data' => $vouchers])

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- delete form -->
    <form action="" id="deleteItemForm" method="POST">
        @csrf @method("DELETE")
    </form>

@endsection

@section('js')
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endsection
