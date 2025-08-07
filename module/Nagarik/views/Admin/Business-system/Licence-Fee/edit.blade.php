
@extends('layouts.master')

@section('title',' User')


@section('css')

@stop


@section('content')

    <div class="page-header">

        <a class="btn btn-xs btn-info" href="{{route('licence-fee.index')}}" style="float: right; margin: 0 2px;">
            তালিকা দেখুন</a>

        <h1>
            <i class="fa fa-info-circle green"></i> লাইসেন্স ফি
        </h1>
    </div>

    @include('partials._alert_message')

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">


                <div class="form-horizontal form-label-left input_mask">

                    <form action="{{route('licence-fee.update' , $edirfee->id)}}" method="post">
                        @method('put')
                        @csrf


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">অর্থ বছর</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select name="financial_year_id" id="" class="form-control dropdownnew"
                                        style="font-family: sutonnyMJ;">
                                    <option value="">.......</option>
                                    @foreach($financYear as $year)
                                        <option value="{{$year->id}}" {{$year->id == $edirfee->financial_year_id ? 'selected' : ''}}>{{$year->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="ContentPlaceHolder1_lblzone">ব্যবসার ধরণ</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select name="nagorik_business_type_id" id="" class="form-control dropdownnew"
                                        style="font-family: sutonnyMJ;">
                                    <option value="">......</option>
                                    @foreach($nagorikBusinessType as $type)
                                        <option value="{{$type->id}}" {{$type->id == $edirfee->nagorik_business_type_id ? 'selected' : ''}}>{{$type->type}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                <span id="">লাইসেন্স ফি</span>
                                <span class="required">(*)</span></label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input name="l_fee" type="number" value="{{$edirfee->l_fee}}" id="" class="form-control" />
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
                                </div>                        </div>
                        </div>



                    </form>





                </div>

            </div>
        </div>
    </div>

@endsection
