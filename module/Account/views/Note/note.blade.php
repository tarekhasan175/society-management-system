@extends('layouts.master')

@section('title', 'Voucher Reports')


@section('page-header')
    <i class="fa fa-info-circle"></i> Accounts Note
@stop


@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />

    <style type="text/css">
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

            /*thead {*/
            /*    page-break-before: avoid !important;*/
            /*}*/

            .widget-box {
                border: none !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            .px-4 {
                padding: 0 !important;
            }
            .table-header {
                position: sticky;
                top: 0;

                z-index: 1000;
             }
        }


    </style>
@endpush


@section('content')
    <div class="row">
        <div class="">

            @include('partials._alert_message')

            <!-- heading -->
            <div class="widget-box widget-color-white ui-sortable-handle clearfix " id="widget-box-7">

                <div class="widget-header widget-header-small no-print">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>

                    <div class="widget-toolbar">
                        <a href="{{route('notes.create')}}"><i class="fa fa-plus"></i> Create</a>
                    </div>
                    <div class="widget-toolbar">
                        <a href="#" onclick="print()"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
                @php
                    $companiess = \App\Models\Company::first();
                @endphp
                <div class="row heading d-print " style="margin-top: -30px">
                    <div class="col-xs-3">
                        @if(file_exists('uploads/company/'. optional($companiess)->logo))
                            <img class="invoice-logo" src="{{ asset('uploads/company/'. optional($companiess)->logo) }}" alt="Logo">
                        @endif
                    </div>
                    <div class="col-xs-6 text-center">
                        <h3 style="line-height: 15px !important; font-weight: 600 !important; color: darkblue !important;">{{ optional($companiess)->name ?? '' }}</h3>
                        <span>{{ optional($companiess)->head_office }}</span><br>
                        <span><strong>Email: </strong>{{ optional($companiess)->email }}</span><br>
                        <span><strong>Phone: </strong>{{ optional($companiess)->phone_number }}</span>
                    </div>
                    <div class="col-xs-3"></div>
                </div>
                <hr>

                <div class="space"></div>


                <div class="row" style="width: 100%; margin: 0 !important; margin-bottom: 20px !important">
                    <div class=" ">
                        <table class="table table-bordered table-striped"  style="margin-bottom: 0  ; ">
                            <thead>
                            <tr class="table-header-bg " style=" position: sticky; top: 0;   z-index: 1000; height: 150px"  >
                                <th class="text-center">Sl</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Client's Name</th>
                                <th class="text-center">Quote Number</th>
                                <th class="text-center">PO NUmber</th>
                                <th class="text-center">Job NUmber</th>
                                <th class="text-center">Work Done by <br> <span style="font-size: 8px">Name or Signature</span></th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Units Price</th>
                                <th class="text-center">Total Cost</th>
                                <th class="text-center">Job Report<br> <span style="font-size: 8px">Running Or Complete</span></th>
                                <th class="text-center">Bill Number & Date</th>
                                <th class="text-center">Bill Amount</th>
                                <th class="text-center">Paid Amount<br> <span style="font-size: 8px">Mode & Received</span></th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Credit</th>
                                <th class="text-center">Balance</th>
                                <th class="text-center">Credits Purpose<br> <span style="font-size: 8px">Bill or Invest</span></th>
                                <th class="text-center">Invest Paid</th>
                                <th class="text-center no-print">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $runningMainBalance = 0;
                                $totalDebit = 0;
                                $totalCredit = 0;
                            @endphp
                            @foreach($Notes as $note)
                                @php
                                     $currentMainBalance = $runningMainBalance + ($note->credit - $note->debit);
                                     $runningMainBalance = $currentMainBalance;
                                     $totalDebit        += $note->debit;
                                    $totalCredit        += $note->credit;
                                @endphp
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$note->name}}</td>
                                <td>{{$note->date}}</td>
                                <td>{{$note->description}}</td>
                                <td>{{$note->quote_number}}</td>
                                <td>{{$note->po_number}}</td>
                                <td>{{$note->job_number}}</td>
                                <td>{{$note->work_done_by}}</td>
                                <td>{{$note->quantity}}</td>
                                <td>{{$note->units_price}}</td>
                                <td>{{$note->total_price}}</td>
                                <td>{{$note->total_cost}}</td>
                                <td>{{$note->job_report}}</td>
                                <td>{{$note->bill_number}}</td>
                                <td>{{$note->paid_amount}}</td>
                                <td>{{$note->debit}}</td>
                                <td>{{$note->credit}}</td>
                                <td>{{$currentMainBalance}}</td>
                                <td>{{$note->credits_purpose}}</td>
                                <td>{{$note->invest_paid}}</td>
                                <td class="no-print">
                                    <div class="btn-group btn-corner">
                                        @include('partials._user-log', ['data' => $note])


                                            <a href="{{route('notes.edit', $note->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square"></i></a>


                                             <a href="#" onclick="delete_item('{{ route('notes.destroy', $note->id) }}')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                     </div>
                                </td>

                            </tr>
                            @endforeach
                            <tr style="font-size: 18px">
                                <th class="text-right" colspan="15">Grand Total</th>
                                <th class="text-right pr-1">{{ $totalDebit }} </th>
                                <th class="text-right pr-1"> {{ $totalCredit }}</th>
                                <th class="text-right pr-1"> {{ $runningMainBalance }}</th>
                            </tr>

                            </tbody>
                        </table>


                    </div>
                </div>

                <!-- LIST -->
            </div>
        </div>
    </div>


    <form action="" id="deleteItemForm" method="POST">
        @csrf @method("DELETE")
    </form>
@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>


    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>
    <script src="{{ asset('assets/custom_js/date-picker.js') }}"></script>
    <script src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>


    <script type="text/javascript">
        jQuery(function($) {
            $('#data-table').DataTable({
                "ordering": false,
                "bPaginate": true,
                "lengthChange": false,
                "info": false,
                "pageLength": 25
            });
        })
    </script>
@endsection
