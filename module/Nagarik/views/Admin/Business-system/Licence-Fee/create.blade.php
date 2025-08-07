
@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">

        <a class="btn btn-xs btn-info" href="{{route('licence-fee.index')}}" style="float: right; margin: 0 2px;"> {{ __('language.show_list') }}   </a>

        <h1>
            <i class="fa fa-info-circle green"></i> {{ __('language.licence_fee') }}
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">


                <div class="form-horizontal form-label-left input_mask">

                    <form action="{{route('licence-fee.store')}}" method="post">

                        @csrf


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">  {{ __('language.Financial_year') }}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select name="financial_year_id" id="" class="form-control dropdownnew" style="font-family: sutonnyMJ;">
                                    <option value="">.......</option>
                                    @foreach($financYear as $year)
                                        <option value="{{$year->id}}">{{$year->start_year}}-{{$year->end_year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="ContentPlaceHolder1_lblzone"> {{ __('language.business_step') }}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select name="nagorik_business_type_id" id="" class="form-control dropdownnew" style="font-family: sutonnyMJ;">
                                    <option value="">......</option>
                                    @foreach($nagorikBusinessType as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">  {{ __('language.licence_fee') }}</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input name="l_fee" type="number" value="" id="" class="form-control" />
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
                                           {{ __('language.add_new_button') }}
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
