@extends('layouts.master')


@section('title', 'Income Statement')


@section('page-header')
    <i class="fa fa-info-circle"></i> Income Statement
@stop

@push('style')

    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />

    <style type="text/css">
        th,
        td {
            background: white;
            color: black !important;
        }



        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }

            .d-print {
                display: block !important;
            }

            tr {
                page-break-after: avoid !important;
            }

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

        @page {
            margin: 0.5in;
            /*size: landscape;*/
        }

        .d-print {
            display: none;
        }

    </style>
@endpush


@section('content')
    <div class="row">
        <div class="col-sm-12" style="width: 100%">

            @include('partials._alert_message')

            @php
                $from = request('from', date('Y-m-d'));
            @endphp

            <div class="no-print">
                <br>
                <br>
            </div>

            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7" style="width: 92%; margin: auto">
                <!-- heading -->
                <div class="widget-header widget-header-small no-print">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>

                    <div class="widget-toolbar border smaller">
                        <a href="{{ request()->url() }}">
                            <i class="fa fa-refresh bigger-110"></i> Refresh
                        </a>
                    </div>

                    <div class="widget-toolbar border smaller">
                        <span onclick="print()" style="color: maroon; cursor: pointer">
                            <i class="fa fa-print bigger-110"></i> Print
                        </span>
{{--                        <a href="{{route('report.income-statement', ['print' => 'print'])}}" class="dt-button btn btn-white btn-info btn-bold" style="color: maroon !important;" title="Print Data" data-toggle="tooltip" tabindex="0" aria-controls="dynamic-table">--}}
{{--                                    <span>--}}
{{--                                        <i class="fa fa-print bigger-110"></i>--}}
{{--                                    </span>--}}
{{--                        </a>--}}

                    </div>
                </div>
                <div class="space"></div>

                @php
                    $companiess = \App\Models\Company::first();
                @endphp
                <div class="row heading d-print ">
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
                <br>



                <!-- PRINT HEADER -->
                <h3 class="text-center d-print" style="margin-top: -30px !important;">INCOME STATEMENT</h3>
                <h3 class="text-center d-print" style="margin-top: -5px !important;"> Company :
                    @foreach ($companyNames as $name)
                    @if ($loop->first)
                        {{ $name }}
                    @else
                        {{ ', ' . $name }}
                    @endif
                    @endforeach
                </h3>
                <h4 class="text-center d-print">As On {{ fdate(request('from') ?? today(), 'd/m/Y') }}</h4>






                <div class="row" style="width: 100%; margin: 0 !important; padding: 0 !important;">


                    <!-- FILTER -->
                    <div class="row px-3 pb-2 no-print" style="width: 100%; margin: 0 !important;">
                        <form action="" method="get">







                            <!-- COMPANY NAME -->
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <label class="input-group-addon">Company</label>
                                    <select class="form-control chosen-select-100-percent" name="company_id[]" data-placeholder="-Select Company-" multiple>
                                        <option></option>
                                        @foreach ($companies as $id => $name)
                                            <option value="{{ $id }}"
                                                {{ request()->filled('company_id') && in_array($id, request('company_id')) ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <!-- MONTH -->
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <label class="input-group-addon">Month</label>
                                    <input type="text" name="month" value="{{ request('month') }}" autocomplete="off" class="form-control month-picker">
                                </div>
                            </div>



                            <!-- YEAR -->
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <label class="input-group-addon">Year</label>
                                    <input type="text" name="year" value="{{ request('year') }}" autocomplete="off" class="form-control year-picker">
                                </div>
                            </div>






                            <!-- DETAIL VIEW -->
                            <div class="col-sm-2">
                                <label class="block" style="margin-top: 5px;">
                                    <input name="is_details" type="checkbox" class="ace input-lg" value="1" {{ request('is_details') == 1 ? 'checked' : '' }}>
                                    <span class="lbl bigger-120"> Details</span>
                                </label>
                            </div>




                            <!-- ACTION -->
                            <div class="col-sm-1">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>









                    <!-- DETAIL -->
                    @if (request()->filled('is_details'))

                        @include('reports/income-statement/details-view')
                    @else

                        @include('reports/income-statement/sort-view')

                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>
    <script src="{{ asset('assets/custom_js/date-picker.js') }}"></script>
@endsection
