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
                        <h4 class="widget-title">Payment Head List</h4>
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 3px;">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="col-xs-12">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name/th>
                                <th>Description</th>
                                <th>PaymentType</th>
                                <th>IsActive</th>
                                <th>IsMandatory</th>
                                <th>IsOld</th>
                                <th>IsNew</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($paymentHeads as $payment)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $payment->PaymentHeadName }}</td>
                                    <td>{{ $payment->PaymentHeadDescription }}</td>
                                    <td>{{ $payment->PaymentType }}</td>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" {{ $payment->IsActive == 1 ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" {{ $payment->IsMandatory == 1 ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" {{ $payment->IsOld == 1 ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" {{ $payment->IsNew == 1 ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('paymentheads.edit', $payment->id) }}"
                                            style="display: inline-block; margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $payment->id }}"
                                            action="{{ route('paymentheads.destroy', $payment->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('delete-form-{{ $payment->id }}').submit();">
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
