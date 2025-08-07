@extends('layouts.master')
@section('title', 'District')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}

@stop
@section('content')

    <form action="{{ route('districts.update', $districts->id) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Edit District</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> District Name
                            </label>

                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" value="{{ $districts->name }}"
                                    class="col-xs-11 col-sm-11 col-md-11">
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

    {{-- <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="row" style="margin: 3px;">
                <div class="col-xs-12">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($districts as $district)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$district->name}}</td>
                                    <td>
                                        <td>
                                            <a href="{{ route('districts.edit', $district->id) }}"><i class="fa fa-edit"></i></a>
                                        </td>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}


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
