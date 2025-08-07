@extends('layouts.master')
@section('title', 'Product')
@section('page-header')
    <i class="fa fa-plus"></i> Product Upload
@stop
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/custom_css/chosen-required.css') }}"/>

@endpush

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">

            @include('partials._alert_message')

            <!-- heading -->
            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">
                <div class="widget-header widget-header-small">
                    <h3 class="widget-title smaller text-primary">
                        @yield('page-header')
                    </h3>

                    <div class="widget-toolbar border smaller" style="padding-right: 0 !important">
                        <div class="pull-right tableTools-container" style="margin: 0 !important">
                            <div class="dt-buttons btn-overlap btn-group">
                                <a href="{{ route('products.index') }}"
                                   class="dt-button btn btn-white btn-info btn-bold" title="List" data-toggle="tooltip"
                                   tabindex="0" aria-controls="dynamic-table">
                                    <span>
                                        <i class="fa fa-list bigger-110"></i>
                                    </span>
                                </a>


                                <a href="{{ route('products.create') }}"
                                   class="dt-button btn btn-white btn-info btn-bold" title="List" data-toggle="tooltip"
                                   tabindex="0" aria-controls="dynamic-table">
                                    <span>
                                        <i class="fa fa-plus bigger-110"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space"></div>

                <!-- INPUTS -->
                <form action="{{ route('products.store',['csv' => 'csv']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="width: 100%; margin: 0 0 20px !important;">
                        <div class="col-sm-12 px-4">



                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name"><b>  </b></label>

                                <div class="col-sm-9">


                                    <label class="ace-file-input ace-file-multiple">
                                        <input multiple="" type="file" id=" " name="csv_file">
                                        <span class="ace-file-container" data-title="Drop files here or click to choose">
                                                                <span class="ace-file-name" data-title="No File ...">
                                                                    <i class=" ace-icon ace-icon fa fa-cloud-upload"></i>
                                                                </span>
                                                            </span>
                                        <a class="remove" href="#">
                                            <i class=" ace-icon fa fa-times"></i>
                                        </a>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="row">
                                <div class="col-sm-11">
                                    <button class="btn btn-primary btn-sm pull-right m-4"  style="margin: 20px"><i class="fa fa-save"></i> Save</button>

                                    <a href="{{asset('Sample-Product.csv')}}" class="btn btn-primary btn-sm pull-right m-4" style="margin: 20px"><i class="fa fa-save"></i> Sample File</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>


    <script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>

@endsection


