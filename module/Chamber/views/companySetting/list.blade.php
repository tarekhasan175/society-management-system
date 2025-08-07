@extends('layouts.master')
@section('title', 'Account Setting List')
@section('css')
@stop
@section('content')

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <div class="row">
                    <div class="col-md-6 col-6 col-xs-6">
                        <h4 class="widget-title">Company Settings List</h4>
                    </div>
                </div>
            </div>


            <div class="row" style="margin: 3px;">
                <div class="col-xs-12">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>shortName</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Fax</th>
                                <th>Mobile</th>
                                <th>Website</th>
                                <th>Email</th>
                                <th>isDefault</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($companySettings as $setting)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $setting->name }}</td>
                                    <td>{{ $setting->shortName }}</td>
                                    <td>{{ $setting->address }}</td>
                                    <td>{{ $setting->phone }}</td>
                                    <td>{{ $setting->fax }}</td>
                                    <td>{{ $setting->mobile }}</td>
                                    <td>{{$setting->web}}</td>
                                    <td>{{$setting->email}}</td>
                                    <td>
                                        <input type="checkbox" name="isDefault" id="isDefault" value="1" {{ $setting->isDefault == 1 ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('companySetting.edit', $setting->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $setting->id }}" action="{{ route('companySetting.delete', $setting->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)" onclick="document.getElementById('delete-form-{{ $setting->id }}').submit();">
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
