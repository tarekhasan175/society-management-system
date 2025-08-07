@extends('layouts.master')
@section('title', 'Road')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('building.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <h4 class="widget-title">House/Building Information</h4>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" style="margin-top: 15px; margin-left: 20px; padding-right:15px;">
                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="block">Block<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select id="block_id" name="block_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                <option value="">Select Block</option>
                                @foreach ($blocks as $block)
                                    <option value="{{ $block->id }}"   >
                                        {{ $block->blockName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="road">Road<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select id="roadName" name="road_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                <option value="">Select Road</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="plot">Plot<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select id="plot" name="plot_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                <option value="">Select Plot</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="houseOrBuildingName">
                                House/Building<span style="color: red; margin-left: 5px; font-size: 12px;">*</span>
                            </label>
                            <input type="text" id="houseOrBuildingName" name="houseOrBuildingName"
                                class="col-xs-11 col-sm-11 col-md-11" required placeholder="Enter house/building name"
                                style="height: 30px;">
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="storey">Storey<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <input type="text" name="storey" id="storey" placeholder="Storey"
                                class="col-xs-11 col-sm-11 col-md-11" style="height: 30px;">
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="totalFlat">Total Unit/Flat<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <input type="text" name="totalFlat" id="totalFlat" placeholder="Total Unit"
                                class="col-xs-11 col-sm-11 col-md-11" style="height: 30px;">
                        </div>
                    </div>

                    {{-- <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="house-status">Usage Type<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select name="houseStatus" id="house-status" class="col-xs-11 col-sm-11 col-md-11"
                                style="height: 30px;">
                                <option value="">Select Status</option>
                                <option value="tin-shade">Tin Shade</option>
                                <option value="under-construction">Under Construction (UC)</option>
                                <option value="building">Completed Building</option>
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="house-status">Usage Type<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            {{-- <select name="houseStatus" id="house-status" class="col-xs-11 col-sm-11 col-md-11"
                                style="height: 30px;">
                                <option value="">Select Status</option>
                                <option value="tin-shade">Tin Shade</option>
                                <option value="under-construction">Under Construction (UC)</option>
                                <option value="building">Completed Building</option>
                                <option value="residential">Residential</option>
                                <option value="commercial">Commercial</option>
                                <option value="garments">Garments</option>
                                <option value="factory">Factory</option>
                                <option value="main-sponsor">Main Sponsor</option>
                                <option value="mini-sponsor">Mini Sponsor</option>
                            </select> --}}

                            <select id="usage_type_id" name="usage_type_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                <option value="">Select Block</option>
                                @foreach ($usage_type as $type)
                                    <option value="{{ $type->id }}"   >
                                        {{ $type->typeName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    {{-- <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="house-status">Usage Type<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select name="houseStatus" id="house-status" class="col-xs-11 col-sm-11 col-md-11" style="height: 30px;">
                                <option value="">Select Usage Type</option>
                                @foreach($usage_type as $usage)
                                    <option value="{{ $usage->id }}">{{ $usage->typeName }}</option>
                                    <!-- Displaying only 'typeName' -->
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="form-group text-right" style="padding-right: 15px;">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-info" style="height: 30px;">
                                Save
                            </button>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Block</th>
                                <th>Road</th>
                                <th>Plot</th>
                                <th>House/Building Name</th>
                                <th>Storey</th>
                                <th>Total Units/Flats</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($houses as $index => $house)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ @$house->block->blockName }}</td>
                                    <td>{{ @$house->road->roadName }}</td>
                                    <td>{{ @$house->plot->plotName }}</td>
                                    <td>{{ @$house->houseOrBuildingName }}</td>
                                    <td>{{ @$house->storey }}</td>
                                    <td>{{ @$house->totalFlat }}</td>
                                    <td>{{ @$house->usagestatus->typeName }}</td>
                                    <td>
                                        <a href="{{ route('building.edit', $house->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form id="delete-form-{{ $house->id }}"
                                            action="{{ route('building.destroy', $house->id) }}" method="POST"
                                            style="display: inline-block;">
                                          @csrf
                                          <a href="javascript:void(0)"
                                             onclick="if(confirm('Are you sure you want to delete this House/Building?')) { document.getElementById('delete-form-{{ $house->id }}').submit(); }">
                                              <i style="color: red;" class="fa fa-trash"></i>
                                          </a>
                                      </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="display: flex; justify-content:right;">
                        @isset($houses)
                            {{ $houses->links('custom') }}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#dynamic-table').DataTable({
                "paging": false // This hides pagination
            });
        });
    </script>

    <script>


        $(document).ready(function() {
            // Block to Road
            $('#block_id').change(function() {
                // Get selected block name
                var blockName = $(this).val();
                if (blockName) {
                    $.ajax({
                        url: '{{ url('society/get-road') }}/' + blockName,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#roadName').empty().append('<option value="">Select Road</option>');

                            $.each(data, function(key, value) {
                                $('#roadName').append('<option value="' + value.id +
                                    '">' + value.roadName + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching roads:', error);
                        }
                    });
                } else {

                    $('#road').empty().append('<option value="">Select Road</option>');

                }
            });

            // Road to Plot
            $('#roadName').change(function() {

                var roadName = $(this).val();

                if (roadName) {
                    $.ajax({
                        url: '{{ url('society/get-plot') }}/' + roadName,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                        console.log(data);
                            $('#plot').empty().append('<option value="">Select Plot</option>');

                            $.each(data, function(key, value) {
                                $('#plot').append('<option value="' + value.id +
                                    '">' + value.plotName + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching plots:', error);
                        }
                    });
                } else {

                    $('#plot').empty().append('<option value="">Select Plot</option>');
                }
            });
        });
    </script>

@stop
