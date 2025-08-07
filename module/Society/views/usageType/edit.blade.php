@extends('layouts.master')
@section('title', 'Usage Type')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <form action="{{ route('usageType.update',($usageType->id)) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <h4 class="widget-title">Usage Type Information</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 15px;">
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label no-padding-right" for="form-field-2">Title<span
                                style="color: red; margin-left: 5px; font-size: 20px;">*</span></label>
                        <div class="col-md-10">
                            <input type="text"  name="title" id="form-field-2" class="col-xs-11 col-sm-11 col-md-11" value="{{$usageType->title}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label no-padding-right" for="form-field-2">Type<span
                                style="color: red; margin-left: 5px; font-size: 20px;">*</span></label>
                        <div class="col-md-10">
                            <input type="text"  name="typeName" id="form-field-2" class="col-xs-11 col-sm-11 col-md-11" value="{{$usageType->typeName}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label no-padding-right" for="form-field-2">Rate<span
                                style="color: red; margin-left: 5px; font-size: 20px;">*</span></label>
                        <div class="col-md-10">
                            <input type="number"  name="amount" id="form-field-2" class="col-xs-11 col-sm-11 col-md-11" value="{{$usageType->amount}}" required>
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
@endsection
