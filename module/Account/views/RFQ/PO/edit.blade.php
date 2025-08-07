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
                                <a href="{{ route('po.index') }}"
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
                <form action="{{ route('po.update', $PO->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                            <option value="{{ $name->id}}"  {{ $PO->client_company_id == $name->id ? 'selected' : '' }} >{{ $name->name }}</option>

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
                                        @foreach($customers as  $name)
                                            <option value="{{ $name->id }}" {{ $PO->rfq_customers_id == $name->id  ? 'selected' : '' }}>{{ $name->customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="name">
                                    <b>Purchase Order Number <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-8">
                                    <input id="name" name="invoice" type="text" required class="form-control input-sm"
                                           placeholder="Invoice" value="{{$PO->invoice}}" >
                                </div>
                            </div>


                            <!-- DESCRIPTION -->


                            <div class="form-group  row ">
                                <label for="photo" class="col-md-3 control-label bolder">Invoice</label>
                                <div class="col-md-8">
                                    <label class="ace-file-input ace-file-multiple">
                                        <input multiple="" type="file" id=" " name="file"  >
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
                                    <button class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> Update
                                    </button>
                                </div>
                            </div>

                            @isset($PO->file)
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="name">
                                    </label>
                                    <div class="col-sm-10">
                                        @if(isImage($PO->file))
                                        <p style="text-align: center"><img src="{{ asset($PO->file) }}" alt="" style="height: 300px ; width: 500px"></p><br>
                                        @elseif(isPdf($PO->file))
                                        <div id="pdf-viewer"></div>
                                        @endif
                                    </div>
                                </div>
                                <br>
                            @endisset
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

    <!-- Include PDF.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

    <!-- PDF viewer container -->
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


        document.addEventListener('DOMContentLoaded', (event) => {
            // Initialize PDF viewer
            const url = '{{ asset($PO->file) }}';
            const container = document.getElementById('pdf-viewer');

            // Check if the url is valid
            if (!url) {
                console.error('PDF URL is not valid');
                return;
            }

            // Load PDF document
            pdfjsLib.getDocument(url).promise.then(pdfDoc => {
                console.log(`PDF loaded: ${pdfDoc.numPages} pages`);

                // Render PDF pages
                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    pdfDoc.getPage(pageNum).then(page => {
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        const viewport = page.getViewport({ scale: 1.5 });
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };

                        container.appendChild(canvas);
                        page.render(renderContext).promise.then(() => {
                            console.log(`Page ${pageNum} rendered`);
                        }).catch(err => {
                            console.error(`Error rendering page ${pageNum}:`, err);
                        });
                    }).catch(err => {
                        console.error(`Error getting page ${pageNum}:`, err);
                    });
                }
            }).catch(err => {
                console.error('Error loading PDF:', err);
            });
        });
    </script>


@endsection


