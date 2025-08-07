@extends('layouts.master')

@section('title', 'Edit Bill')

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
                <h4 class="widget-title">Edit Bill Details</h4>
            </div>

            <div class="widget-body">

                {{-- Form --}}
                <form action="{{ route('generateBill.billupdate', $bill->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Block, Road, Plot --}}
                    <div class="row ml-1">
                        <div class="col-md-4 form-group">
                            <label for="block_name">Block Name</label>
                            <input type="text" name="block_name" value="{{ $bill->AssignBlock->blockName ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="road_name">Road Name</label>
                            <input type="text" name="road_name" value="{{ $bill->AssignRoad->roadName ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="plot_name">Plot Name</label>
                            <input type="text" name="plot_name" value="{{ $bill->AssignPlot->plotName ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                    </div>

                    {{-- Flat Details --}}
                    <div class="row ml-1">
                        <div class="col-md-4 form-group">
                            <label for="flat_name">Flat Name</label>
                            <input type="text" name="flat_name" value="{{ $bill->flat->flatName ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="owner_name">Owner Name</label>
                            <input type="text" name="owner_name" value="{{ $bill->flat->ownerName ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="tenant_name">Tenant Name</label>
                            <input type="text" name="tenant_name" value="{{ $bill->flat->tenantName ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                    </div>
                     {{-- Year and Month --}}
                     <div class="row ml-1">
                        <div class="col-md-6 form-group">
                            <label for="year">Year</label>
                            <input type="text" name="year" value="{{ $bill->year->year ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="month">Month</label>
                            <input type="text" name="month" value="{{ $bill->month->name ?? 'N/A' }}" class="form-control" readonly>
                        </div>
                    </div>

                    {{-- Editable Service Charge (Monthly Due) --}}
                    <div class="form-group ml-2">
                        <label for="monthlyDue">Service Charge (Editable)</label>
                        <input type="number" name="monthlyDue" value="{{ old('monthlyDue', $bill->monthlyDue ?? '') }}" class="form-control" step="0.01" required>
                        <small class="form-text text-muted">Enter the service charge for this bill.</small>
                    </div>



                    {{-- Submit Button --}}
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Update Bill</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script>
        // Custom JS for enhanced user experience
        $(document).ready(function() {
            // Handle success and error alert auto-dismiss
            setTimeout(function() {
                $('#success-alert, #error-alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@stop
