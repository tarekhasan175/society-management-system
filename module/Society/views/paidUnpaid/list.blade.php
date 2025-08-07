@extends('layouts.master')
@section('title', 'Bill Payment')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')

    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
            padding-right: 13px;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            text-decoration: none;
            margin-right: 2px;
        }

        .button i {
            margin-right: 8px;
        }

        .preview-bill {
            background-color: #007b8f;
        }

        .preview-money-receipt {
            background-color: #6a1b9a;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" id="error-alert">{{ session('error') }}</div>
    @endif

    <div class="col-12 col-md-12 col-xs-6">

        <div class="widget-box">

            <div class="widget-header">
                <div class="row">
                    <div class="col-md-6 col-6 col-xs-6 py-1">
                        <h4 class="widget-title" style="display: inline; margin-right: 10px;">Paid / Unpaid Bill</h4>
                        <a href="{{ route('paidUnpaid.list') }}" class="btn btn-sm btn-secondary"
                            style="display: inline; border-radius: 50%;">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="" style="margin-top: 15px; margin-left: 10px; margin-bottom: 20px; text-align: right;">
                <div class="button-container">
                    <a href="#" class="button preview-bill" onclick="handlePreview('Preview Bill')">
                        <i class="fas fa-print"></i> Preview Bill
                    </a>
                    <a href="#" class="button preview-money-receipt" onclick="handlePreview('Preview Money Receipt')">
                        <i class="fas fa-print"></i> Preview Money Receipt
                    </a>
                </div>
            </div>

            <div class="row justify-content-center"
                style="margin-top: 15px; margin-bottom:20px; padding-left: 20px; padding-right: 10px;">

                <form action="{{ route('paidUnpaid.filterPaidUnpaidBill') }}" method="GET" id="filterForm">

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Year <span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <div class="">
                                <select id="year" name="year" class="col-xs-11 col-sm-11 col-md-11" required
                                    onchange="submitForm()">
                                    <option value="">Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->id }}"
                                            {{ request('year') == $year->id ? 'selected' : '' }}>
                                            {{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Month
                            </label>
                            <div class="">
                                <select id="months" name="month" class="col-xs-11 col-sm-11 col-md-11" required
                                    onchange="submitForm()">
                                    <option value="">Select Month</option>
                                    @foreach ($months as $month)
                                        <option value="{{ $month->id }}"
                                            {{ request('month') == $month->id ? 'selected' : '' }}>
                                            {{ $month->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">Block<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div class="">
                                <select id="block" name="block" class="col-xs-11 col-sm-11 col-md-11" required
                                    onchange="submitForm(); captureSelectedBlock()">
                                    <option value="">Select Block</option>
                                    @foreach ($blocks as $block)
                                        <option value="{{ $block->getblock->id }}"
                                            {{ request('block') == $block->getblock->id ? 'selected' : '' }}>
                                            {{ $block->getblock->blockName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Road<span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <div class="">
                                <select id="roadName" name="road" class="col-xs-11 col-sm-11 col-md-11" required
                                    onchange="submitForm()">
                                    <option value="">Select Road</option>
                                    @if (isset($roads))
                                        @foreach ($roads as $road)
                                            <option value="{{ $road->id }}"
                                                {{ request('road') == $road->id ? 'selected' : '' }}>
                                                {{ $road->roadName }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Billing Status<span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <div class="">
                                <select id="billingStatus" name="billingStatus" class="col-xs-11 col-sm-11 col-md-11"
                                    required onchange="submitForm()">
                                    <option value="">Select Billing</option>
                                    <option value="paid" {{ request('billingStatus') == 'paid' ? 'selected' : '' }}>Paid
                                    </option>
                                    <option value="unpaid" {{ request('billingStatus') == 'unpaid' ? 'selected' : '' }}>
                                        Unpaid</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Previous Due Status<span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <div class="">
                                <select id="previousDueStatus" name="previousDueStatus"
                                    class="col-xs-11 col-sm-11 col-md-11" required onchange="submitForm()">
                                    <option value="">Select Previous Due</option>
                                    <option value="withDue"
                                        {{ request('previousDueStatus') == 'withDue' ? 'selected' : '' }}>
                                        With Due
                                    </option>
                                    <option value="withoutDue"
                                        {{ request('previousDueStatus') == 'withoutDue' ? 'selected' : '' }}>Without Due
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box" style="padding: 15px;">
            <table id="billingTable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Bill NO</th>
                        <th>Road</th>
                        <th>Plot</th>
                        <th>Flat Name</th>
                        <th>Flat ID</th>
                        <th>Owner Name</th>
                        <th>Charge</th>
                        <th>Previous Due</th>
                    </tr>
                </thead>

                <tbody>
                    @if (isset($generateBills))
                        @foreach ($generateBills as $bill)
                            <tr>
                                <td>{{ $bill->billNo }}</td>
                                <td>{{ $bill->roads->roadName ?? 'N/A'}}</td>
                                <td>{{ $bill->flat->plotName ?? 'N/A' }}</td>
                                <td>{{ $bill->flat->flatName ?? 'N/A' }}</td>
                                <td>{{ $bill->flat->flatID ?? 'N/A' }}</td>
                                <td>{{ $bill->flat->ownerName ?? 'N/A' }}</td>
                                <td>{{ $bill->amount ?? 'N/A' }}</td>

                                <td>
                                    @php
                                        $previousDueSum = 0;

                                        if ($bill->created_at) {
                                            // Get the date of the current bill
                                            $currentDate = $bill->created_at;

                                            // Query for previous bills based on the flat and created_at date
                                            $previousDueSum = DB::table('generate_bills')
                                                ->where('flat_id', $bill->flat_id)
                                                ->where('created_at', '<', $currentDate) // Only previous bills
                                                ->sum('monthlyDue'); // Sum of monthlyDue for those previous bills
                                        }
                                    @endphp
                                    {{ $previousDueSum }}
                                </td>




                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Filter to see the expected bills</td>
                        </tr>
                    @endif
                </tbody>

            </table>

            <div style="display: flex; justify-content:right;">
                @isset($generateBills)
                    {{ $generateBills->links('custom') }}
                @endisset
            </div>


        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#year').select2();
            $('#months').select2();
            $('#block').select2();
            $('#roadName').select2();
            $('#plotID').select2();
            $('#billingStatus').select2();
            $('#previousDueStatus').select2();
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('#billingTable').DataTable();
        });
    </script> --}}

    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#dynamic-table').DataTable({
                "paging": false // This hides pagination
            });
        });
    </script>

    <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>


    {{-- <script>
        function handlePreview(type) {
            const year = document.getElementById('year').value;
            const month = document.getElementById('months').value;
            const block = document.getElementById('block').value;
            const road = document.getElementById('roadName').value;
            const billingStatus = document.getElementById('billingStatus').value;
            const previousDueStatus = document.getElementById('previousDueStatus').value;

            // Check if all required fields have values, allowing month to be optional
            if (year && block && road && billingStatus && previousDueStatus) {
                let url = '';
                if (type === 'Preview Bill') {
                    url = '{{ route('paidUnpaid.previewBill') }}';
                } else if (type === 'Preview Money Receipt') {
                    url = '{{ route('paidUnpaid.previewMoneyReceipt') }}';
                }

                // Append selected values to the URL as query parameters
                url +=
                    `?year=${year}&block=${block}&road=${road}&billingStatus=${billingStatus}&previousDueStatus=${previousDueStatus}`;

                // Include month in the URL only if it has a value
                if (month) {
                    url += `&month=${month}`;
                }

                // Redirect to the URL
                window.location.href = url;
            } else {
                alert('Please select all required filter options before proceeding.');
            }
        }
    </script> --}}


    <script>
        function handlePreview(type) {
            const year = document.getElementById('year').value;
            const month = document.getElementById('months').value;
            const block = document.getElementById('block').value;
            const road = document.getElementById('roadName').value;
            const billingStatus = document.getElementById('billingStatus').value;
            const previousDueStatus = document.getElementById('previousDueStatus').value;

            // Check if all required fields have values, allowing month to be optional
            let missingFields = [];

            // Add Month only if it's required (when `bill->month` ID exists)


            if (!year) missingFields.push('Year');
            if (!block) missingFields.push('Block');
            if (!road) missingFields.push('Road');
            if (!billingStatus) missingFields.push('Billing Status');
            if (!previousDueStatus) missingFields.push('Previous Due Status');
            @if (isset($bill) && $bill->month)
                if (!month) missingFields.push('Month');
            @endif


            if (missingFields.length === 0) {
                let url = '';
                if (type === 'Preview Bill') {
                    url = '{{ route('paidUnpaid.previewBill') }}';
                } else if (type === 'Preview Money Receipt') {
                    url = '{{ route('paidUnpaid.previewMoneyReceipt') }}';
                }

                // Append selected values to the URL as query parameters
                url +=
                    `?year=${year}&block=${block}&road=${road}&billingStatus=${billingStatus}&previousDueStatus=${previousDueStatus}`;

                // Include month in the URL only if it has a value
                if (month) {
                    url += `&month=${month}`;
                }

                // Redirect to the URL
                window.location.href = url;
            } else {
                alert(`Please select the required fields.`);
            }
        }
    </script>



@stop
