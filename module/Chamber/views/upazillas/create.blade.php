@extends('layouts.master')
@section('title', 'District')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{route('upazillas.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Add Sub-District</h4>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> District Name </label>

                            <div class="col-sm-9">
                                <select id="districtSelect" name="district_id" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="" disabled selected>Select a District</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub District Name </label>

                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" placeholder="Sub District Name"
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

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="row" style="margin: 3px;">
                <div class="col-xs-12">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>District Name</th>
                                <th>Sub District Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($upazillas as $upazilla)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$upazilla->district->name}}</td>
                                    <td>{{$upazilla->name}}</td>
                                    <td>
                                        <a href="{{ route('upazillas.edit', $upazilla->id) }}" style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <form id="delete-form-{{ $upazilla->id }}" action="{{ route('upazillas.destroy', $upazilla->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)" onclick="document.getElementById('delete-form-{{ $upazilla->id }}').submit();">
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
