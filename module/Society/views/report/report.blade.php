@extends('layouts.master')
@section('title', 'Payment / Due')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
@stop

@section('content')

    <!-- Bootstrap 4 NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-1">
        <a class="navbar-brand" href="#" style="font-size: 20px; color:black;">Report Dashboard</a>
        <div class="ml-auto d-flex align-items-center" style="padding-top:5px;">
            <a href="javascript:void(0);" onclick="generatePrintURL()" class="btn btn-sm btn-primary ml-2">Print Billing
                Report</a>
            <a href="{{ route('export.plot.report') }}" class="btn btn-sm btn-primary ml-2">Print Plot
                Report</a>
            <a href="{{ route('report') }}" class="btn btn-sm btn-secondary rounded-circle ml-2"
                style="display: inline-flex; align-items: center; justify-content: center; height: 36px;">
                <i class="fas fa-sync-alt"></i>&nbsp;Refresh
            </a>
        </div>
    </nav>

    <!-- Bootstrap 4 Tabs for Billing and Plot Report -->
    <ul class="nav nav-tabs" id="reportTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="billing-tab" data-toggle="tab" href="#billing" role="tab"
                aria-controls="billing" aria-selected="true">Billing Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="plot-tab" data-toggle="tab" href="#plot" role="tab" aria-controls="plot"
                aria-selected="false">Plot Report</a>
        </li>
    </ul>

    <div class="tab-content" id="reportTabContent">
        <!-- Billing Report Tab Content -->
        <div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="billing-tab">
            <div class="container-fluid">
                @include('report.billing_report')
            </div>
        </div>

        <!-- Plot Report Tab Content -->
        <div class="tab-pane fade" id="plot" role="tabpanel" aria-labelledby="plot-tab">
            <div class="container-fluid">
                @include('report.plot_report')
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#billing-tab').tab('show');

            $('.nav-link').on('click', function(e) {
                e.preventDefault();

                $('.nav-link').removeClass('active');
                $('.tab-pane').removeClass('show active');

                $(this).addClass('active');

                var target = $(this).attr('href');
                $(target).addClass('show active');
            });
        });
    </script>

@endsection
