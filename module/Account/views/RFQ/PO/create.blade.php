@extends('layouts.master')
@section('title', 'Product')
@section('page-header')
    <i class="fa fa-plus"></i> Product Order Create
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space"></div>

                <!-- INPUTS -->
                <form action="{{ route('po.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="row" style="width: 100%; margin: 0 0 20px !important;">
                        <div class="col-sm-12 px-4">
                            <!-- Name -->


                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="name">
                                    <b>Company Name  <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-8">
                                    <select required name="client_company_id" id="company_id" onchange="company()" class="width-100" style="height: 45px" data-placeholder="- Select Company -">
                                        <option >--Select--</option>
                                        @foreach($companies as  $name)
                                            <option value="{{ $name->id}}" >{{ $name->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="name">
                                    <b>Customer Name  <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-8">
                                    <select required name="rfq_customers_id" id="rfq_customer_id" class="width-100"  data-placeholder="- Select Customer -" style="height: 45px!important;" >
                                        <option>--Select--</option>
                                        @foreach($customers as   $name)
                                            <option value="{{$name->id }}"  >{{ $name->customer->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="name">
                                    <b>Purchase Order Number  <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-8">
                                    <input id="name" name="invoice" type="text" style="height: 45px" required class="form-control input-sm"
                                           placeholder="Invoice" value="" >
                                </div>
                            </div>


                            <!-- DESCRIPTION -->


                            <div class="form-group  row ">
                                <label for="photo" class="col-md-3 control-label bolder">Invoice</label>
                                <div class="col-md-8">
                                    <label class="ace-file-input ace-file-multiple">
                                        <input multiple="" type="file" id=" " name="file" required>
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
                                    <button class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> Save
                                    </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js"></script>

    <script>
        function company() {
        let companyy = document.getElementById('company_id').value;

        let word = document.getElementById('rfq_customer_id');
        let url = "{{ route('ajax-company-to-customer') }}";
        let data = {
        Company: companyy,
        };

        axios.post(url, data)
        .then(function (response) {

        const departments = response.data;

        word.innerHTML = '';

        let placeholderOption = document.createElement('option');
        placeholderOption.value = '';
        placeholderOption.text = '--Select --';
        word.appendChild(placeholderOption);

        departments.sort();

        departments.forEach(function (department) {
        let option = document.createElement('option');
        option.value = department.id;
        option.text = department.customer.name;
        word.appendChild(option);
        });
        })
        .catch(function (error) {

        })
        }
    </script>
@endsection


