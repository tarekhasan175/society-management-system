@extends('layouts.master')
@section('title', 'Nature of Business')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}

@stop
@section('content')

    <form action="{{ route('businessNature.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Add Nature of Business</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nature of Business
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="businessNatureName" id="form-field-1"
                                    placeholder="Nature of Business" class="col-xs-11 col-sm-11 col-md-11">
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

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="row" style="margin: 3px;">
                <div class="col-xs-12">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nature of Business</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($businessNatures as $businessNature)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $businessNature->businessNatureName }}</td>
                                    <td>
                                        <a href="{{ route('businessNature.edit', $businessNature->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $businessNature->id }}"
                                            action="{{ route('businessNature.delete', $businessNature->id) }}"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('delete-form-{{ $businessNature->id }}').submit();">
                                                <i style="color: red;" class="fa fa-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


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
