@extends('layouts.master')
@section('title', 'Product')
@section('page-header')
    <i class="fa fa-plus"></i> Product Create
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


                                <a href="{{ route('products.create',['csv' => 'csv']) }}"
                                   class="dt-button btn btn-white btn-info btn-bold" title="List" data-toggle="tooltip"
                                   tabindex="0" aria-controls="dynamic-table">
                                    <span>
                                        <i class="fa fa-upload bigger-110"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space"></div>

                <!-- INPUTS -->
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="width: 100%; margin: 0 0 20px !important;">
                        <div class="col-sm-12 px-4">
                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Name <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="name" type="text" required class="form-control input-sm" placeholder="Name" value="{{ old('name') }}">
                                </div>
                            </div>



                            <!-- DESCRIPTION -->
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="description">
                                    <b>Description</b>
                                </label>

                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control input-sm">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group row">
                                <label class="control-label col-sm-2" for="category_id">
                                    <b>Category<sup class="text-danger"> *</sup></b>
                                </label>

                                <div class="col-sm-9">

                                    <select id="category_id" name="category_id" required class="chosen-select-100-percent form-control required"
                                            data-placeholder="- Select Category -">
                                        <option value=""></option>

                                        @foreach($categories as $id => $name)
                                            <option value="{{ $id }}" {{ $id == old('category_id') ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Unit -->
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-2" for="category_id">
                                        <b>Unit<sup class="text-danger"> *</sup></b>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="category_id" name="unit_id" required class="chosen-select-100-percent form-control required"
                                                data-placeholder="- Select Category -">
                                            <option value=""></option>
                                            @foreach($units as $id => $name)
                                                <option value="{{ $id }}" {{ $id == old('unit_id') ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Unit -->
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-2" for="category_id">
                                        <b>Brand<sup class="text-danger"> *</sup></b>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="brand_id" name="brand_id" required class="chosen-select-100-percent form-control required"
                                                data-placeholder="- Select Category -">
                                            <option value=""></option>
                                            @foreach($brand as $id => $name)
                                                <option value="{{ $id }}" {{ $id == old('brand_id') ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Unit -->
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-2" for="category_id">
                                        <b>Model<sup class="text-danger"> *</sup></b>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="model_id" name="model_id" required class="chosen-select-100-percent form-control required"
                                                data-placeholder="- Select Category -">
                                            <option value=""></option>
                                            @foreach($model as $id => $name)
                                                <option value="{{ $id }}" {{ $id == old('model_id') ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <!-- Purchase Price -->
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Purchase Price</b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="purchase_price" name="purchase_price" onkeypress="return event.charCode >= 46 && event.charCode <= 57" type="text" class="form-control input-sm" placeholder="Product Purchase Price" value="{{ old('purchase_price') }}">
                                </div>
                            </div>

                            <!-- Sale Price -->
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Sale Price </b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="selling_price" name="selling_price" onkeypress="return event.charCode >= 46 && event.charCode <= 57" type="text" class="form-control input-sm" placeholder="Product Sale Price" value="{{ old('selling_price') }}">
                                </div>
                            </div>
                            {{-- <input name="selling_price" type="hidden" class="form-control input-sm" placeholder="Product Sale Price" value="0"> --}}


                            <!-- Opening Qty -->
                           <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name"><b>Opening Qty </b></label>

                             <div class="col-sm-9">
                                   <input id="opening_quantity" name="opening_quantity" onkeypress="return event.charCode >= 46 && event.charCode <= 57" type="text" class="form-control opening_quantity input-sm" placeholder="Opening Quantity" value="{{ old('opening_quantity') }}">
                             </div>
                           </div>

                           <div class="form-group expiry row" style="display: none">
                                <label class="col-sm-2 control-label" for="name"><b> Expiry  Date </b></label>

                             <div class="col-sm-9">
                                 <input type="date" name="expiry_at" class="form-control date-picker" id="date" placeholder="Expiry Date" autocomplete="off">
                             </div>
                           </div>




                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name"><b>Image </b></label>

                                <div class="col-sm-9">


                                    <label class="ace-file-input ace-file-multiple">
                                        <input multiple="" type="file" id=" " name="image">
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
                                    <button class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> Save</button>
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

    <script>
        $('.opening_quantity').on('keyup', function () {

            let qty = $(this).val();
            if (qty > 0){
                $('.expiry').show()
            }else {
                $('.expiry').hide()
            }
        })
    </script>
@endsection


