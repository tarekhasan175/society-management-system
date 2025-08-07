@extends('layouts.master')
@section('title', 'Add New Member')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop
@section('content')

    <form action="{{route('paymentheads.update',$paymentHead->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="col-12 col-md-12 col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-6 col-6 col-xs-6">
                            <h4 class="widget-title">Edit Payment Head Information</h4>
                        </div>
                        <div class="col-md-6 col-6 col-xs-6 text-right">
                            <a href="#" onclick="goBack()" class="btn btn-primary"> <i class="fa fa-backward"></i>
                                Back</a>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6 col-12">
                        {{-- payment head name --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Name</label>

                            <div class="col-sm-9">
                                <input type="text" value="{{$paymentHead->PaymentHeadName}}" name="PaymentHeadName" id="form-field-2" placeholder="Name"
                                    class="col-xs-11 col-sm-11 col-md-11">
                            </div>
                        </div>


                        {{-- payment type --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="district-select">PaymentType</label>
                            <div class="col-sm-9">
                                <select id="district-select" name="PaymentType" class="col-xs-11 col-sm-11 col-md-11">
                                    <option value="">Select</option>
                                        <option value="monthly" {{ ($paymentHead->PaymentType == 'monthly'? 'selected' : '') }}>Monthly</option>
                                        <option value="yearly" {{ ($paymentHead->PaymentType == 'yearly'? 'selected' : '') }}>Yearly</option>
                                </select>
                            </div>
                        </div>

                        {{--IsMandatory --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="is-old-checkbox">IsMandatory</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is-old-checkbox" name="IsMandatory" value="1" {{ ($paymentHead->IsMandatory == 1 ? 'checked' : '') }}>
                                    </label>
                                </div>
                            </div>
                        </div>
                       
                        {{--IsNew --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="is-old-checkbox">IsNew</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is-old-checkbox" name="IsNew" value="1" {{ ($paymentHead->IsNew == 1 ? 'checked' : '') }}>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">

                        {{-- payment head description --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Description</label>

                            <div class="col-sm-9">

                                <textarea name="PaymentHeadDescription" id="form-field-2" class="col-xs-11 col-sm-11 col-md-11" placeholder="PaymentHeadDescription">{{$paymentHead->PaymentHeadDescription}}</textarea>
                            </div>
                        </div>

                        {{-- payment head status --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="is-old-checkbox">IsActive</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is-old-checkbox" name="IsActive" value="1" {{ ($paymentHead->IsActive == 1 ? 'checked' : '') }}>
                                    </label>
                                </div>
                            </div>
                        </div>

                         {{--IsOld --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="is-old-checkbox">IsOld</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is-old-checkbox" name="IsOld" value="1" {{ ($paymentHead->IsOld == 1 ? 'checked' : '') }}>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mb-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
