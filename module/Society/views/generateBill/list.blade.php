@extends('layouts.master')
@section('title', 'Monthly Bill')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />

@stop
@section('content')

    <div class="col-12 col-md-12 col-xs-12">
        <div class="widget-box">

            @if ($errors->any())
                <div class="alert alert-danger" id="error-alert" style="margin-bottom: 30px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" id="success-alert" style="margin-bottom: 30px;">{{ session('success') }}</div>
            @endif

            @if (session('failed'))
                <div class="alert alert-danger" id="error-alert">{{ session('failed') }}</div>
            @endif
            <div class="widget-header">
                <div class="row">

                    <div class="col-md-6 col-6 col-xs-6 py-1">
                        <h4 class="widget-title">Monthly Bill List</h4>

                    </div>



                </div>

            </div>
        </div>



        <div class="row" style="margin: 3px;">
            <div class="col-xs-12">
                <table id="" class="table table-striped table-bordered table-hover"
                    style="display: block; max-height: 40em; overflow-y: auto; width: 100%;">
                    <thead style="position: sticky; top: 0; z-index: 1000;">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Block</th>
                            <th class="text-center">Road</th>
                            <th class="text-center">Plot</th>
                            <th class="text-center">Flat Name</th>
                            <th class="text-center">OwnerName</th>
                            <th class="text-center">TanentName</th>
                            <th class="text-center">ID No.</th>
                            <th class="text-center">Bill No.</th>
                            <th class="text-center">Usage Type</th>
                            <th class="text-center">Service Charge</th>
                            <th class="text-center">Previous Due</th>
                            <th class="text-center">Advance</th>
                            <th class="text-center">Total Payable</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($generateBills as $index => $bill)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $bill->AssignBlock->blockName ?? 'N/A' }}</td>
                                <!-- Replace 'name' with actual block field -->
                                <td>{{ $bill->AssignRoad->roadName ?? 'N/A' }}</td>
                                <!-- Ensure 'flat' relation is loaded -->
                                <td>{{ $bill->AssignPlot->plotName ?? 'N/A' }}</td> <!-- Adjust according to your schema -->
                                <td>{{ $bill->units ?? 'N/A' }}</td>
                                <td>{{ $bill->flat->ownerName ?? 'N/A' }}</td>
                                <td>{{ $bill->flat->tenantName ?? 'N/A' }}</td>

                                <td>{{ $bill->flats ?? 'N/A' }}</td>
                                <td>{{ $bill->billNo ?? 'N/A' }}</td>
                                <td>{{ $bill->usageType ?? 'N/A' }}</td>
                                <td align="right">{{ $bill->monthlyDue ?? '0.00' }}</td>
                                <td align="right">
                                    @php
                                        $previousDueSum = 0;

                                        if ($bill->created_at) {
                                            $currentYear = $bill->year->year;
                                            $currentMonth = $bill->month->name;

                                            $months = [
                                                'January',
                                                'February',
                                                'March',
                                                'April',
                                                'May',
                                                'June',
                                                'July',
                                                'August',
                                                'September',
                                                'October',
                                                'November',
                                                'December',
                                            ];

                                            $currentMonthIndex = array_search($currentMonth, $months);

                                            $previous = DB::table('generate_bills')
                                                ->join('months', 'generate_bills.month_id', '=', 'months.id')
                                                ->join('years', 'generate_bills.year_id', '=', 'years.id')
                                                ->where('generate_bills.flats', $bill->flats)
                                                ->where(function ($query) use (
                                                    $currentYear,
                                                    $currentMonthIndex,
                                                    $months,
                                                ) {
                                                    $query
                                                        ->where('years.year', '<', $currentYear)
                                                        ->orWhere(function ($query) use (
                                                            $currentYear,
                                                            $currentMonthIndex,
                                                            $months,
                                                        ) {
                                                            $query
                                                                ->where('years.year', $currentYear)
                                                                ->whereIn(
                                                                    'months.name',
                                                                    array_slice($months, 0, $currentMonthIndex),
                                                                );
                                                        });
                                                })
                                                ->pluck('monthlyDue');

                                            $previousDueSum = $previous->sum();
                                        }
                                    @endphp

                                    {{ $previousDueSum }}
                                </td>

                                <td align="right">{{ $bill->flat->advance ?? '0.00' }}</td>
                                <td align="right"><b> @php

                                    $totalDue = $bill->monthlyDue + $previousDueSum;
                                    $totalPayable = max(0, $totalDue - $bill->advance);
                                @endphp
                                        {{ $totalPayable }}</b></td>
                                <td>

                                    {{-- <a href="{{ route('generateBill.billedit', $bill->id) }}" class="fa fa-edit " style="display: inline-block; margin-right: 5px;" title="Edit"></a> --}}
                                    <form action="{{ route('generateBill.billdelete', $bill->id) }}"
                                        style="display: inline-block;" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this bill?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            <i style="color: red;" class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14">No bills found for the specified billing ID.</td>
                            </tr>
                        @endforelse


                    </tbody>


                </table>

                <div style="display: flex; justify-content:right;">
                    @isset($flats)
                        {{ $flats->links('custom') }}
                    @endisset
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>



@endsection
