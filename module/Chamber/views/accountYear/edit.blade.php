@extends('layouts.master')
@section('title', 'Account Year')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('accountYear.update',($accountYear->id)) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Edit Account Year</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> From Date
                            </label>
                            <div class="col-sm-9">
                                <input type="date" name="fromDate" id="form-field-1" 
                                       class="col-xs-11 col-sm-11 col-md-11" 
                                       value="{{ $accountYear->fromDate ? \Carbon\Carbon::parse($accountYear->fromDate)->format('Y-m-d') : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> To Date
                            </label>
                            <div class="col-sm-9">
                                <input type="date" name="toDate" id="form-field-1"
                                    class="col-xs-11 col-sm-11 col-md-11"
                                    value="{{$accountYear->toDate ? \Carbon\Carbon::parse($accountYear->toDate)->format('Y-m-d') : '' }}"
                                    >
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Session Name
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="sessionName" id="form-field-1" value="{{$accountYear->sessionName}}"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lock
                            </label>

                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="lock" id="lock" value="1" {{ $accountYear->lock == 1 ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="text-center mb-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>


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





@endsection
