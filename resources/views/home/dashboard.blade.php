@extends('layouts.master')
@section('title','Dashboard')
@section('page-header')
<i class="fa fa-tachometer"></i> Dashboard
@stop
@section('css')
<link rel="stylesheet" href="/assets/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="/assets/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="/assets/css/daterangepicker.min.css" />
<link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css" />
<style>
    .bg {
        /* Full height */
        height: 490px;
        width: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
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

@section('js')
<script type="text/javascript" src="{{ asset('assets/custom_js/canvasjs.js') }}"></script>
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
@stop