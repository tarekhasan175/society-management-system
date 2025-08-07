
@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">

        <a class="btn btn-xs btn-info" href="{{route('region-words.create')}}" style="float: right; margin: 0 2px;">
            তালিকা দেখুন</a>

        <h1>
            <i class="fa fa-info-circle green"></i> ওয়ার্ড
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">


                <div class="form-horizontal form-label-left input_mask">

                    <form action="{{route('region-road.update' , $nagorikRoad->id)}}" method="post">
                        @method('put')
                        @csrf


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">{{__('language.block')}}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select name="nagorik_block_id" id="" class="form-control dropdownnew"
                                        style="font-family: sutonnyMJ;">
                                    <option value="">.......</option>
                                    @foreach($NagorBlock as $sector)
                                        <option value="{{$sector->id}}" {{$sector->id == $nagorikRoad->nagorik_block_id ? 'selected' : ''}}>{{$sector->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">{{__('language.road')}}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input name="name" type="text" value="{{$nagorikRoad->name}}" id="" class="form-control" />
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
                                            {{__('language.update')}}
                                        </button>
                                    </div>
                                </div>                        </div>
                        </div>



                    </form>





                </div>

            </div>
        </div>
    </div>

@endsection
