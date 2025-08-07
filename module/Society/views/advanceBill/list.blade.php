@extends('layouts.master')
@section('title', 'Advance Bill Generate')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
@stop

@section('content')

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
                        <h4 class="widget-title" style="display: inline; margin-right: 10px;">Advance Bill Generate</h4>
                        <a href="{{ route('advanceBill.list') }}" class="btn btn-sm btn-secondary"
                            style="display: inline; border-radius: 50%;">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px; margin-bottom:20px;">

                <form action="{{ route('advance.bill.generate') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Year Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="year">Year<span style="color: red;">*</span></label>
                            <select id="year" name="year" class="form-control select2" required>
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Month Dropdown -->
                    <div class="col-md-2 col-12" style="padding: 0 15px;">
                        <div class="form-group">
                            <label for="month">Month<span style="color: red;">*</span></label>
                            <select id="month" name="month[]" class="form-control select2" multiple>
                                <option value="" disabled>Select Month</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month->id }}">{{ $month->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) button to
                                select multiple options.</small>
                        </div>
                    </div>

                    <!-- Block Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="block">Block<span style="color: red;">*</span></label>
                            <select id="block_id" name="block_id" class="form-control select2" required>
                                <option value="">Select Block</option>
                                @foreach ($blocks as $block)
                                    <option value="{{ $block->id }}">{{ $block->blockName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Road dropdown -->
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="roadName">Road<span
                                    style="color: red;">*</span></label>
                            <div>
                                <select id="roadName" name="road" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Road</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Plot dropdown -->
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="plotName">Plot<span
                                    style="color: red;">*</span></label>
                            <div>
                                <select id="plotName" name="plot" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Plot</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Plot dropdown -->
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="fatName">Flat<span
                                    style="color: red;">*</span></label>
                            <div>
                                <select id="flatName" name="flat" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Flat</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row justify-content-center" style="margin-top: 5px; margin-left: 10px; margin-right: 10px;">
                        <div class="col-md-12 col-12 text-right" style="padding-left:20px; padding-right:20px;">
                            <div class="form-group" style="padding-top: 5px;">
                                <button type="submit" class="btn btn-sm btn-info">Generate Bill</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="row" style="margin: 3px;">
                <div class="col-xs-12" style="padding-top: 15px; padding-bottom:15px;">
                    <table id="" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Flat Name</th>
                                <th class="text-center">Plot</th>
                                <th class="text-center">Road</th>
                                <th class="text-center">Block</th>
                                <th class="text-center">OwnerName</th>
                                <th class="text-center">TanentName</th>
                                <th class="text-center">ID No.</th>
                                <th class="text-center">Bill No.</th>
                                <th class="text-center">Usage Type</th>
                                <th class="text-center">Service Charge</th>
                                <th class="text-center">Previous Due</th>
                                <th class="text-center">Advance</th>
                                <th class="text-center">Total Payable</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($advBills as $bill)
                                <tr></tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bill->units ?? 'N/A' }}</td>
                                <td>{{ $bill->AssignPlot->plotName ?? 'N/A' }}</td>
                                <td>{{ $bill->AssignRoad->roadName ?? 'N/A' }}</td>
                                <td>{{ $bill->AssignBlock->blockName ?? 'N/A' }}</td>
                                <td>{{ $bill->flat->ownerName ?? 'N/A' }}</td>
                                <td>{{ $bill->flat->tenantName ?? 'N/A' }}</td>

                                <td>{{ $bill->flats ?? 'N/A' }}</td>
                                <td>{{ $bill->billNo ?? 'N/A' }}</td>
                                <td>{{ $bill->usageType ?? 'N/A' }}</td>
                                <td align="right">{{ $bill->monthlyDue ?? '0.00' }}</td>
                                <td align="right">
                                    @php
                                        $previousDueSum = 0;

                                        if ($bill->created_at) {
                                            $currentYear = $bill->year->year;

                                            $currentMonths = json_decode($bill->month_id, true) ?? [];

                                            $months = [
                                                'January',
                                                'February',
                                                'March',
                                                'April',
                                                'May',
                                                'June',
                                                'July',
                                                'August',
                                                'September',
                                                'October',
                                                'November',
                                                'December',
                                            ];

                                            $currentMonthIndexes = array_map(function ($m) use ($months) {
                                                return array_search($m, $months);
                                            }, $currentMonths);

                                            $previous = DB::table('generate_bills')
                                                ->join('months', 'generate_bills.month_id', '=', 'months.id')
                                                ->join('years', 'generate_bills.year_id', '=', 'years.id')
                                                ->where('generate_bills.flats', $bill->flats)
                                                ->where(function ($query) use (
                                                    $currentYear,
                                                    $currentMonthIndexes,
                                                    $months,
                                                ) {
                                                    $query
                                                        ->where('years.year', '<', $currentYear)
                                                        ->orWhere(function ($query) use (
                                                            $currentYear,
                                                            $currentMonthIndexes,
                                                            $months,
                                                        ) {
                                                            $query
                                                                ->where('years.year', $currentYear)
                                                                ->whereIn(
                                                                    'months.name',
                                                                    array_slice($months, 0, max($currentMonthIndexes)),
                                                                );
                                                        });
                                                })
                                                ->pluck('monthlyDue');

                                            $previousDueSum = $previous->sum();
                                        }
                                    @endphp


                                    {{ $previousDueSum }}
                                </td>

                                <td align="right">{{ $bill->flat->advance ?? '0.00' }}</td>
                                <td align="right"><b>
                                        @php
                                            $totalDue = $bill->monthlyDue + $previousDueSum;
                                            $totalPayable = max(0, $totalDue - $bill->advance);
                                        @endphp
                                        {{ $totalPayable }}</b>
                                </td>
                                @php
                                    $billingID = Str::slug(str_replace('/', 'xxx', $bill->billingID));
                                @endphp
                                <td>
                                    <a href="{{ route('adv.bill.generateBill.pdf', $billingID) }}"
                                        style="display: inline-block; margin-right: 10px;" title="Receipt"
                                        target="_blank">
                                        <i class="fa fa-receipt"></i>
                                    </a>
                                    <a href="{{ route('adv.bill.generateBill', ['id' => $billingID, 'export_type' => 'export_pdf'] + request()->query()) }}"
                                        target="_blank" style="margin-right: 5px" title="Download" target="_blank">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <form action="{{ route('adv.bill.generateBill.billdelete', $bill->id) }}"
                                        style="display: inline-block;" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this bill?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            <i style="color: red;" class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="14">No bills found for the specified billing ID.</td>
                                </tr>
                            @endforelse


                        </tbody>


                    </table>

                    <div style="display: flex; justify-content:right;">
                        @isset($advBills)
                            {{ $advBills->links('custom') }}
                        @endisset
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#month').select2({
                width: '100%',
                placeholder: 'Select Month',
                multiple: true,
            });
        });
    </script>

    <!-- Ajax for road, plot and flat Dropdown -->
    <script>
        $(document).ready(function() {
            $('#block_id').change(function() {
                var blockName = $(this).val();

                $.ajax({
                    url: '{{ url('/society/advance/getRoadInfoByBlock') }}/' + blockName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#roadName').empty();
                        $('#roadName').append('<option value="">Select Road</option>');
                        $.each(data, function(key, value) {
                            $('#roadName').append('<option value="' + value.road.id +
                                '">' + value.road.roadName + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {}
                });
            });


            $('#roadName').change(function() {
                var roadName = $(this).val();

                $.ajax({
                    url: '{{ url('/society/advance/getPlotInfoByRoad') }}/' + roadName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#plotName').empty();
                        $('#plotName').append('<option value="">Select Plot</option>');
                        $.each(data, function(key, value) {
                            $('#plotName').append('<option value="' + value.plot_id +
                                '">' + value.plotName + '</option>');
                        });

                    },
                    error: function(xhr, status, error) {}
                });
            });


            $('#plotName').change(function() {
                var plotName = $(this).val();


                $.ajax({
                    url: '{{ url('/society/advance/getFlatInfoByPlot') }}/' + plotName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#flatName').empty();
                        $('#flatName').append('<option value="">Select Flat</option>');
                        $.each(data, function(key, value) {
                            $('#flatName').append('<option value="' + value.id +
                                '">' + value.flatName + '</option>');
                        });
                        console.log(value.id);
                    },
                    error: function(xhr, status, error) {}
                });
            });
        });
    </script>


    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#dynamic-table').DataTable({
                "paging": false
            });
        });
    </script>

    <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>

@stop
