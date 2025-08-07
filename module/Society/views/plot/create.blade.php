@extends('layouts.master')
@section('title', 'Plot')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('plot.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-6">
            <div class="widget-box">

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

                @if (session('failed'))
                    <div class="alert alert-danger" id="error-alert">{{ session('failed') }}</div>
                @endif

                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Plot Information</h4>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" style="margin-top: 15px;  margin-left: 20px;">

                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="block">Block<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div class="">
                                <select id="block_id" name="block_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Block</option>
                                    @foreach ($block as $bloc)
                                        <option value="{{ $bloc->id }}">{{ $bloc->blockName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="roadName">Road<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div class="">
                                <select id="roadName" name="road_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">First Select Block</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Plot<span style="color: red; margin-left: 5px; font-size: 12px;">
                                    *</span></label>
                            <div class="">
                                <input type="text" name="plotName" id="form-field-2" placeholder="Plot / House"
                                    class="col-xs-11 col-sm-11 col-md-11" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="margin-right: 15px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">
                                Plot Owner<span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <div id="owner-fields" class="d-flex align-items-center">
                                <input type="text" name="ownername[]" placeholder="Plot Owner Name"
                                    class="col-xs-10 col-sm-10 col-md-10">
                                <button type="button" id="add-field" class="btn btn-sm btn-primary">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <div id="owner-fields" class="d-flex align-items-center" style="padding-top:28px;">
                                <button type="submit" class="btn btn-sm btn-info">Save</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="row" style="margin: 3px;">
                <div class="col-xs-12 table-responsive">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">PlotID</th>
                                <th class="text-center">Block</th>
                                <th class="text-center">Road</th>
                                <th class="text-center">Plot</th>
                                <th class="text-center">Owner Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plotInfos as $plot)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $plot->plotID ?? '' }}</td>
                                    <td class="text-center">{{ $plot->block->blockName ?? '' }}</td>
                                    <td class="text-center">{{ $plot->road->roadName ?? '' }}</td>
                                    <td class="text-center">{{ $plot->plotName ?? '' }}</td>
                                    <td class="text-left">
                                        @php
                                            $ownerNamesArray = array_filter(explode(',', $plot->ownername ?? ''));
                                        @endphp

                                        @if (!empty($ownerNamesArray))
                                            @foreach ($ownerNamesArray as $index => $owner)
                                                {{ $index + 1 }}. {{ trim($owner) }} <br>
                                            @endforeach
                                        @else
                                            <p>No owners available.</p>
                                        @endif
                                    </td>
                                    {{-- <td class="text-center">{{ $plot->remarks ?? '' }}</td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('plot.edit', $plot->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $plot->id }}"
                                            action="{{ route('plot.delete', $plot->id) }}" method="POST"
                                            style="display: inline-block;">
                                          @csrf
                                          <a href="javascript:void(0)"
                                             onclick="if(confirm('Are you sure you want to delete this Plot?')) { document.getElementById('delete-form-{{ $plot->id }}').submit(); }">
                                              <i style="color: red;" class="fa fa-trash"></i>
                                          </a>
                                      </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="display: flex; justify-content:right;">
                        @isset($plotInfos)
                            {{ $plotInfos->links('custom') }}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
       $(document).ready(function() {
    $('#block_id').change(function() {
        var blockId = $(this).val();



        if (blockId) {
            $.ajax({
                url: '{{ url('/society/getRoadsByplot') }}/' + blockId,
                type: "GET",
                dataType: "json",
                success: function(data) {





                    $('#roadName').empty().append('<option value="">Select Road</option>'); // Clear previous options
                    $.each(data, function(key, value) {
                        $('#roadName').append('<option value="' + value.id + '">' + value.roadName + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching roads:", error);
                }
            });
        } else {
             $('#roadName').empty().append('<option value="">Select Road</option>');
        }
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


    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#dynamic-table').DataTable({
                "paging": false // This hides pagination
            });
        });
    </script>

    <script>
        window.onload = function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000);
            }
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 3000);
            }
        };
    </script>



    {{-- Add multiple owner  --}}
    <script>
        document.getElementById('add-field').addEventListener('click', function() {
            // Create a new div to hold the input field and button
            var newDiv = document.createElement('div');
            newDiv.classList.add('owner-input', 'd-flex', 'align-items-center', 'mt-2');

            // Create a new input field
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'ownername[]';
            newInput.placeholder = 'Plot Owner Name';
            newInput.classList.add('col-xs-10', 'col-sm-10', 'col-md-10');

            // Add the input field to the new div
            newDiv.appendChild(newInput);

            // Create a remove button for additional input fields
            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-sm', 'btn-danger');
            removeButton.innerText = '-';

            // Remove the input field on click of the button
            removeButton.addEventListener('click', function() {
                newDiv.remove();
            });

            // Add the remove button to the new div
            newDiv.appendChild(removeButton);

            // Append the new div to the container of owner fields
            document.getElementById('owner-fields').appendChild(newDiv);
        });
    </script>


@endsection
