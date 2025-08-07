<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Money Receive for Flat ID:
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->flatID }},
        @else
            N/A,
        @endif
        Block:
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->blockName }},
        @else
            N/A,
        @endif
        Road:
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->roadName }},
        @else
            N/A,
        @endif
        Month:
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->pay_month }},
        @else
            N/A,
        @endif
        Year:
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->pay_year }}
        @else
            N/A
        @endif
    </title>

    <style>
        @page {
            header: page-header;
            footer: page-footer;
            sheet-size: A3;
            margin-top: 50px;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 50px;
        }

        .billing-info-container-left {
            width: 48%;
        }

        .billing-info-container-right {
            width: 48%;
            float: right;
            margin-top: -49.5%;
        }

        .company-logo {
            float: left;
            width: 20%;
        }

        .details {
            float: right;
            width: 80%;
        }

        .table {
            width: 98%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 2px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .vl {
            border-left: 1px solid rgb(70, 71, 70);
            height: 500px;
            left: -50%;
            margin-left: -3px;
            top: 0;
        }
    </style>
</head>



<body>
    @foreach ($generateBills as $index => $bill)
        @php
            $countLoop = $index + 1;
        @endphp




        <div class="page-container" style="margin-bottom: {{ $countLoop % 2 == 0 ? '330px' : '50px' }};">

            {{-- left side  --}}
            <div class="billing-info-container-left" style="border-right: 2px dotted black; padding-right: 20px;">

                <div class="company-logo">
                    @foreach ($companies as $company)
                        @php
                            ini_set('pcre.backtrack_limit', '10000000');
                            $logoPath = public_path('uploads/company/' . $company->logo);
                            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                            $base64Logo =
                                'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($logoPath));
                        @endphp
                        <img src="{{ $base64Logo }}" alt="" style="margin-top: -15px;">
                    @endforeach
                </div>

                <div class="details-1" style="margin-bottom: 10px;">
                    @foreach ($companies as $company)
                        <div class="company-name" style="margin-top: -10px;">
                            <h2 style="font-size: 30px;"><b>{{ $company->name }}</b></h2>
                        </div>
                        <div class="company-head-office" style="margin-top: -35px;">
                            <p>{{ $company->head_office }}</p>
                        </div>
                        <div class="company-contact-info" style="margin-top: -20px; margin-left: 40px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td>Tel: {{ $company->tel_number }} Cell: {{ $company->phone_number }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="company-contact-info">
                            <table style="width: 100%; text-align: center;">
                                <tr>
                                    <td style="width: 70%;">
                                        <h4 style="font-size: 24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Money Receipt</u>
                                        </h4>
                                    </td>
                                    <td style="width: 30%; text-align:right;">Payers Copy</td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                </div>

                <div class="customer-info" style="width: 100%;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 38%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>ID No:</b> {{ $bill->flatID }}
                                    </p>
                                </div>
                            </td>
                            <td style="width: 33%; text-align: center;">
                                <div class="id-no">
                                    <p><b>Bill No:</b> {{ $bill->bill_no }}</p>
                                </div>
                            </td>
                            <td style="width: 33%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Date:</b> {{ $bill->updated_at->format('d-M-Y') }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="customer-info" style="width: 100%;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 50%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Owner:</b> {{ $bill->ownerName }}
                                    </p>
                                </div>
                            </td>
                            <td style="width: 50%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Period:</b> {{ substr($bill->bill_month, 0, 3) }}
                                        {{ $bill->bill_year }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="customer-info" style="width: 100%;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 50%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Tenent:</b>
                                        {{ $bill->tenantName }}</p>
                                </div>
                            </td>
                            <td style="width: 50%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Type:</b> {{ $bill->typeName }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="customer-info" style="width: 100%; margin-bottom:10px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 28%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Block:</b> {{ $bill->blockName }}
                                    </p>
                                </div>
                            </td>
                            <td style="width: 28%; text-align: center;">
                                <div class="id-no">
                                    <p><b>Road:</b> {{ $bill->roadName }}</p>
                                </div>
                            </td>
                            <td style="width: 28%; text-align: center;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Plot/House:</b>
                                        {{ $bill->plotName }}</p>
                                </div>
                            </td>
                            <td style="width: 28%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Flat/Unit:</b> {{ $bill->unitName }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="customer-info" style="width: 100%; margin-left: 10px; margin-right: 5px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center">Particulars</th>
                                <th style="text-align: center">Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ $bill->typeName }}</td>
                                <td style="text-align: right">
                                    {{ $bill->bill_month == null ? '12 X ' . number_format($bill->charge_amount, 2) : number_format($bill->charge_amount, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Previous Due</td>

                                <td style="text-align: right">


                                    {{-- @php
                                        $currentMonth = $bill->bill_month;
                                        $currentYear = $bill->bill_year;

                                        $months = [
                                            'January' => 1,
                                            'February' => 2,
                                            'March' => 3,
                                            'April' => 4,
                                            'May' => 5,
                                            'June' => 6,
                                            'July' => 7,
                                            'August' => 8,
                                            'September' => 9,
                                            'October' => 10,
                                            'November' => 11,
                                            'December' => 12,
                                        ];

                                        $currentMonthNumber = $months[$currentMonth];

                                        $results = DB::table('generate_bills')->get();

                                        $filteredResults = $results->filter(function ($item) use (
                                            $currentMonthNumber,
                                            $currentYear,
                                        ) {
                                            $itemYear = $item->year;
                                            $itemMonthNumber = date('n', strtotime($item->month));

                                            return $itemYear > $currentYear ||
                                                ($itemYear == $currentYear && $itemMonthNumber > $currentMonthNumber);
                                        });
                                    @endphp --}}





                                    {{-- @php
                                        $currentMonth = $bill->bill_month;
                                        $currentYear = $bill->bill_year;

                                    
                                        $months = [
                                            'January' => 1,
                                            'February' => 2,
                                            'March' => 3,
                                            'April' => 4,
                                            'May' => 5,
                                            'June' => 6,
                                            'July' => 7,
                                            'August' => 8,
                                            'September' => 9,
                                            'October' => 10,
                                            'November' => 11,
                                            'December' => 12,
                                        ];


                                        $currentMonthNumber = $months[$currentMonth];

                                        $results = DB::table('generate_bills')->get();

                                        $filteredResults = $results->filter(function ($item) use (
                                            $currentMonthNumber,
                                            $currentYear,
                                        ) {
                                            $itemYear = $item->year;
                                            $itemMonth = $item->month;
                                            $itemMonthNumber = $itemMonth ? date('n', strtotime($itemMonth)) : null;

                                            if (is_null($itemMonth)) {
                                                return true;
                                            }

                                            return $itemYear > $currentYear ||
                                                ($itemYear == $currentYear && $itemMonthNumber > $currentMonthNumber);
                                        });
                                    @endphp --}}


                                    @php
                                        $currentMonth = $bill->bill_month;
                                        $currentYear = $bill->bill_year;

                                        $months = [
                                            'January' => 1,
                                            'February' => 2,
                                            'March' => 3,
                                            'April' => 4,
                                            'May' => 5,
                                            'June' => 6,
                                            'July' => 7,
                                            'August' => 8,
                                            'September' => 9,
                                            'October' => 10,
                                            'November' => 11,
                                            'December' => 12,
                                        ];

                                        $currentMonthNumber = $currentMonth ? $months[$currentMonth] : null;

                                        $results = DB::table('generate_bills')->get();

                                        $filteredResults = $results->filter(function ($item) use (
                                            $currentMonthNumber,
                                            $currentYear,
                                        ) {
                                            $itemYear = $item->year;
                                            $itemMonth = $item->month;
                                            $itemMonthNumber = $itemMonth ? date('n', strtotime($itemMonth)) : null;

                                            if (is_null($currentMonthNumber)) {
                                                return $itemYear > $currentYear;
                                            }

                                            if (is_null($itemMonthNumber)) {
                                                return true;
                                            }

                                            return $itemYear > $currentYear ||
                                                ($itemYear == $currentYear && $itemMonthNumber > $currentMonthNumber);
                                        });
                                    @endphp


                                    @if (isset($filteredResults))
                                        @php
                                            $totalDueAfterCurrentMonth = 0;
                                        @endphp
                                        @foreach ($filteredResults as $filteredResult)
                                            @if (
                                                $filteredResult->flats == $bill->flat_id &&
                                                    $filteredResult->monthlyDue != 0 &&
                                                    $filteredResult->payment_status == 0)
                                                @php
                                                    $totalDueAfterCurrentMonth += $filteredResult->monthlyDue;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif

                                    @php
                                        $flatTotalDue = DB::table('flats')
                                            ->where('flatID', $bill->flat_id)
                                            ->first();
                                    @endphp

                                    {{ number_format($flatTotalDue->totalDue - $totalDueAfterCurrentMonth, 2) }}

                                </td>

                            </tr>


                            <tr>
                                <td><b>Total Payable</b></td>
                                <td style="text-align: right; font-weight:bold;">
                                    @php
                                        $payAble =
                                            $bill->charge_amount +
                                            ($flatTotalDue->totalDue - $totalDueAfterCurrentMonth);
                                    @endphp
                                    {{ number_format($payAble, 2) }}
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>



                <div class="" style="margin-top: 20px;">
                    <span style="font-weight: bold">Cash/Cheque
                        No:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>Bank:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>Date:</span>
                </div>

                <div class="customer-info" style="width: 100%;">
                    <div style="display: flex; justify-content: space-between; margin-top: 50px;">
                        <div style="width: 45%; float:right;">
                            <div style="border-top: 1px solid #000;"></div>
                            Payer's Signature
                        </div>
                        <div style="width: 45%; ">
                            <div style="border-top: 1px solid #000;"></div>
                            Receiver Signature & Date
                        </div>
                    </div>
                </div>
                <div class="customer-info" style="width: 100%;">
                    <p>Powered By: Smart Software Ltd</p>
                </div>
            </div>



            {{-- Right side  --}}
            <div class="billing-info-container-right">
                <div class="company-logo">
                    @foreach ($companies as $company)
                        @php
                            ini_set('pcre.backtrack_limit', '10000000');
                            $logoPath = public_path('uploads/company/' . $company->logo);
                            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                            $base64Logo =
                                'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($logoPath));
                        @endphp
                        <img src="{{ $base64Logo }}" alt="">
                    @endforeach
                </div>

                <div class="details-1" style="margin-bottom: 10px;">
                    @foreach ($companies as $company)
                        <div class="company-name" style="margin-top: -10px;">
                            <h2 style="font-size: 30px;"><b>{{ $company->name }}</b></h2>
                        </div>
                        <div class="company-head-office" style="margin-top: -35px;">
                            <p>{{ $company->head_office }}</p>
                        </div>
                        <div class="company-contact-info" style="margin-top: -20px; margin-left: 40px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td>Tel: {{ $company->tel_number }} Cell: {{ $company->phone_number }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="company-contact-info">
                            <table style="width: 100%; text-align: center;">
                                <tr>
                                    <td style="width: 70%;">
                                        <h4 style="font-size: 24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Money Receipt</u>
                                        </h4>
                                    </td>
                                    <td style="width: 30%; text-align:right;">Payers Copy</td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                </div>

                <div class="customer-info" style="width: 100%;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 38%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>ID No:</b> {{ $bill->flatID }}
                                    </p>
                                </div>
                            </td>
                            <td style="width: 33%; text-align: center;">
                                <div class="id-no">
                                    <p><b>Bill No:</b> {{ $bill->bill_no }}</p>
                                </div>
                            </td>
                            <td style="width: 33%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Date:</b> {{ $bill->updated_at->format('d-M-Y') }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="customer-info" style="width: 100%;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 50%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Owner:</b>
                                        {{ $bill->ownerName }}</p>
                                </div>
                            </td>
                            <td style="width: 50%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Period:</b> {{ substr($bill->bill_month, 0, 3) }} {{ $bill->bill_year }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="customer-info" style="width: 100%;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 50%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Tenant:</b>
                                        {{ $bill->tenantName }}</p>
                                </div>
                            </td>
                            <td style="width: 50%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Type:</b> {{ $bill->typeName }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="customer-info" style="width: 100%; margin-bottom:10px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 28%; text-align: left;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Block:</b>
                                        {{ $bill->blockName }}</p>
                                </div>
                            </td>
                            <td style="width: 28%; text-align: center;">
                                <div class="id-no">
                                    <p><b>Road:</b> {{ $bill->roadName }}</p>
                                </div>
                            </td>
                            <td style="width: 28%; text-align: center;">
                                <div class="id-no">
                                    <p style="display: flex; align-items: center;"><b>Plot/House:</b>
                                        {{ $bill->plotName }}</p>
                                </div>
                            </td>
                            <td style="width: 28%; text-align: right;">
                                <div class="id-no">
                                    <p><b>Flat/Unit:</b> {{ $bill->unitName }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="customer-info" style="width: 100%; margin-left: 10px; margin-right: 5px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center">Particulars</th>
                                <th style="text-align: center">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $bill->typeName }}</td>
                                <td style="text-align: right">{{ number_format($bill->charge_amount, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Previous Due</td>
                                <td style="text-align: right">

                                    {{-- @php
                                        $currentMonth = $bill->bill_month;
                                        $currentYear = $bill->bill_year;

                                        $months = [
                                            'January' => 1,
                                            'February' => 2,
                                            'March' => 3,
                                            'April' => 4,
                                            'May' => 5,
                                            'June' => 6,
                                            'July' => 7,
                                            'August' => 8,
                                            'September' => 9,
                                            'October' => 10,
                                            'November' => 11,
                                            'December' => 12,
                                        ];

                                        $currentMonthNumber = $months[$currentMonth];

                                        $results = DB::table('generate_bills')->get();

                                        $filteredResults = $results->filter(function ($item) use (
                                            $currentMonthNumber,
                                            $currentYear,
                                        ) {
                                            $itemYear = $item->year;
                                            $itemMonthNumber = date('n', strtotime($item->month));

                                            return $itemYear > $currentYear ||
                                                ($itemYear == $currentYear && $itemMonthNumber > $currentMonthNumber);
                                        });
                                    @endphp --}}

                                    {{-- 
                                    @php
                                        $currentMonth = $bill->bill_month;
                                        $currentYear = $bill->bill_year;

                                        $months = [
                                            'January' => 1,
                                            'February' => 2,
                                            'March' => 3,
                                            'April' => 4,
                                            'May' => 5,
                                            'June' => 6,
                                            'July' => 7,
                                            'August' => 8,
                                            'September' => 9,
                                            'October' => 10,
                                            'November' => 11,
                                            'December' => 12,
                                        ];

                                        $currentMonthNumber = $months[$currentMonth];

                                        $results = DB::table('generate_bills')->get();

                                        $filteredResults = $results->filter(function ($item) use (
                                            $currentMonthNumber,
                                            $currentYear,
                                        ) {
                                            $itemYear = $item->year;
                                            $itemMonth = $item->month;
                                            $itemMonthNumber = $itemMonth ? date('n', strtotime($itemMonth)) : null;

                                            if (is_null($itemMonth)) {
                                                return true;
                                            }

                                            return $itemYear > $currentYear ||
                                                ($itemYear == $currentYear && $itemMonthNumber > $currentMonthNumber);
                                        });
                                    @endphp --}}

                                    @php
                                        $currentMonth = $bill->bill_month;
                                        $currentYear = $bill->bill_year;

                                        $months = [
                                            'January' => 1,
                                            'February' => 2,
                                            'March' => 3,
                                            'April' => 4,
                                            'May' => 5,
                                            'June' => 6,
                                            'July' => 7,
                                            'August' => 8,
                                            'September' => 9,
                                            'October' => 10,
                                            'November' => 11,
                                            'December' => 12,
                                        ];

                                        $currentMonthNumber = $currentMonth ? $months[$currentMonth] : null;

                                        $results = DB::table('generate_bills')->get();

                                        $filteredResults = $results->filter(function ($item) use (
                                            $currentMonthNumber,
                                            $currentYear,
                                        ) {
                                            $itemYear = $item->year;
                                            $itemMonth = $item->month;
                                            $itemMonthNumber = $itemMonth ? date('n', strtotime($itemMonth)) : null;

                                            if (is_null($currentMonthNumber)) {
                                                return $itemYear > $currentYear;
                                            }

                                            if (is_null($itemMonthNumber)) {
                                                return true;
                                            }

                                            return $itemYear > $currentYear ||
                                                ($itemYear == $currentYear && $itemMonthNumber > $currentMonthNumber);
                                        });
                                    @endphp


                                    @if (isset($filteredResults))
                                        @php
                                            $totalDueAfterCurrentMonth = 0;
                                        @endphp
                                        @foreach ($filteredResults as $filteredResult)
                                            @if (
                                                $filteredResult->flats == $bill->flat_id &&
                                                    $filteredResult->monthlyDue != 0 &&
                                                    $filteredResult->payment_status == 0)
                                                @php
                                                    $totalDueAfterCurrentMonth += $filteredResult->monthlyDue;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif

                                    @php
                                        $flatTotalDue = DB::table('flats')
                                            ->where('flatID', $bill->flat_id)
                                            ->first();
                                    @endphp

                                    {{ number_format($flatTotalDue->totalDue - $totalDueAfterCurrentMonth, 2) }}

                                </td>
                            </tr>
                            <tr>
                                <td><b>Total Payable</b></td>
                                <td style="text-align: right; font-weight:bold;">
                                    @php
                                        $payAble =
                                            $bill->charge_amount +
                                            ($flatTotalDue->totalDue - $totalDueAfterCurrentMonth);
                                    @endphp
                                    {{ number_format($payAble, 2) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="" style="margin-top: 20px;">
                    <span style="font-weight: bold">Cash/Cheque
                        No:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>Bank:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>Date:</span>
                </div>

                <div class="customer-info" style="width: 100%;">
                    <div style="display: flex; justify-content: space-between; margin-top: 50px;">
                        <div style="width: 45%; ">
                            <div style="border-top: 1px solid #000;"></div>
                            Receiver Signature & Date
                        </div>
                    </div>
                </div>

                <div class="customer-info" style="width: 100%;">
                    <p>Powered By: Smart Software Ltd</p>
                </div>
            </div>
            <hr>
        </div>
    @endforeach

</body>

</html>
