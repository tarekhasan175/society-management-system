@extends('layouts.master')
@section('title', 'Road')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('building.update', $houseOrBuilding->id) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        @method('POST') <!-- Specify that this is an update -->
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
                            <h4 class="widget-title">Edit House/Building Information</h4>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" style="margin-top: 15px; margin-left: 20px; padding-right:15px;">
                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="block">Block<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select id="block_id" name="block_id" class="col-xs-11 col-sm-11 col-md-11" readonly>
                                <option value="">Select Block</option>
                                @foreach ($blocks as $block)
                                    <option value="{{ $block->id }}"
                                        {{ $block->id == $houseOrBuilding->block_id ? 'selected' : '' }}>
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
                            <select id="roadName" name="road_id" class="col-xs-11 col-sm-11 col-md-11" readonly>
                                <option value="">Select Road</option>
                                @foreach ($roadss as $road)
                                    <!-- Make sure to pass $roads from the controller -->
                                    <option value="{{ $road->id }}"
                                        {{ $road->id  == $houseOrBuilding->road_id ? 'selected' : '' }}>
                                        {{ $road->roadName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="plot">Plot<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select id="plot" name="plot_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                <option value="">Select Plot</option>
                                @foreach ($plotss as $plot)
                                    <option value="{{ $plot->id }}"
                                        {{ $plot->id == $houseOrBuilding->plot_id ? 'selected' : '' }}>
                                        {{ $plot->plotName }}
                                    </option>
                                @endforeach
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
                                style="height: 30px;"
                                value="{{ old('houseOrBuildingName', $houseOrBuilding->houseOrBuildingName) }}">
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="storey">Storey<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <input type="text" name="storey" id="storey" placeholder="Storey"
                                class="col-xs-11 col-sm-11 col-md-11" style="height: 30px;"
                                value="{{ old('storey', $houseOrBuilding->storey) }}">
                        </div>
                    </div>

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="totalFlat">Total Unit/Flat<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <input type="text" name="totalFlat" id="totalFlat" placeholder="Total Unit"
                                class="col-xs-11 col-sm-11 col-md-11" style="height: 30px;"
                                value="{{ old('totalFlat', $houseOrBuilding->totalFlat) }}">
                        </div>
                    </div>

                    {{-- <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="house-status">House/Building Status<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            <select name="houseStatus" id="house-status" class="col-xs-11 col-sm-11 col-md-11"
                                style="height: 30px;">
                                <option value="">Select Status</option>
                                <option value="tin-shade"
                                    {{ $houseOrBuilding->houseStatus == 'tin-shade' ? 'selected' : '' }}>Tin Shade</option>
                                <option value="under-construction"
                                    {{ $houseOrBuilding->houseStatus == 'under-construction' ? 'selected' : '' }}>Under
                                    Construction (UC)</option>
                                <option value="building"
                                    {{ $houseOrBuilding->houseStatus == 'building' ? 'selected' : '' }}>Building</option>
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-md-3 col-12" style="padding-left:5px; padding-right:5px;">
                        <div class="form-group">
                            <label class="control-label no-padding-right" for="house-status">House/Building Status<span
                                    style="color: red; margin-left: 5px; font-size: 12px;">*</span></label>
                            {{-- <select name="houseStatus" id="house-status" class="col-xs-11 col-sm-11 col-md-11"
                                style="height: 30px;">
                                <option value="">Select Status</option>
                                <option value="tin-shade"
                                    {{ $houseOrBuilding->houseStatus == 'tin-shade' ? 'selected' : '' }}>Tin Shade</option>
                                <option value="under-construction"
                                    {{ $houseOrBuilding->houseStatus == 'under-construction' ? 'selected' : '' }}>Under Construction (UC)</option>
                                <option value="building"
                                    {{ $houseOrBuilding->houseStatus == 'building' ? 'selected' : '' }}>Building</option>
                                <option value="residential"
                                    {{ $houseOrBuilding->houseStatus == 'residential' ? 'selected' : '' }}>Residential</option>
                                <option value="commercial"
                                    {{ $houseOrBuilding->houseStatus == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                <option value="garments"
                                    {{ $houseOrBuilding->houseStatus == 'garments' ? 'selected' : '' }}>Garments</option>
                                <option value="factory"
                                    {{ $houseOrBuilding->houseStatus == 'factory' ? 'selected' : '' }}>Factory</option>
                                <option value="main-sponsor"
                                    {{ $houseOrBuilding->houseStatus == 'main-sponsor' ? 'selected' : '' }}>Main Sponsor</option>
                                <option value="mini-sponsor"
                                    {{ $houseOrBuilding->houseStatus == 'mini-sponsor' ? 'selected' : '' }}>Mini Sponsor</option>
                            </select> --}}

                            <select id="usage_type_id" name="usage_type_id" class="col-xs-11 col-sm-11 col-md-11" required>
                                <option value="">Select Type</option>
                                @foreach ($usage_type as $type)


                                    <option value="{{ $type->id }}"
                                        {{ $type->id  == $houseOrBuilding->usage_type_id ? 'selected' : '' }}>
                                        {{ $type->typeName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group text-right" style="padding-right: 15px;">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-info" style="height: 30px;">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dynamic-table').DataTable();
        });
    </script>

    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#dynamic-table').DataTable();
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
