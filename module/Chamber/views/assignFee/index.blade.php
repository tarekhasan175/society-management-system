@extends('layouts.master')
@section('title', 'All Member')
@section('css')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}
@stop


@section('content')
    <h6>Assign Member Fee:</h6>
    <form action="{{ route('assignfees.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="col-12 col-md-12 col-xs-6">
            <div class="widget-box">
                <div class="row justify-content-center" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        {{-- year dropdown --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="year-select">Year:</label>
                            <div class="col-sm-5">
                                <select type="text" id="year_id" name="year_id" class="col-xs-11 col-sm-11 col-md-11">
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->id }}">{{ $session->sessionName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        {{-- member category dropdown --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="category-select">Member
                                Category:</label>
                            <div class="col-sm-5">
                                <select type="text" id="category-select" name="membercategory_id"
                                    class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="">Member Category</option>
                                    @foreach ($memberCategories as $memberCategory)
                                        <option value="{{ $memberCategory->id }}">{{ $memberCategory->memberCategoryName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="row" style="margin: 3px;">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="col-xs-12">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Select</th>
                                    <th>Payment Head</th>
                                    <th>Last Payment Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentHeads as $paymentHead)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="is-old-checkbox"
                                                        id="{{ $paymentHead->id }}" name="select[]" value="1">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="hidden" name="paymenthead_id[]" value="{{ $paymentHead->id }}">
                                            {{ $paymentHead->PaymentHeadName }}
                                        </td>
                                        <td><input id="LastPaymentDate" name="LastPaymentDate[]" type="text"
                                                placeholder="dd/mm/yyyy"></td>
                                        <td><input id="Amount" name="Amount[]" type="text"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-2 col-12">
                            <div class="form-group text-center">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-info">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


    {{-- <script>
        $(document).ready(function() {
            $('#year_id, #category-select').change(function() {
                var yearId = $('#year_id').val().toString();
                var categoryId = $('#category-select').val().toString();

                $.ajax({
                    url: "{{ route('check-assignments') }}",
                    type: 'GET',
                    data: {
                        year_id: yearId,
                        member_category_id: categoryId
                    },
                    success: function(data) {
                        $(".is-old-checkbox").each(function() {
                            let id = $(this).attr("id");
                            let checked = data.assignments.includes(id);
                            $(this).prop("checked", checked);
                        });

                        // Iterate over each assign_fee_data element
                        $.each(data.assign_fee_data, function(index, element) {
                            const row = $("#" + element.id).closest(
                            'tr'); // Find the closest row based on the ID
                            row.find("#Amount").val(element
                            .Amount); // Set the value of the Amount input field
                            row.find("#LastPaymentDate").val(element
                            .LastPaymentDate); // Set the value of the LastPaymentDate input field
                        });
                    }
                });
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#year_id, #category-select').change(function() {
                var yearId = $('#year_id').val().toString();
                var categoryId = $('#category-select').val().toString();

                $.ajax({
                    url: "{{ route('check-assignments') }}",
                    type: 'GET',
                    data: {
                        year_id: yearId,
                        member_category_id: categoryId
                    },
                    success: function(data) {
                        $(".is-old-checkbox").each(function() {
                            let id = $(this).attr("id").toString();
                            let checked = data.assignments.includes(id);
                            $(this).prop("checked", checked);
                        });

                        // Iterate over each assign_fee_data element
                        $.each(data.assign_fee_data, function(index, element) {
                            const row = $("#" + element.id).closest(
                                'tr'); // Find the closest row based on the ID
                            row.find("#Amount").val(element.Amount
                                .toString()); // Convert to string before setting value
                            row.find("#LastPaymentDate").val(element.LastPaymentDate
                                .toString()); // Convert to string before setting value
                        });
                    }
                });
            });
        });
    </script>

    {{-- <script>
    $(document).ready(function() {
        $('#dynamic-table').DataTable();
    });
</script>
<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#dynamic-table').DataTable();
    });
</script> --}}

@endsection
