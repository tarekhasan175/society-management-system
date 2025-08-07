@extends('layouts.master')
@section('title', 'Generate Monthly Bill')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
@stop


@section('content')

    <form action="{{ route('generateBill.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" id="error-alert">{{ session('error') }}</div>
        @endif

        <div class="col-12 col-md-12 col-xs-6" style="overflow: hidden;">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Generate Monthly Bill</h4>
                </div>


                <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">

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
                            <select id="block_id" name="block_id" class="form-control select2">
                                <option value="">Select Block</option>
                                @foreach ($bloks as $blok)
                                    <option value="{{ $blok->id }}">{{ $blok->blockName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Road Dropdown with search enabled -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="roadName">Road<span style="color: red;">*</span></label>
                            <select id="roadName" name="road[]" class="form-control select2" multiple="multiple">
                                <option value="">Select Road</option>
                            </select>
                        </div>
                    </div>

                    <!-- Plot Dropdown with search enabled -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="plotName">Plot</label>
                            <select id="plotName" name="plot[]" class="form-control select2" multiple="multiple">
                                <option value="">Select Plot</option>
                            </select>
                        </div>
                    </div>

                    <!-- Usages Type Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="usage_type">Usage Type</label>
                            <select id="usage_type" name="usage_type" class="form-control select2">
                                <option value="">Select Usage Type</option>
                                @foreach ($usage_types as $data)
                                    <option value="{{ $data->id }}">{{ $data->typeName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-center" style="margin-top: 5px; margin-left: 10px; margin-right: 10px;">
                    <!-- Submit Button -->
                    <div class="col-md-12 col-12 text-right" style="padding-left:15px; padding-right:20px;">
                        <div class="form-group" style="padding-top: 25px;">
                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                        </div>
                    </div>
                </div>

                <!-- Search table -->
                @if ($temp_generate_bills->isNotEmpty())
                    <div class="form-actions center"
                        style="text-align: left !important; margin: 0; padding: 8px 8px; background:transparent; border-top: 0">
                        <a onclick="selectEveryone()" id="selectEveryone" class="btn btn-sm btn-info send-sms-btn"
                            style="transition: 300ms; background-color: #4F99C6 !important; color: white !important; border-color: #4F99C6 !important;">
                            &#10003; Select All
                        </a>

                    </div>

                    <div class="row" style="margin: 3px;">
                        <div class="col-xs-12">
                            <table id="" class="table table-striped table-bordered table-hover"
                                style="display: block; max-height: 40em; overflow-y: auto; width: 100%;">
                                <thead style="position: sticky; top: 0; z-index: 1000;">
                                    <tr>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Sl</th>
                                        <th class="text-center">Block</th>
                                        <th class="text-center">Road</th>
                                        <th class="text-center">Plot</th>
                                        <th class="text-center">Flat Name</th>
                                        <th class="text-center">OwnerName</th>
                                        <th class="text-center">TanentName</th>
                                        <th class="text-center">ID No.</th>
                                        <th class="text-center">Bill No.</th>
                                        <th class="text-center">Usage Type</th>
                                        <th class="text-center">Service Charge</th>
                                        <th class="text-center">Previous Due</th>
                                        <th class="text-center">Advance</th>
                                        <th class="text-center">Total Payable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($temp_generate_bills as $index => $bill)
                                        <tr>
                                            <td class="text-center">
                                                <label class="inline">
                                                    <input type="checkbox" name="bill_id[]" value="{{ $bill->id }}"
                                                        class="ace bill-checkbox">
                                                    <span class="lbl">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bill->AssignBlock->blockName ?? 'N/A' }}</td>
                                            <td>{{ $bill->AssignRoad->roadName ?? 'N/A' }}</td>
                                            <td>{{ $bill->AssignPlot->plotName ?? 'N/A' }}</td>
                                            <td>{{ $bill->units ?? 'N/A' }}</td>
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
                                                        $currentMonth = $bill->month->name;

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

                                                        $currentMonthIndex = array_search($currentMonth, $months);

                                                        $previous = DB::table('generate_bills')
                                                            ->join(
                                                                'months',
                                                                'generate_bills.month_id',
                                                                '=',
                                                                'months.id',
                                                            )
                                                            ->join('years', 'generate_bills.year_id', '=', 'years.id')
                                                            ->where('generate_bills.flats', $bill->flats)
                                                            ->where(function ($query) use (
                                                                $currentYear,
                                                                $currentMonthIndex,
                                                                $months,
                                                            ) {
                                                                $query
                                                                    ->where('years.year', '<', $currentYear)
                                                                    ->orWhere(function ($query) use (
                                                                        $currentYear,
                                                                        $currentMonthIndex,
                                                                        $months,
                                                                    ) {
                                                                        $query
                                                                            ->where('years.year', $currentYear)
                                                                            ->whereIn(
                                                                                'months.name',
                                                                                array_slice(
                                                                                    $months,
                                                                                    0,
                                                                                    $currentMonthIndex,
                                                                                ),
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
                                            <td align="right"><b> @php

                                                $totalDue = $bill->monthlyDue + $previousDueSum;
                                                $totalPayable = max(0, $totalDue - $bill->advance);
                                            @endphp
                                                    {{ $totalPayable }}</b></td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14">No bills found for the specified billing ID.</td>
                                        </tr>
                                    @endforelse


                                </tbody>


                            </table>

                            <div style="display: flex; justify-content:right;">
                                @isset($flats)
                                    {{ $flats->links('custom') }}
                                @endisset
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 15px; margin-left: 10px;">
                        <!-- Generate Button -->
                        <div class="col-md-1 col-12" style="padding-left:15px; padding-right:40px;">
                            <div class="form-group" style="padding-top: 25px;">
                                <button type="button" class="btn btn-sm btn-info" id="generate-button">Generate</button>
                            </div>
                        </div>

                        <!-- Not Generate Button -->
                        <div class="col-md-1 col-12" style="padding-left:15px; padding-right:40px;">
                            <div class="form-group" style="padding-top: 25px;">
                                <button type="button" class="btn btn-sm btn-danger" id="not-generate-button">Not
                                    Generate</button>
                            </div>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </form>

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="row" style="margin: 3px;">
                <div class="col-xs-12" style="padding-top: 20px; padding-bottom:20px;">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Block</th>
                                <th>Road</th>
                                <th>Action <small>(Road)</small> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generateBillsUnique as $bill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bill->Assignyear->year ?? '' }}</td>
                                    <td>
                                        @if (empty($bill->Assignmonth->name))
                                            <span style="color: red;">Yearly Bill Generated</span>
                                        @else
                                            {{ $bill->Assignmonth->name }}
                                        @endif
                                    </td>

                                    <td>{{ $bill->AssignBlock->blockName ?? '' }}
                                        <a href="{{ route('block.generateBill.pdf', $bill->block_id) }}"
                                            style="display: inline-block; margin-right: 10px;" title="Receipt"
                                            target="_blank">
                                            <i class="fa fa-receipt"></i>
                                        </a>

                                        <a href="{{ route('generateBill.bill', ['id' => $bill->block_id, 'export_type' => 'export_pdf'] + request()->query()) }}"
                                            target="_blank" style="margin-right: 5px" title="Download" target="_blank">
                                            <i class="fa fa-download"></i>
                                        </a>

                                    </td>
                                    <td>{{ $bill->AssignRoad->roadName ?? '' }}

                                    </td>

                                    @php
                                        $billingID = Str::slug(str_replace('/', 'xxx', $bill->billingID));
                                    @endphp

                                    <td>
                                        @if (@$bill->Assignmonth->name == '')
                                            <a href="{{ route('generateBill.yearlyBill', $billingID) }}"
                                                style="display: inline-block; margin-right: 10px;" target="_blank">
                                                <i class="fa fa-list"></i>
                                            </a>
                                            <a href="{{ route('generateBill.yearlyPdf', $billingID) }}"
                                                style="display: inline-block; margin-right: 10px;" target="_blank">
                                                <i class="fa fa-receipt"></i>
                                            </a>
                                        @else
                                            {{-- <a href="{{ route('generateBill.list', $billingID) }}" --}}
                                            <a href="{{ route('generateBill.road.list', $bill->road_id) }}"
                                                style="display: inline-block; margin-right: 10px;" title="List"
                                                target="_blank">
                                                <i class="fa fa-list"></i>
                                            </a>
                                            {{-- <a href="{{ route('generateBill.pdf', $billingID) }}" target="_blank" style="margin-right: 5px" title="View" target="_blank"> --}}
                                            <a href="{{ route('road.generateBill.pdf', $bill->road_id) }}"
                                                target="_blank" style="margin-right: 5px" title="View"
                                                target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            {{-- <a href="{{ route('generateBill.pdf', $billingID) }}" style="display: inline-block; margin-right: 10px;" title="Receipt" target="_blank"> --}}
                                            <a href="{{ route('road.generateBill.pdf', $bill->road_id) }}"
                                                style="display: inline-block; margin-right: 10px;" title="Receipt"
                                                target="_blank">
                                                <i class="fa fa-receipt"></i>
                                            </a>
                                            {{-- Download Road wise --}}
                                            <a href="{{ route('generateBill.bill', ['id' => $bill->road_id, 'export_type' => 'export_pdf'] + request()->query()) }}"
                                                target="_blank" style="margin-right: 5px" title="Download"
                                                target="_blank">
                                                <i class="fa fa-download"></i>
                                            </a>

                                            {{-- <a href="{{ route('generateBill.bill', ['id' => $billingID, 'export_type' => 'export_pdf'] + request()->query()) }}"
                                                target="_blank" style="margin-right: 5px" title="Download"
                                                target="_blank">
                                                <i class="fa fa-download"></i>
                                            </a> --}}

                                            <a href="{{ route('generateBill.delete', $bill->road_id) }}"
                                                style="display: inline-block; margin-right: 10px;" title="Delete"
                                                target="_blank" onclick="return confirm('Are you sure?')">
                                                <i style="color: red;" class="fa fa-trash"></i>
                                            </a>
                                        @endif

                                        {{-- <form id="delete-form-{{ $bill->id }}"
                                            action="{{ route('generateBill.delete', $bill->id) }}" title="Delete"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)" onclick="confirmDelete({{ $bill->id }});">
                                                <i style="color: red;" class="fa fa-trash"></i>
                                            </a>
                                        </form> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/jquery.selectallcheckbox.js') }}"></script>

    <script>
        function confirmDelete(billId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete the data?',
                icon: 'danger',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-form-' + billId).submit();
                }
            });
        }

        $(document).ready(function() {
            // Change event for block selection
            $('#block_id').change(function() {
                var blockName = $(this).val();

                $.ajax({
                    url: '{{ url('/society/getRoadInfoByBlock') }}/' + blockName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        console.log(data);
                        $('#roadName').empty();
                        $.each(data, function(key, value) {
                            $('#roadName').append('<option value="' + value.road.id +
                                '">' + value.road.roadName + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {}
                });
            });

            // Change event for filtering the table based on block and road selection
            $('#block, #roadName').on('change', function() {
                var selectedBlock = $('#block').val();
                var selectedRoad = $('#roadName').val();
                $('#dynamic-table tbody tr').each(function() {
                    var blockName = $(this).find('td:nth-child(4)').text();
                    var roadName = $(this).find('td:nth-child(5)').text();
                    var shouldDisplay = true;

                    if (selectedBlock && blockName !== selectedBlock) {
                        shouldDisplay = false;
                    }
                    if (selectedRoad && roadName !== selectedRoad) {
                        shouldDisplay = false;
                    }
                    $(this).toggle(shouldDisplay);
                });
            });

            // Road change event to fetch plot info based on selected road
            $('#roadName').change(function() {
                var roadName = $(this).val();

                $.ajax({
                    url: '{{ url('/society/getPlotInfoByRoad') }}/' + roadName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#plotName').empty();
                        $.each(data, function(key, value) {
                            $('#plotName').append('<option value="' + value.plot_id +
                                '">' + value.plotName + '</option>');
                        });
                        console.log(value.id);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // Initialize Select2 for year, month, block, and roadName selections
            $('#year').select2({
                width: '100%',
                placeholder: 'Select Year',
            });
            $('#month').select2({
                width: '100%',
                placeholder: 'Select Month',
                multiple: true,
            });
            $('#block').select2({
                width: '100%',
                placeholder: 'Select Block',
            });
            $('#roadName').select2({
                placeholder: "Select Road(s)",
                multiple: true,
                width: '100%'
            });
            $('#plotName').select2({
                placeholder: "Select Plot(s)",
                multiple: true,
                width: '100%'
            });

            // Initialize DataTable
            $('#dynamic-table').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>


    <script>
        //----------------------------------------------------------------//
        //                     SELECT ALL CHECKBOX                        //
        //----------------------------------------------------------------//
        function onChange(checkboxes, checkedState) {}
        $(document).ready(function() {

            $("#selectAll, #selectEveryone").selectAllCheckbox({
                checkboxesName: "bill_id[]",
                onChangeCallback: onChange,
                useIndeterminate: false
            });

        });


        //----------------------------------------------------------------//
        //                  SELECT EVERYONE CHECKBOX                      //
        //----------------------------------------------------------------//
        function selectEveryone() {

            let val = $('#isAllSelected').val();

            if (val == 1) {
                $('#isAllSelected').val(0);
            } else {
                $('#isAllSelected').val(1);
            }
        };
    </script>

    <!-- Script for save TempGenerateBill -->
    <script>
        document.getElementById('generate-button').addEventListener('click', function() {
            const selectedBills = Array.from(document.querySelectorAll('.bill-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedBills.length === 0) {
                Swal.fire('error', 'No bills selected!');
                return;
            }

            fetch('{{ route('generateBill.save') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        bill_id: selectedBills
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Success', 'Bills generated successfully!');
                        location.reload();
                    } else {
                        Swal.fire('error', 'Failed to generate bills.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>


    <!-- Script for truncating TempGenerateBill -->
    <script>
        document.getElementById('not-generate-button').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete the temporary table data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    fetch('{{ route('generateBill.truncate') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Success', 'Table truncated successfully!');
                                location.reload();
                            } else {
                                Swal.fire('error', 'Failed to truncate table.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });


        });
    </script>


@stop
