<!doctype html>
<html lang="en">
<head>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
        table {

        }
    </style>
</head>
<body>
@php
    $companiess = \App\Models\Company::first();
@endphp
<div class="row heading d-print ">
    <div class="col-xs-3">
{{--        @if(file_exists('uploads/company/'. optional($companiess)->logo))--}}
{{--            <img class="invoice-logo" src="{{ asset('uploads/company/'. optional($companiess)->logo) }}" alt="Logo">--}}
{{--        @endif--}}
    </div>
    <div class="" style="width: 100%">
        <div style="text-align: center">
            <h3 style="line-height: 15px !important; font-weight: 600 !important; color: darkblue !important;">{{ optional($companiess)->name ?? '' }}</h3>
            <span>{{ optional($companiess)->head_office }}</span><br>
{{--            <span><strong>Email: </strong>{{ optional($companiess)->email }}</span><br>--}}
{{--            <span><strong>Phone: </strong>{{ optional($companiess)->phone_number }}</span>--}}
        </div>
        <div style="text-align: center">
            <p  class="text-center" style="font-size:15px ; color: red"><strong> Stock Movement Register</strong></p>

        </div>
    </div>
    <div class="col-xs-3"></div>
</div>

<hr class="d-print"  >

<table class="table table-striped table-bordered table-hover">




    <thead>
    <tr>
        <th class="text-center bg-header" rowspan="2" style="width:10px !important">S.L</th>
        <th class="text-center bg-header" rowspan="2" style="width:100px !important">Date</th>
        <th class="text-center bg-header" rowspan="2" style="width:50px !important">Name</th>
        <th class="text-center bg-header" rowspan="2" style="width:20px !important">Unit</th>
        <th class="text-center bg-header" rowspan="2" style="width:20px !important">Brand</th>
        <th class="text-center bg-header" rowspan="2" style="width:20px !important">Model</th>
        <th class="text-center bg-header" colspan="3">Opening Balance</th>
        <th class="text-center bg-header" colspan="4">Stock In</th>
        <th class="text-center bg-header" colspan="4">Stock OUt</th>
        <th class="text-center bg-header" colspan="3">Closing Balance</th>
    </tr>
    <tr>
        <th class="bg-header text-center">Qty</th>
        <th class="bg-header text-right">Rate</th>
        <th class="bg-header text-right">Amount</th>
        <th class="bg-header" style="width:130px !important;">Invoice No</th>
        <th class="bg-header text-center">Qty</th>
        <th class="bg-header text-right">Rate</th>
        <th class="bg-header text-right">Amount</th>
        <th class="bg-header">Invoice No</th>
        <th class="bg-header text-center">Qty</th>
        <th class="bg-header text-right">Rate</th>
        <th class="bg-header text-right">Amount</th>
        <th class="bg-header text-center">Qty</th>
        <th class="bg-header text-right">Rate</th>
        <th class="bg-header text-right">Amount</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($item_stock_details))
        @php
            $opening_qty     = (int)$opening_stock;
            $opening_cost    = $opening_rate;
            $opening_amount  = $opening_rate * $opening_stock;

        @endphp


        @forelse ($item_stock_details as $key => $details)
            <tr>
                <td>{{ $loop ->iteration  }}</td>
                <td>{{ \Carbon\Carbon::parse($details->date)->format('Y-m-d') }}</td>
                <td>{{ $details->product->name ?? '' }}</td>
                <td>{{ $details->product->unit->name ?? '' }}</td>
                <td>{{ $details->product->brand->name ?? '' }}</td>
                <td>{{ $details->product->model->name ?? '' }}</td>

                <td class="text-center">{{ number_format($opening_qty ?? 0, 2)  }}</td>
                <td class="text-right">{{ number_format($opening_cost, 2) }}</td>
                <td class="text-right">{{ round($opening_amount, 2)   }}</td>

                @if ($details->type == "Prod Purchase Receive" || $details->type == "Purchase Receive" || $details->type == "Account Purchase")
                    <td width="15%">{{ $details->source_number }}</td>
                    <td class="text-center">{{ number_format($details->credit_qty, 2) }}</td>
                    <td class="text-right">{{ number_format($details->credit_rate, 2) }}</td>
                    <td class="text-right">{{ number_format($details->credit_qty * $details->credit_rate, 2)  }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $details->source_number }}</td>
                    <td class="text-center">{{ number_format($details->debit_qty, 2) }}</td>
                    <td class="text-right">{{ number_format($details->debit_rate, 2) }}</td>
                    <td class="text-right">{{ number_format(($details->debit_qty * $details->debit_rate), 2) }}</td>
                @endif

                @php
                    //$opening_qty = requesr()->params ? request()->params:$opening_qty;

//                    $final_qty = $opening_qty + $details->credit_qty - $details->debit_qty;
                    $final_qty      = $opening_qty ;
                    $final_amount = (($opening_qty * $opening_cost) + ($details->credit_qty * $details->credit_rate) - ($details->debit_qty * $details->debit_rate));
                    if ($final_qty != 0) {
                        $final_rate = $final_amount / $final_qty;
                    } else {
                        $final_rate = 0;
                        $final_amount = 0;
                    }

                    $opening_qty     = $final_qty;
                    $opening_cost    = $final_rate;
                    $opening_amount  = $final_amount;
                @endphp

                <td>{{ number_format($final_qty ?? 0, 2) }}</td>
                <td class="text-right">{{ number_format($final_rate, 2) }}</td>
                <td class="text-right">{{ number_format($final_amount, 2) }}</td>
            </tr>

            <input type="hidden" name="last_qty" value="{{ $final_qty }}">
            <input type="hidden" name="last_cost" value="{{ $opening_cost }}">
            <input type="hidden" name="last_amount" value="{{ $opening_amount }}">

        @empty
            <tr>
                <td>{{ \Carbon\Carbon::parse($selected_item ? $selected_item->created_at : '')->format('y-m-d') }}</td>
                <td class="text-center">{{ number_format($opening_stock ?? 0, 2) }}</td>
                <td class="text-right">{{ number_format($opening_cost, 2) }}</td>
                <td class="text-right">{{ number_format($opening_rate, 2) }}</td>


                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>


                <td class="text-center">{{ number_format($opening_stock ?? 0.00, 2) }}</td>
                <td class="text-right">{{ number_format($opening_rate, 2) }}</td>
                <td class="text-right">{{ number_format($opening_rate, 2) }}</td>

            </tr>
        @endforelse

        @if (count($item_stock_details) == 0 && $opening_cost == 0)
            <tr>
                <td colspan="20" class="text-center">
                    <b class="text-danger">No records found!</b>
                </td>
            </tr>
        @endif
    @else
        <tr>
            <td colspan="20" class="text-center">
                <b class="text-danger">No records found!</b>
            </td>
        </tr>
    @endif

    </tbody>
</table>
</body>
</html>



