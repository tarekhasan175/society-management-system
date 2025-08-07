@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
@stop


@section('content')

    <div class="row">
        @include('partials._alert_message')
        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i>   {{ __('language.business_step') }}
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

                                <form action="{{route('business-type.store')}}" method="post">
                                    @csrf

                                    @include('includes.input-label.input-field', ['name' => 'type', 'title' =>__('language.business_step') , 'is_required' => 1])

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

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-12">
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
                            <div class="col-sm-6 col-sm-offset-2">

                                <table id="data-table" class="table table-striped table-bordered ">
                                    <thead style="text-align: center!important;">
                                    <tr >
                                        <th width="10%">#</th>
                                        <th  style="text-align: center"> {{ __('language.business_step') }}</th>
                                        <th width="20%"></th>
                                    </tr>
                                    </thead>
                                    @foreach( $showType as $type)

                                    <tbody style="text-align: center">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$type->type}}</td>
                                        <td>
                                            <a href="{{ route('business-type.edit', $type->id) }}" class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <button class="btn btn-sm btn-danger" title="Delete"
                                                    onclick="delete_item('{{ route('business-type.destroy', $type->id) }}')" type="button">
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




