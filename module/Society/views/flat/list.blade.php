@extends('layouts.master')
@section('title', 'Flat')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">

            @if ($errors->any())
                <div class="alert alert-danger" id="error-alert" style="margin-bottom: 30px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" id="success-alert" style="margin-bottom: 30px;">{{ session('success') }}</div>
            @endif

            @if (session('failed'))
                <div class="alert alert-danger" id="error-alert">{{ session('failed') }}</div>
            @endif
            <div class="widget-header">
                <div class="row">

                    <div class="col-md-6 col-6 col-xs-6 py-1">
                        <h4 class="widget-title">Flat Information</h4>

                        <a href="{{ route('flat.list') }}" class="btn btn-sm btn-secondary"
                            style="display: inline; border-radius: 50%;">
                            <i class="fas fa-sync-alt"></i>
                        </a>

                    </div>

                    <div class="col-md-6 col-6 col-xs-6 text-right"
                        style="padding-top: 5px; padding-right:18px; padding-bottom: 5px;">

                        <!-- Dropdown for Download CSV -->
                        <div class="dropdown" style="display: inline-block; margin-right: 10px;">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="downloadDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Download Flat Information
                            </button>
                            <div class="dropdown-menu" aria-labelledby="downloadDropdown"
                                style="min-width: 200px; padding: 10px 0; border-radius: 0.25rem;">
                                {{-- <a class="dropdown-item" href="{{ route('download.sample.csv') }}"
                                    style="padding: 10px 20px; display: flex; align-items: center;">
                                    <i class="fas fa-file-download" style="margin-right: 5px;"></i> Sample CSV file
                                </a> --}}
                                {{-- <a class="dropdown-item" href="{{ route('download.csv') }}"
                                    style="padding: 10px 20px; display: flex; align-items: center;">
                                    <i class="fas fa-file-csv" style="margin-right: 5px;"></i> Download CSV
                                </a> --}}
                                <a class="dropdown-item" href="{{ route('flats.export.csv', request()->all()) }}"
                                    style="padding: 10px 20px; display: flex; align-items: center;">
                                    <i class="fas fa-file-csv" style="margin-right: 5px;"></i> Download CSV
                                </a>
                                <a class="dropdown-item" href="{{ route('flats.export.excel', request()->all()) }}"
                                    style="padding: 10px 20px; display: flex; align-items: center;">
                                    <i class="fas fa-file-excel" style="margin-right: 5px;"></i> Download Excel
                                </a>
                            </div>
                        </div>

                        <!-- Button trigger modal for uploading CSV -->
                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#uploadModal">Upload Flat Information</a>

                        <!-- Modal for Uploading CSV -->
                        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-left" id="uploadModalLabel">Upload CSV/Excel File</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <form id="csvUploadForm" action="{{ route('upload.csv') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="csvFile">Select File</label>
                                                <input type="file" class="form-control" id="csvFile" name="csv_file"
                                                    accept=".csv" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" form="csvUploadForm" id="booking-btn"
                                            class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px; margin-bottom:20px;">

                <form action="{{ route('filter.flat') }}" method="GET" id="filterForm">

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">Block<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
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
                            <label class="control-label no-padding-right" for="form-field-2">Road<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
                                {{-- <select id="road" name="road" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Road</option>
                                </select> --}}
                                <select id="road" name="road" class="col-xs-11 col-sm-11 col-md-11" required
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
                            <label class="control-label no-padding-right" for="form-field-2">Plot<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
                                {{-- <select id="plot" name="plot" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Plot</option>
                                </select> --}}
                                <select id="plot" name="plot" class="col-xs-11 col-sm-11 col-md-11" required
                                    onchange="submitForm()">
                                    <option value="">Select Plot</option>
                                    @if (isset($plots))
                                        @foreach ($plots as $plot)
                                            <option value="{{ $plot->id }}"
                                                {{ request('plot') == $plot->id ? 'selected' : '' }}>
                                                {{ $plot->plotName }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">Flat<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <div>
                                {{-- <select id="flat" name="flat" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Flat</option>
                                </select> --}}

                                <select id="flat" name="flat" class="col-xs-11 col-sm-11 col-md-11" required
                                    onchange="submitForm()">
                                    <option value="">Select Flat</option>
                                    @if (isset($flats))
                                        @foreach ($flats as $flat)
                                            <option value="{{ $flat->id }}"
                                                {{ request('flat') == $flat->id ? 'selected' : '' }}>
                                                {{ $flat->flatName }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="form-field-2">Usage Type
                                {{-- <span style="color: red; margin-left: 5px; font-size: 12px;">*</span> --}}
                            </label>
                            <div>
                                {{-- <select id="road" name="road" class="col-xs-11 col-sm-11 col-md-11" required>
                                    <option value="">Select Road</option>
                                </select> --}}
                                <select id="usagetype" name="usagetype" class="col-xs-11 col-sm-11 col-md-11"
                                    onchange="submitForm()">
                                    <option value="">Select Usage Type</option>
                                    @if (isset($usagetypes))
                                        @foreach ($usagetypes as $usagetype)
                                            <option value="{{ $usagetype->id }}"
                                                {{ request('usagetype') == $usagetype->id ? 'selected' : '' }}>
                                                {{ $usagetype->typeName }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>


                </form>
            </div>



            <div class="row" style="margin: 3px;">
                <div class="col-xs-12">
                    <table id="" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Block</th>
                                <th class="text-center">Road</th>
                                <th class="text-center">Plot</th>
                                {{-- <th class="text-center">FlatID</th> --}}
                                <th class="text-center">Flat Name</th>
                                <th class="text-center">MemberID</th>
                                <th class="text-center">OwnerName</th>
                                <th class="text-center">OwnerContact</th>
                                {{-- <th class="text-center">Owner Mail</th> --}}
                                <th class="text-center">TanentName</th>
                                <th class="text-center">Tanent Contact</th>
                                <th class="text-center">Usage Type</th>
                                <th class="text-center">Total Due</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flats as $flat)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $flat->getblock->blockName ?? '' }}</td>
                                    <td class="text-center">{{ $flat->getroad->roadName ?? '' }}</td>
                                    <td class="text-center">{{ $flat->getplot->plotName ?? '' }}</td>
                                    {{-- <td class="text-center">{{ $flat->flatID ?? '' }}</td> --}}
                                    <td class="text-center">{{ $flat->flatName ?? '' }}</td>
                                    <td class="text-center">{{ $flat->societyMemberId ?? '' }}</td>
                                    <td class="text-center">{{ $flat->ownerName ?? '' }}</td>
                                    <td class="text-center">
                                        {{ $flat->ownerContactNo1 ?? '' }},<br>
                                        {{ $flat->ownerContactNo2 ?? '' }}
                                    </td>
                                    {{-- <td class="text-center">{{ $flat->ownerMailAddress ?? '' }}</td> --}}
                                    <td class="text-center">{{ $flat->tenantName ?? '' }}</td>
                                    <td class="text-center">{{ $flat->tenantContactNo ?? '' }}</td>
                                    <td class="text-center">{{ $flat->usagetype->typeName ?? '' }}</td>
                                    <td class="text-center">{{ $flat->totalDue ?? '' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('flat.edit', $flat->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        {{-- <form id="delete-form-{{ $flat->id }}"
                                            action="{{ route('flat.delete', $flat->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('delete-form-{{ $flat->id }}').submit();">
                                                <i style="color: red;" class="fa fa-trash"></i>
                                            </a>
                                        </form> --}}


                                        <form id="delete-form-{{ $flat->id }}"
                                            action="{{ route('flat.delete', $flat->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)"
                                                onclick="if(confirm('Are you sure you want to delete this Flat?')) { document.getElementById('delete-form-{{ $flat->id }}').submit(); }">
                                                <i style="color: red;" class="fa fa-trash"></i>
                                            </a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>

                    <div style="display: flex; justify-content:right;">
                        @isset($flats)
                            {{ $flats->links('custom') }}
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
            $('#block').select2();
            $('#road').select2();
            $('#plot').select2();
            $('#flat').select2();
        });
    </script>

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



    <script>
        document.getElementById('csvUploadForm').addEventListener('submit', function(e) {
            var button = document.getElementById('booking-btn');

            // Disable the button to prevent multiple clicks
            button.disabled = true;
            button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...'; // Change button text

        });
    </script>



@endsection
