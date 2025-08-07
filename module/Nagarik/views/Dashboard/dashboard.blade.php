@extends('layouts.master')

@section('title','Add New User')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
@stop


@section('content')

    <div class="row">
        <div class="col-xs-12">

            @include('partials._alert_message')

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div>

    <br>

    <div class="row">
        <div class="col-sm-12">
            <div id="columnChart">
                <img class="bg" src="{{ asset('company-hom.png') }}">
            </div>
        </div>
    </div>

@endsection









