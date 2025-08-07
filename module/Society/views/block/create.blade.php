@extends('layouts.master')
@section('title', 'Block')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('block.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf

        <div class="col-12 col-md-12 col-xs-6">
            <div class="widget-box">

                @if ($errors->any())
                    <div class="alert alert-danger" id="error-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
                @endif

                @if (session('failed'))
                    <div class="alert alert-danger" id="error-alert">{{ session('failed') }}</div>
                @endif

                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Block</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 15px;">
                    <div class="form-group">
                        <label class="col-md-2 control-label no-padding-right" for="form-field-2">Block Name<span
                                style="color: red; margin-left: 5px; font-size: 20px;">*</span></label>

                        <div class="col-md-10">
                            <input type="text" name="blockName" id="form-field-2" placeholder="Block Name"
                                class="col-xs-11 col-sm-11 col-md-11" required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">
                                Save
                            </button>
                        </div>
                    </div>
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
                                <th>Block Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blocks as $block)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $block->blockName ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('block.edit', $block->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        {{-- <form id="delete-form-{{ $block->id }}"
                                            action="{{ route('block.delete', $block->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('delete-form-{{ $block->id }}').submit();">
                                                <i style="color: red;" class="fa fa-trash"></i>
                                            </a>
                                        </form>      --}}


                                        <form id="delete-form-{{ $block->id }}"
                                            action="{{ route('block.delete', $block->id) }}" method="POST"
                                            style="display: inline-block;">
                                          @csrf
                                          <a href="javascript:void(0)"
                                             onclick="if(confirm('Are you sure you want to delete this block?')) { document.getElementById('delete-form-{{ $block->id }}').submit(); }">
                                              <i style="color: red;" class="fa fa-trash"></i>
                                          </a>
                                      </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="display: flex; justify-content:right;">
                        @isset($blocks)
                            {{ $blocks->links('custom') }}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#dynamic-table').DataTable();
        });
    </script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#dynamic-table').DataTable();
        });
    </script> --}}

<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#dynamic-table').DataTable({
            "paging": false // This hides pagination
        });
    });
</script>

    <script>
        window.onload = function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000);
            }
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 3000);
            }
        };
    </script>





@endsection
