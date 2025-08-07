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
                        <i class="fa fa-plus-circle"></i>     {{__('language.block')}}
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

                                <form action="{{route('region-area.store')}}" method="post" >
                                    @csrf

                                    <div class="form-group mt-4">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span id="ContentPlaceHolder1_lblzone">{{__('language.sector')}}</span>
                                            <span class="required">(*)</span></label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <select name="nagorik_sector_id" id="" class="form-control dropdownnew" style="font-family: sutonnyMJ;">
                                                <option value="">......</option>
                                                                                                @foreach($nagorikSector as $sector)
                                                                                                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                                                                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group mt-4">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            <span id="ContentPlaceHolder1_lblzone"> {{__('language.block')}} </span>
                                            <span class="required">(*)</span></label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>


                                    <br>
                                    <div class="form-group mt-4">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        </label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <div class="center mb-2 mt-2" style="text-align: right !important;">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="ace-icon fa fa-save icon-on-right bigger-110"></i>
                                                        {{__('language.add_new_button')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>

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


                <div class="widget-body" style="min-height: 225px">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            {{--                            @include('partials._alert_message')--}}
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1 ">

                                <table id="data-table" class="table table-striped table-bordered  mb-2" >
                                    <tr>
                                        <th width="10%">#</th>
                                        <th style="text-align: center">  {{__('language.sector')}}  </th>
                                        <th style="text-align: center">  {{__('language.block')}}  </th>
                                        <th width="30%"></th>
                                    </tr>
                                                                        @foreach( $NagorikBloc as $bloc)



                                                                            <tbody style="text-align: center">
                                                                            <tr>
                                                                                <td>{{$loop->iteration}}</td>
                                                                                <td>{{optional($bloc->nagoriksector)->name}}</td>
                                                                                <td>{{$bloc->name}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('region-area.edit', $bloc->id) }}" class="btn btn-sm btn-success" title="Edit">
                                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                                    </a>

                                                                                    <button class="btn btn-sm btn-danger" title="Delete" onclick="delete_item('{{ route('region-area.destroy', $bloc->id) }}')" type="button">
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




