@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
@stop


@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="widget-box">

                <div class="widget-header">
                    <h4 class="widget-title">
                        <i class="fa fa-plus-circle"></i> হোটেল নম্বর নিবন্ধীকরণ
                    </h4>

                    <span class="widget-toolbar">
{{--                        <a href="">--}}
                        {{--                            <i class="ace-icon fa fa-list-alt"></i> User List--}}
                        {{--                        </a>--}}
                    </span>
                </div>


                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <div style="margin: 20px;">
                            @include('partials._alert_message')
                        </div>

                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-1">

                                <form action="">

                                    @include('includes.input-label.input-field', ['name' => 'name', 'title' => "ই-হোটেল নম্বরটি লিখুন", 'is_required' => 1])


                                    <div class="center mb-3 mt-4" style="text-align: right !important;">
                                        <div class="btn-group">
                                            <a href="" class="btn btn-sm btn-info">
                                                <i class="fa fa-backward"></i> Back List
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="ace-icon fa fa-save icon-on-right bigger-110"></i>
                                                পরবর্তী ধাপ
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






