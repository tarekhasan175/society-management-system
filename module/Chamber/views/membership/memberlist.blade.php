@extends('layouts.master')
@section('title', 'All Member')
@section('css')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}
@stop
@section('content')

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <div class="row">
                    <div class="col-md-6 col-6 col-xs-6">
                        <h4 class="widget-title">Member List</h4>
                    </div>
                    <div class="col-md-6 col-6 col-xs-6 text-right">
                        <a href="{{ route('membership.member_create_1') }}" class="btn btn-primary"> <i
                                class="fa fa-plus-circle"></i> Add New Member</a>
                    </div>
                </div>
            </div>


            <div class="row" style="margin: 3px;">
                <div class="col-xs-12">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member ID</th>
                                <th>Category Name</th>
                                <th>Company Name</th>
                                <th>Owner Name</th>
                                <th>Representative Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $member->memberID }}</td>
                                    <td>{{ optional($member->memberCategory)->memberCategoryName }}</td>
                                    <td>{{ $member->companyName }}</td>
                                    <td>{{ $member->ownerName }}</td>

                                    <td>{{ $member->representativeName }}</td>

                                    <td>
                                        <a href="{{ route('membership.member_edit_1', $member->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $member->id }}"
                                            action="{{ route('membership.delete', $member->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('delete-form-{{ $member->id }}').submit();">
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
