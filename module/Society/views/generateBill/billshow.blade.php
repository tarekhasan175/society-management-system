@extends('layouts.master')

@section('title', 'Bill Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
@stop

@section('content')

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">

            {{-- Error and Success Messages --}}
            @if ($errors->any())
                <div class="alert alert-danger" id="error-alert" style="margin-bottom: 30px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" id="success-alert" style="margin-bottom: 30px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Widget Header --}}
            <div class="widget-header">
                <h4 class="widget-title">Bill Details</h4>
            </div>

            <div class="widget-body">

                {{-- Bill Details --}}
                <div class="row ml-1">
                    <div class="col-md-4 form-group">
                        <label>Block Name</label>
                        <p class="form-control-static">{{ $bill->AssignBlock->blockName ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Road Name</label>
                        <p class="form-control-static">{{ $bill->AssignRoad->roadName ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Plot Name</label>
                        <p class="form-control-static">{{ $bill->AssignPlot->plotName ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row ml-1">
                    <div class="col-md-4 form-group">
                        <label>Flat Name</label>
                        <p class="form-control-static">{{ $bill->flat->flatName ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Owner Name</label>
                        <p class="form-control-static">{{ $bill->flat->ownerName ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Tenant Name</label>
                        <p class="form-control-static">{{ $bill->flat->tenantName ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row ml-1">
                    <div class="col-md-6 form-group">
                        <label>Year</label>
                        <p class="form-control-static">{{ $bill->year->year ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Month</label>
                        <p class="form-control-static">{{ $bill->month->name ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row ml-1">
                    <div class="col-md-6 form-group">
                        <label>Service Charge (Monthly Due)</label>
                        <p class="form-control-static">{{ $bill->monthlyDue ?? 'N/A' }}</p>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="form-group text-center">
                    <a href="{{ route('generateBill.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('generateBill.billedit', $bill->id) }}" class="btn btn-primary">Edit</a>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Auto-dismiss alerts
            setTimeout(function() {
                $('#success-alert, #error-alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@stop
