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
                        <i class="fa fa-plus-circle"></i>  {{ __('language.Attachment') }}
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

                                <form action="{{ route('add-additional.update', $type->id) }}" method="post" >
                                    @csrf
                                    @method('put')

                                    @include('includes.input-label.input-field', ['name' => 'type' , 'value' => $type->type, 'title' =>  __('language.Attachment'), 'is_required' => 1])

                                    <br>

                                    <div class="center mb-3 mt-4" style="text-align: right !important;">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="ace-icon fa fa-save icon-on-right bigger-110"></i>
                                                {{ __('language.update') }}
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


@endsection

