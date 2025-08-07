@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>

@stop


@section('content')

    <div class="row">
        @include('partials._alert_message')
        <div class="col-sm-6">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i>  {{ __('language.Financial_year') }}
                    </h4>

                    <span class="widget-toolbar">

                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
{{--                            @include('partials._alert_message')--}}
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">

                                <form action="{{route('financial-years.store')}}" method="post" >
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="start_year">Start Year:</label>
                                            <input type="number" id="start_year" name="start_year" placeholder="2024" required>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="end_year">End Year:</label>
                                            <input type="number" id="end_year" name="end_year" placeholder="2025" required>
                                        </div>
                                    </div>




{{--                                    @include('includes.input-label.input-field', ['name' => 'year', 'title' =>  __('language.Financial_year')  , 'is_required' => 1])--}}

                                    <br>

                                    <div class="center mb-3 mt-4" style="text-align: right !important;">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="ace-icon fa fa-save icon-on-right bigger-110"></i>
                                                {{ __('language.add_new_button') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div id="yearPicker" class="year-picker">
                                    <!-- Year grid will be populated here -->
                                </div>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
{{--                        <i class="fa fa-plus-circle"></i> হোটেল নম্বর নিবন্ধীকরণ--}}
                    </h4>

                    <span class="widget-toolbar">

                    </span>
                </div>


                <div class="widget-body" style="min-height: 130px">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
{{--                            @include('partials._alert_message')--}}
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1 ">

                                <table id="data-table" class="table table-striped table-bordered  mb-2" >
                                    <tr>
                                        <th width="10%">#</th>
                                        <th style="text-align: center">  {{ __('language.Financial_year') }}</th>
                                        <th width="30%"></th>
                                    </tr>
                                    @foreach( $years as $year)



                                    <tbody style="text-align: center">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$year->start_year}}-{{$year->end_year}}</td>
                                        <td>
                                            <a href="{{ route('financial-years.edit', $year->id) }}" class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <button class="btn btn-sm btn-danger" title="Delete" onclick="delete_item('{{ route('financial-years.destroy', $year->id) }}')" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection

<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>




<script src="{{ asset('assets/custom_js/custom-datatable.js') }}"></script>
<script src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>


