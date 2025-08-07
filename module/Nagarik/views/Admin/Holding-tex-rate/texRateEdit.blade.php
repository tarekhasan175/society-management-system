@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">

        <a class="btn btn-xs btn-info" href="{{route('holding-rates.index')}}"
           style="float: right; margin: 0 2px;"> {{ __('language.show_list') }}   </a>

        <h1>
            <i class="fa fa-info-circle green"></i> {{ __('language.Holding-Tax') }}
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">


                <div class="form-horizontal form-label-left input_mask">

                    <form action="{{route('holding-rates.update', $HoldingTexEdit->id)}}" method="post">
                        @method('put')
                        @csrf


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">  {{ __('language.area') }}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select name="nagorik_region_id" id="" class="form-control dropdownnew"
                                        style="font-family: sutonnyMJ;">
                                    <option value="">.......</option>
                                    @foreach($HoldingRegion as $area)
                                        <option
                                            value="{{$area->id}}" {{$area->id == $HoldingTexEdit->nagorik_region_id ? 'selected' : ''}}>{{$area->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="ContentPlaceHolder1_lblzone">{{ __('language.holding_description') }}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select name="nagorik_land_type_id" id="" class="form-control dropdownnew"
                                        style="font-family: sutonnyMJ;">
                                    <option value="">......</option>
                                    @foreach($NagorikLandType as $type)
                                        <option
                                            value="{{$type->id}}" {{$type->id == $HoldingTexEdit->nagorik_land_type_id ? 'selected' : ''}}>{{$type->type}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">{{ __('language.Holding_tex') }}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input name="holding_fee" type="number" value="{{$HoldingTexEdit->holding_fee}}" id=""
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="center mb-3 mt-4" style="text-align: right !important;">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="ace-icon fa fa-save icon-on-right bigger-110"></i>
                                            {{ __('language.update') }}
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

@endsection
