@extends('layouts.master')
@section('title', 'Bill Payment')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
                        <h4 class="widget-title" style="display: inline; margin-right: 10px;">Bill Payment Entry</h4>
                        <a href="{{ route('payments.create') }}" class="btn btn-sm btn-secondary"
                            style="display: inline; border-radius: 50%;">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px; margin-bottom:20px;">

                <form action="{{ route('filter.bill.payment.entry') }}" method="GET" id="filterForm">

                    <!-- Year Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Year <span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <div class="">
                                <select id="year" name="year" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->id }}"
                                            {{ request('year') == $year->id ? 'selected' : '' }}>
                                            {{ $year->year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Month Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Month
                            </label>
                            <div class="">
                                <select id="months" name="month" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="">Select Month</option>
                                    @foreach ($months as $month)
                                        <option value="{{ $month->id }}"
                                            {{ request('month') == $month->id ? 'selected' : '' }}>
                                            {{ $month->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Block Dropdown -->
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Block
                            </label>
                            <div class="">
                                <select id="block" name="block" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="">Select Block</option>
                                    @foreach ($blocks as $block)
                                        <option value="{{ $block->block_id }}"
                                            {{ request('block') == $block->block_id ? 'selected' : '' }}>
                                            {{ $block->blockName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Road Dropdown -->
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Road
                            </label>
                            <div class="">
                                <select id="roadName" name="road" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="">Select Road</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Plot Dropdown -->
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Plot
                            </label>
                            <div class="">
                                <select id="plotID" name="plot" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="">Select Plot</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <div class="col-md-1 col-12" style="padding-left:15px; padding-right:20px;">
                        <div class="form-group" style="padding-top: 25px;">
                            <button type="submit" class="btn btn-sm btn-info">Search</button>
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
                        <th>Sl</th>
                        <th>Bill NO</th>
                        <th>Flat ID</th>
                        <th>Owner Name</th>
                        <th>Charge</th>
                        <th>Paid Amount</th>
                        <th>Advance</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (isset($generateBills))
                        @foreach ($generateBills as $bill)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $bill->billNo }}</td>
                                <td>{{ $bill->flats }}</td>
                                <td>{{ $bill->flat->ownerName ?? 'N/A' }}</td>

                                <td>
                                    @php
                                        $cpServiceCharge = $bill->month == null ? 12 * $bill->amount : $bill->amount;
                                    @endphp
                                    {{ $cpServiceCharge }}
                                </td>

                                <td>
                                    <input type="text" class="form-control amount-input" id="amount{{ $bill->id }}"
                                        placeholder="Enter amount" value="{{ $cpServiceCharge }}"
                                        oninput="checkAmount(this, 'check{{ $bill->id }}', {{ $cpServiceCharge }}, '{{ $bill->id }}')"
                                        data-bill-id="{{ $bill->id }}"
                                        data-cp-service-charge="{{ $cpServiceCharge }}">
                                    <div class="text-danger" id="error{{ $bill->id }}" style="display: none;">
                                        Insufficient Amount
                                    </div>
                                </td>
                                <td>
                                    <span id="advance{{ $bill->id }}">{{ $bill->flat->advance }}</span>
                                </td>



                                <td>
                                    <input type="checkbox" class="form-check-input bill-checkbox"
                                        id="check{{ $bill->id }}" data-id="{{ $bill->id }}"
                                        data-bill-no="{{ $bill->billNo }}" data-flat-id="{{ $bill->flat_id }}"
                                        data-owner-name="{{ $bill->flat->ownerName ?? 'N/A' }}"
                                        data-charge="{{ $bill->month == null ? 12 * $bill->amount : $bill->amount }}"
                                        onclick="updateHiddenFields(this)" disabled>
                                    <label class="form-check-label" for="check{{ $bill->id }}"></label>
                                </td>


                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Filter to see the expected bills</td>
                        </tr>
                    @endif
                </tbody>

                @if (request()->has('year'))
                    <div class="col-md-12 col-12 text-right">
                        <div class="form-group" style="padding-top: 25px; padding-right: 5px;">

                            <form action="{{ route('payments.store') }}" method="POST" id="paymentForm"
                                style="display: inline;">
                                @csrf
                                <input type="text" name="bill_no[]" id="hiddenBillNo" hidden>
                                <input type="text" name="flat_id[]" id="hiddenFlatId" hidden>
                                <input type="text" name="owner_name[]" id="hiddenOwnerName" hidden>
                                <input type="text" name="charge[]" id="hiddenCharge" hidden>
                                <input type="text" name="paid_amount[]" id="hiddenPaidAmount" hidden>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-file-alt"></i> Bill Pay
                                </button>
                            </form>

                        </div>
                    </div>
                @endif

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#dynamic-table').DataTable({
                "paging": false
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#year, #months, #block, #roadName, #plotID').select2();

            $('#block').change(function() {
                var block_id = $(this).val();

                $('#roadName').empty().append('<option value="">Select Road</option>');
                $('#plotID').empty().append('<option value="">Select Plot</option>');

                if (block_id) {
                    $.ajax({
                        url: '{{ url('/society/get-road-info-by-block') }}/' + block_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#roadName').empty().append(
                                '<option value="">Select Road</option>');
                            $.each(data, function(key, value) {
                                $('#roadName').append('<option value="' + value
                                    .road_id + '">' + value.road.roadName +
                                    '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                        }
                    });
                }
            });

            $('#roadName').change(function() {
                var road_id = $(this).val();

                $('#plotID').empty().append('<option value="">Select Plot</option>');

                if (road_id) {
                    $.ajax({
                        url: '{{ url('/society/get-plot-info-by-road') }}/' + road_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#plotID').empty().append(
                                '<option value="">Select Plot</option>');
                            $.each(data, function(key, value) {
                                $('#plotID').append('<option value="' + value.plot_id +
                                    '">' + value.plotName + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).on('change', '#ownerName', function() {
            const ownerName = $(this).val();

            if (ownerName) {
                $.ajax({
                    url: "{{ route('get.dynamic.data') }}",
                    type: "POST",
                    data: {
                        ownerName: ownerName,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#block').empty().append('<option value="">Select Block</option>');
                        $('#road').empty().append('<option value="">Select Road</option>');
                        $('#plot').empty().append('<option value="">Select Plot</option>');

                        if (response.blocks) {
                            response.blocks.forEach(function(block) {
                                $('#block').append(
                                    `<option value="${block.getblock.id}">${block.getblock.blockName}</option>`
                                );
                            });
                        }

                        if (response.roads) {
                            response.roads.forEach(function(road) {
                                if (road) {
                                    $('#road').append(
                                        `<option value="${road.id}">${road.roadName}</option>`
                                    );
                                }
                            });
                        }

                        if (response.plots) {
                            response.plots.forEach(function(plot) {
                                if (plot) {
                                    $('#plot').append(
                                        `<option value="${plot.id}">${plot.plotName}</option>`
                                    );
                                }
                            });
                        }
                    },
                    error: function() {
                        alert('Error fetching data. Please try again.');
                    }
                });
            }

        });
    </script>

    <script>
        document.querySelectorAll('.bill-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var billId = this.getAttribute('data-id');
                var amountField = document.getElementById('amount' + billId);
                var billAmount = this.getAttribute('data-charge');

                if (this.checked) {
                    amountField.value = billAmount;
                } else {
                    amountField.value = '0';
                }
            });
        });
    </script>

    <script>
        function checkAmount(input, checkboxId, cpServiceCharge, billId) {
            const checkbox = document.getElementById(checkboxId);
            const errorElement = document.getElementById('error' + billId);
            const advanceField = document.getElementById('advance' + billId);

            const enteredAmount = parseFloat(input.value) || 0;
            const advanceAmount = parseFloat(advanceField.innerText) || 0;

            // Conditions for enabling the checkbox
            const isAmountSufficient = enteredAmount >= cpServiceCharge;
            const isCombinedSufficient = (enteredAmount + advanceAmount) >= cpServiceCharge;
            const isAdvanceSufficient = advanceAmount >= cpServiceCharge;
            const isMultipleOfCharge = enteredAmount % cpServiceCharge === 0;

            if ((isAmountSufficient || isCombinedSufficient || isAdvanceSufficient) && isMultipleOfCharge) {
                checkbox.disabled = false;
                checkbox.checked = true;
                errorElement.style.display = 'none';
            } else {
                checkbox.disabled = true;
                checkbox.checked = false;
                errorElement.style.display = 'block';

                if (enteredAmount % cpServiceCharge !== 0) {
                    errorElement.innerText = `Entered amount must be a multiple of ${cpServiceCharge}.`;
                } else if (enteredAmount < cpServiceCharge && advanceAmount < cpServiceCharge) {
                    errorElement.innerText =
                        `Entered amount and available advance are insufficient. Minimum required is ${cpServiceCharge}.`;
                } else if (enteredAmount < cpServiceCharge) {
                    errorElement.innerText = `Entered amount is less than the required minimum of ${cpServiceCharge}.`;
                } else {
                    errorElement.innerText =
                        `Combined amount (entered + advance) is insufficient. Minimum required is ${cpServiceCharge}.`;
                }
            }
        }

        // Run checkAmount on page load for each amount input
        window.addEventListener('load', function() {
            document.querySelectorAll('.amount-input').forEach(input => {
                const billId = input.dataset.billId;
                const cpServiceCharge = parseFloat(input.dataset.cpServiceCharge);
                checkAmount(input, 'check' + billId, cpServiceCharge, billId);
            });
        });
    </script>



    <script>
        function updateHiddenFields(checkbox) {
            const billNoField = document.getElementById('hiddenBillNo');
            const flatIdField = document.getElementById('hiddenFlatId');
            const ownerNameField = document.getElementById('hiddenOwnerName');
            const chargeField = document.getElementById('hiddenCharge');
            const paidAmountField = document.getElementById('hiddenPaidAmount');

            // Parse current values, filtering out any empty entries
            let currentBillNos = billNoField.value.split(',').filter(Boolean);
            let currentFlatIds = flatIdField.value.split(',').filter(Boolean);
            let currentOwnerNames = ownerNameField.value.split(',').filter(Boolean);
            let currentCharges = chargeField.value.split(',').filter(Boolean);
            let currentPaidAmounts = paidAmountField.value.split(',').filter(Boolean);

            const billNo = checkbox.getAttribute('data-bill-no');
            const flatId = checkbox.getAttribute('data-flat-id');
            const ownerName = checkbox.getAttribute('data-owner-name');
            const charge = checkbox.getAttribute('data-charge');
            const amount = document.getElementById('amount' + checkbox.getAttribute('data-id')).value;

            if (checkbox.checked) {
                // Add values to the arrays if the checkbox is checked
                currentBillNos.push(billNo);
                currentFlatIds.push(flatId);
                currentOwnerNames.push(ownerName);
                currentCharges.push(charge);
                currentPaidAmounts.push(amount);
            } else {
                // Remove values if the checkbox is unchecked
                currentBillNos = currentBillNos.filter(item => item !== billNo);
                currentFlatIds = currentFlatIds.filter(item => item !== flatId);
                currentOwnerNames = currentOwnerNames.filter(item => item !== ownerName);
                currentCharges = currentCharges.filter(item => item !== charge);
                currentPaidAmounts = currentPaidAmounts.filter(item => item !== amount);
            }

            // Update hidden fields with new values
            billNoField.value = currentBillNos.join(',');
            flatIdField.value = currentFlatIds.join(',');
            ownerNameField.value = currentOwnerNames.join(',');
            chargeField.value = currentCharges.join(',');
            paidAmountField.value = currentPaidAmounts.join(',');
        }
    </script>



    <script>
        document.getElementById("paymentForm").addEventListener("submit", function(event) {
            document.querySelectorAll('.bill-checkbox:checked').forEach(checkbox => {
                updateHiddenFields(checkbox);
            });
        });
    </script>

@stop
