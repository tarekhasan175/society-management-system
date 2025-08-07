@extends('layouts.master')
@section('title', 'Product')
@section('page-header')
    <i class="fa fa-plus"></i> Accounts Note
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
                                <a href="{{ route('notes.index') }}"
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
                <form action="{{ route('notes.update',$note->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row" style="width: 100%; margin: 0 0 20px !important;">
                        <div class="col-sm-12 px-4">
                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Client's Name <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="name" type="text" value="{{$note->name}}" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Date <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="date" type="date" value="{{$note->date}}" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>



                            <!-- DESCRIPTION -->
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="description">
                                    <b>Description</b>
                                </label>

                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control input-sm">  {!! $note->description !!}"</textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Quote Number <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="quote_number" value="{{$note->quote_number}}" type="text" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>PO NUmber <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="po_number" value="{{$note->po_number}}" type="text" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Job NUmber <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="job_number" value="{{$note->job_number}}" type="text" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Work Done by <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="work_done_by" value="{{$note->work_done_by}}" type="text" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Quantity <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="quantity" type="text"  value="{{$note->quantity}}"  required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Units Price <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="units_price" type="text" value="{{$note->units_price}}" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Total Price <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="total_price" type="text" value="{{$note->total_price}}" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Total Cost <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="total_cost" type="text" value="{{$note->total_cost}}" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Job Report <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="job_report" type="text"  value="{{$note->job_report}}"  required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Bill Number <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="bill_number" type="text" value="{{$note->bill_number}}" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Bill Amount <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="bill_amount" type="text" value="{{$note->bill_amount}}" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Paid Amount <sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="paid_amount" type="text" value="{{$note->paid_amount}}"  required class="form-control input-sm" placeholder="Name"  ">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Debit<sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="debit" type="number" value="{{$note->debit ?? 0}}" required class="form-control input-sm" placeholder="Name"  >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Debit Purpose<sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="debit_purpose"  value="{{$note->debit_purpose}}" type="text" required class="form-control input-sm" placeholder="Name"  >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Credit<sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="credit" type="number"  value="{{$note->credit ?? 0}}" required class="form-control input-sm" placeholder="Name"  >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Credits Purpose<sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="credits_purpose" value="{{$note->credits_purpose}}" type="text" required class="form-control input-sm" placeholder="Name" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="name">
                                    <b>Invest Paid<sup class="text-danger">*</sup></b>
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" name="invest_paid" type="text" value="{{$note->invest_paid}}" required class="form-control input-sm" placeholder="Name" >
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

@endsection


