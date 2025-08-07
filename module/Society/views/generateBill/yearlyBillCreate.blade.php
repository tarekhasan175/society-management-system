@extends('layouts.master')
@section('title', 'Generate Monthly Bill')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
@stop

<style>
    /* Your custom styles remain unchanged */
</style>

@section('content')

    <form action="{{ route('generateBill.yearlyStore') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
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
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Generate Yearly Bill</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">

                    <!-- Year Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="year">Year<span style="color: red;">*</span></label>
                            <select id="year" name="year_id" class="form-control" required>
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Block Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="block">Block<span style="color: red;">*</span></label>
                            <select id="block" name="block_id" class="form-control">
                                <option value="" disabled selected>Select Block</option>
                                @foreach ($bloks as $blok)
                                    <option value="{{ $blok->id }}">{{ $blok->blockName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Road Dropdown -->
                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group">
                            <label for="roadName">Road<span style="color: red;">*</span></label>
                            <select id="roadName" name="road[]" class="form-control select2" multiple="multiple">
                                <option value="">Select Road</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:15px; padding-right:40px;">
                        <div class="form-group" style="padding-top: 25px;">
                            <button type="submit" class="btn btn-sm btn-info">Generate</button>
                        </div>
                    </div>
                </div>
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
                                <th>Block</th>
                                <th>Road</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generateBillsUnique as $bill)
                                @if ($bill->month == '')
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bill->Assignyear->year ?? '' }}</td>
                                        <td>{{ $bill->AssignBlock->blockName ?? '' }}</td>
                                        <td>{{ $bill->AssignRoad->roadName ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('generateBill.yearlyBill', $bill->billingID) }}"
                                                style="display: inline-block; margin-right: 10px;" target="_blank">
                                                <i class="fa fa-list"></i>
                                            </a>
                                            <a href="{{ route('generateBill.yearlyPdf', $bill->billingID) }}"
                                                style="display: inline-block; margin-right: 10px;" target="_blank">
                                                <i class="fa fa-receipt"></i>
                                            </a>

                                            <form id="delete-form-{{ $bill->id }}"
                                                action="{{ route('generateBill.delete', $bill->id) }}"
                                                method="POST" style="display: inline-block;">
                                              @csrf
                                              <a href="javascript:void(0)"
                                                 onclick="confirmDelete({{ $bill->id }});">
                                                  <i style="color: red;" class="fa fa-trash"></i>
                                              </a>
                                          </form>
                                            {{-- <form id="delete-form-{{ $bill->id }}"
                                                action="{{ route('generateBill.delete', $bill->id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                <a href="javascript:void(0)"
                                                    onclick="document.getElementById('delete-form-{{ $bill->id }}').submit();">
                                                    <i style="color: red;" class="fa fa-trash"></i>
                                                </a>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endif
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

    <script>

function confirmDelete(billId) {
         if (confirm("Are you sure you want to delete this bill?")) {
             document.getElementById('delete-form-' + billId).submit();
        }
     }



        $(document).ready(function() {
            $('#block').change(function() {
                var blockName = $(this).val();

                $.ajax({
                    url: '{{ url('/society/getRoadInfoByBlock') }}/' + blockName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#roadName').empty();
                        $.each(data, function(key, value) {
                            $('#roadName').append('<option value="' + value.road.id +
                                '">' + value.road.roadName + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
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
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#year').select2({
                width: '100%',
                placeholder: 'Select Year',
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
        });

        $('#dynamic-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    </script>
@stop
