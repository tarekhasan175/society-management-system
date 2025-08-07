@extends('layouts.master')
@section('title', 'Block')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('block.update',($block->id)) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        
        <div class="col-12 col-md-12 col-xs-6">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Block</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 15px;">
                    <div class="form-group">
                        <label class="col-md-2 col-2 control-label no-padding-right" for="form-field-2">Block Name<span
                                style="color: red; margin-left: 5px; font-size: 20px;">*</span></label>

                        <div class="col-md-10 col-10">
                            <input type="text" name="blockName" id="form-field-2" value="{{$block->blockName}}"
                                class="col-xs-11 col-sm-11 col-md-11">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

@endsection
