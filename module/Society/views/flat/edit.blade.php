@extends('layouts.master')
@section('title', 'Flat')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('flat.update', $flat->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger" id="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
        @endif

        <div class="col-12 col-md-12 col-xs-6">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-3 col-6 col-xs-6">
                            <h4 class="widget-title">Edit Flat Information</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="block">Block<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
                                <select id="block_id" name="block_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select a Block</option>
                                    @foreach ($block as $bloc)
                                        <option value="{{ $bloc->id }}"
                                            {{ $bloc->id == $flat->block_id ? 'selected' : '' }}>
                                            {{ $bloc->blockName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="road">Road<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
                                <select id="road_id" name="road_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value=" ">Select a Road</option>
                                    @foreach ($roads as $road)
                                        <option value="{{ $road->id }}"
                                            {{ $road->id == $flat->road_id ? 'selected' : '' }}>
                                            {{ $road->roadName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="plotName">Plot<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
                                <select id="plot_id" name="plot_id" onchange="getSelectedValues()"
                                    class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select a Plot</option>
                                    @foreach ($plots as $plot)
                                        <option value="{{ $plot->id }}"
                                            {{ $plot->id == $flat->plot_id ? 'selected' : '' }}>
                                            {{ $plot->plotName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="ownerName">Plot Owner<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                            <div>
                                <!-- Input field for Plot Owner -->
                                <input type="text" name="plotOwner" id="ownername" placeholder="Plot Owner"
                                    class="col-xs-11 col-sm-11 col-md-11" value="{{ $flat->plotOwner }}" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="houseOrBuildingId">House/Building<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
                                <select id="house_Building_id" name="house_Building_id"
                                    class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select a House/Building</option>

                                    @foreach ($houseOrBuildingsId as $houseOrBuilding)
                                        <option value="{{ $houseOrBuilding->id }}"
                                            {{ $houseOrBuilding->id == $flat->house_Building_id ? 'selected' : '' }}>
                                            {{ $houseOrBuilding->houseOrBuildingName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="storey">Storey<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                            <div class="">
                                <input type="text" name="storey" id="storey" placeholder="Storey"
                                    class="col-xs-11 col-sm-11 col-md-11" value="{{ $flat->storey }}" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="totalFlat">Total Unit/Flats<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                            <div class="">
                                <input type="text" name="totalUnit" id="totalFlat" placeholder="Total Unit"
                                    class="col-xs-11 col-sm-11 col-md-11" value="{{ $flat->totalUnit }}" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Unit Name<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>

                            <div class="">
                                <input type="text" name="unitName" id="form-field-2" value="{{ $flat->unitName }}"
                                    class="col-xs-11 col-sm-11 col-md-11" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Owner Name<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>

                            <div class="">
                                <input type="text" name="ownerName" id="form-field-2" value="{{ $flat->ownerName }}"
                                    class="col-xs-11 col-sm-11 col-md-11" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Owner Contact No 1:<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="ownerContactNo1" id="form-field-2"
                                    value="{{ $flat->ownerContactNo1 }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Owner Contact No 2:<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="ownerContactNo2" id="form-field-2"
                                    value="{{ $flat->ownerContactNo2 }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Owner Email<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="ownerMailAddress" id="form-field-2"
                                    value="{{ $flat->ownerMailAddress }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Owner Present Address<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="ownerPresentAddress" id="form-field-2"
                                    value="{{ $flat->ownerPresentAddress }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Tenant Name<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="tenantName" id="form-field-2"
                                    value="{{ $flat->tenantName }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Tenant Contact Number<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="tenantContactNo" id="form-field-2"
                                    value="{{ $flat->tenantContactNo }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Tenant Present Address<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="tenantParmanentAddress" id="form-field-2"
                                    value="{{ $flat->tenantParmanentAddress }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Usages Type<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div class="">
                                <select id="usageType" name="usage_type_id" class="col-xs-11 col-sm-11 col-md-11"
                                    required>
                                    <option value="">Select a Usage Type</option>
                                    @foreach ($usageTypes as $type)
                                        <option
                                            value="{{ $type->id }}"{{ $type->id == $flat->usage_type_id ? 'selected' : '' }}>
                                            {{ $type->typeName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="amount">Amount<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="amount" id="amount" placeholder="Remarks"
                                    class="col-xs-11 col-sm-11 col-md-11" value="{{ $flat->amount }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="payable_amount">Payable Amount</label>

                            <div class="">
                                <input type="text" name="payable_amount" id="payable_amount" placeholder=""
                                    class="col-xs-11 col-sm-11 col-md-11" value="{{ $flat->payable_amount }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-field-2">Society Member Id<span
                                    style="color: red; margin-left: 5px; font-size: 12px;"></span></label>

                            <div class="">
                                <input type="text" name="societyMemberId" id="form-field-2"
                                    value="{{ $flat->societyMemberId }}" class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>

                </div>
                <hr>


                {{-- @foreach ($dueEdits as $dueEdit)
                    <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
                        <div id="due-fields" class="d-flex align-items-center flex-wrap">
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="control-label no-padding-right" for="form-field-2">Previous Due<span
                                            style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                                    <div class="">
                                        <input type="number" name="monthlyDue[]" value="{{@$dueEdit->monthlyDue}}" placeholder="Previous Due"
                                            class="col-xs-11 col-sm-11 col-md-11">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="control-label no-padding-right" for="form-field-month">Month<span
                                            style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                                    <select name="month[]" class="col-xs-11 col-sm-11 col-md-11">
                                        <option value="" disabled selected>Select Month</option>
                                        @if (!empty($months))
                                            @foreach ($months as $month)
                                                <option value="{{ $month->name }}" {{ $month->name == $dueEdit->month ? 'selected' : ''  }}>{{ $month->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="control-label no-padding-right" for="form-field-year">Year<span
                                            style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                                    <select name="year[]" class="col-xs-11 col-sm-11 col-md-11">
                                        <option value="" disabled selected>Select Year</option>
                                        @if (!empty($years))
                                            @foreach ($years as $year)
                                                <option value="{{ $year->year }}" {{ $year->year == $dueEdit->year ? 'selected' : ''  }}>{{ $year->year }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button type="button" id="add-due-field" class="btn btn-sm btn-primary"
                                style="margin-left: -12px; margin-top:28px; height:30px;">+</button>
                        </div>
                    </div>
                    @endforeach --}}
                <button type="button" id="add-due-field" class="btn btn-sm btn-primary"
                    style="margin-left: 12px; margin-top:28px; height:30px;">Create Due </button>

                <div id="due-fields-container">
                    @foreach ($dueEdits as $dueEdit)
                        <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
                            <div id="due-fields" class="d-flex align-items-center flex-wrap">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right" for="form-field-2">Previous Due
                                            <span style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                                        <div class="">
                                            <input type="number" name="monthlyDue[]"
                                                value="{{ @$dueEdit->monthlyDue }}" placeholder="Previous Due"
                                                class="col-xs-11 col-sm-11 col-md-11">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="dueID[]" value="{{ @$dueEdit->id }}"
                                    placeholder="Previous Due" class="col-xs-11 col-sm-11 col-md-11">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right" for="form-field-month">Month<span
                                                style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                                        <select name="month[]" class="col-xs-11 col-sm-11 col-md-11">
                                            <option value="" disabled selected>Select Month</option>
                                            @foreach ($months as $month)
                                                <option value="{{ $month->id }}"
                                                    {{ $month->id == $dueEdit->month_id ? 'selected' : '' }}>
                                                    {{ $month->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right" for="form-field-year">Year<span
                                                style="color: red; margin-left: 5px; font-size: 12px;"></span></label>
                                        <select name="year[]" class="col-xs-11 col-sm-11 col-md-11">
                                            <option value="" disabled selected>Select Year</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}"
                                                    {{ $year->id == $dueEdit->year_id ? 'selected' : '' }}>
                                                    {{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="button" id="add-due-field" class="btn btn-sm btn-primary"
                                    style="margin-left: -12px; margin-top:28px; height:30px;">+</button>

                                <button type="button" class="btn btn-sm btn-danger remove-due-field"
                                    style="margin-left: 5px; margin-top:28px; height:30px;">-</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="new-due-fields"></div>


                <div class="form-group text-right" style="margin-right: 25px;">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                    </div>
                </div>

            </div>

        </div>


    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


    {{-- Filters  --}}
    <script>
        // Prepare options as JavaScript arrays
        // Prepare options as JavaScript arrays
        // const months = {!! json_encode($months->pluck('name')) !!};
        // const years = {!! json_encode($years->pluck('year')) !!};

        const months = {!! json_encode($months->map(fn($month) => ['id' => $month->id, 'name' => $month->name])) !!};
        const years = {!! json_encode($years->map(fn($year) => ['id' => $year->id, 'year' => $year->year])) !!};

        // Function to add new due fields
        document.getElementById('add-due-field').addEventListener('click', function() {
            const newDiv = document.createElement('div');
            newDiv.classList.add('d-flex', 'align-items-center', 'mt-2');

            const newDueInput = document.createElement('input');
            newDueInput.type = 'number';
            newDueInput.name = 'monthlyDue[]';
            newDueInput.placeholder = 'Previous Due #' + (document.querySelectorAll('[name="monthlyDue[]"]')
                .length + 1);
            newDueInput.classList.add('col-md-12');

            const dueCol = document.createElement('div');
            dueCol.classList.add('col-md-3', 'col-12');
            dueCol.appendChild(newDueInput);

            const newMonthSelect = document.createElement('select');
            newMonthSelect.name = 'month[]';
            newMonthSelect.classList.add('col-md-12');

            let monthOptions = '<option value="" disabled selected>Select Month</option>';
            months.forEach(month => {
                monthOptions += `<option value="${month.id}">${month.name}</option>`;
            });
            // console.log(monthOptions);


            newMonthSelect.innerHTML = monthOptions;

            const monthCol = document.createElement('div');
            monthCol.classList.add('col-md-3', 'col-12');
            monthCol.appendChild(newMonthSelect);

            const newYearSelect = document.createElement('select');
            newYearSelect.name = 'year[]';
            newYearSelect.classList.add('col-md-12');

            let yearOptions = '<option value="" disabled selected>Select Year</option>';
            years.forEach(year => {
                yearOptions += `<option value="${year.id}">${year.year}</option>`;
            });
            newYearSelect.innerHTML = yearOptions;

            const yearCol = document.createElement('div');
            yearCol.classList.add('col-md-3', 'col-12');
            yearCol.appendChild(newYearSelect);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-sm', 'btn-danger');
            removeButton.innerText = '-';
            removeButton.style.height = '30px';
            removeButton.addEventListener('click', function() {
                newDiv.remove();
            });

            newDiv.appendChild(dueCol);
            newDiv.appendChild(monthCol);
            newDiv.appendChild(yearCol);
            newDiv.appendChild(removeButton);

            document.getElementById('new-due-fields').appendChild(newDiv);
        });

        document.querySelectorAll('.remove-due-field').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.row').remove();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#block_id').change(function() {
                var block = $(this).val();


                $('#road_id').empty().append('<option value="">Select a Road</option>');
                $('#plot_id').empty().append('<option value="">Select a Plot</option>');
                $('#house_Building_id').empty().append('<option value="">Select a House/Building</option>');
                if (block) {
                    $.ajax({
                        url: '/society/get-road-for-flat/' + block,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            if (data.length > 0) {
                                $.each(data, function(index, value) {
                                    $('#road_id').append('<option value="' + value.road
                                        .id +
                                        '">' + value.road.roadName + '</option>');
                                });
                            } else {
                                alert('No roads found for this block.');
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 404) {
                                alert('No roads found for this block.');
                            } else {
                                console.error(xhr.responseText);
                            }
                        }
                    });
                }
            });

            $('#road_id').change(function() {
                var road = $(this).val();
                $('#plot_id').empty().append('<option value="">Select a Plot</option>');
                $('#house_Building_id').empty().append('<option value="">Select a House/Building</option>');
                if (road) {
                    $.ajax({
                        url: '/society/get-plot-for-flat/' + road,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data.length > 0) {
                                $.each(data, function(index, value) {
                                    $('#plot_id').append('<option value="' + value
                                        .plot.id + '">' + value.plot.plotName +
                                        '</option>');
                                });
                            } else {
                                alert('No plots found for this road.');
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 404) {
                                alert('No plots found for this road.');
                            } else {
                                console.error(xhr.responseText);
                            }
                        }
                    });
                }
            });

            $('#plot_id').change(function() {
                var plotName = $(this).val();


                $('#house_Building_id').empty().append('<option value="">Select a House/Building</option>');
                if (plotName) {
                    $.ajax({
                        url: '/society/get-flats-for-flat/' + plotName,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data.length > 0) {
                                $.each(data, function(index, value) {
                                    $('#house_Building_id').append('<option value="' +
                                        value.id + '">' + value
                                        .houseOrBuildingName + '</option>');
                                });
                            } else {
                                alert('No houses/buildings found for this plot.');
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 404) {
                                alert('No houses/buildings found for this plot.');
                            } else {
                                console.error(xhr.responseText);
                            }
                        }
                    });
                }
            });

            $('#house_Building_id').change(function() {
                var houseOrBuildingId = $(this).val();

                if (houseOrBuildingId) {
                    $.ajax({
                        url: '/society/get-owner-for-flat/' + houseOrBuildingId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data.length > 0) {
                                $('#ownerName').val(data[0].ownername);
                                $('#storey').val(data[0].storey);
                                $('#totalFlat').val(data[0].totalFlat);
                                $('#remarks').val(data[0].houseStatus);
                            } else {
                                $('#ownerName').val('');
                                $('#storey').val('');
                                $('#totalFlat').val('');
                                $('#remarks').val('');
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 404) {
                                alert('No owner found for this house/building.');
                            } else {
                                console.error(xhr.responseText);
                            }
                        }
                    });
                }
            });
        });
    </script>


    {{-- get plot owner name --}}
    <script>
        function getSelectedValues() {
            var block = document.getElementById('block_id').value;
            var road = document.getElementById('road_id').value;
            var plotName = document.getElementById('plot_id').value;

            var data = {
                block: block,
                road: road,
                plotName: plotName
            };

            $.ajax({
                url: '/society/get-owner-name',
                type: 'GET',
                data: data,
                success: function(response) {

                    // Update the input field with the owner name
                    var ownerNameInput = document.getElementById('ownername');
                    ownerNameInput.value = response.ownername; // Set the value
                    ownerNameInput.disabled = response.ownername ? true : false; // Disable if there's an owner
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>

    <script>
        $('#usageType').change(function() {
            var typeName = $(this).val();
            $.ajax({
                url: '/society/getAmountByType/' +
                    typeName, // Adjusted for demonstration; use {{ url('/society/getAmountByType') }} for Blade
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#amount').val(data[0].amount);
                    } else {
                        $('#amount').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>


@endsection
