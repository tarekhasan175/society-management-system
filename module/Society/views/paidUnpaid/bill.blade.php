@php
$block = $generateBills->isNotEmpty() && $generateBills->first()->Block ? $generateBills->first()->Block->blockName : 'Unknown Block';
$road = $generateBills->isNotEmpty() && $generateBills->first()->AssignRoad ? $generateBills->first()->AssignRoad->roadName : 'Unknown Road';
$year = $generateBills->isNotEmpty() && $generateBills->first()->Assignyear ? $generateBills->first()->Assignyear->year : 'Unknown Year';
$month = $generateBills->isNotEmpty() && $generateBills->first()->Assignmonth ? $generateBills->first()->Assignmonth->name : 'Unknown Month';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        Bill for block #{{$block}}, road #{{$road}}, year #{{$year}}, month #{{$month}}
    </title>
    {{-- <title>Monthly Bill for block #
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->block }},
        @endif
        Road #
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->road }},
            {{ $generateBills->first()->month }},
            {{ $generateBills->first()->year }},
        @endif
    </title> --}}
    {{-- <style>
        @page {
            header: page-header;
            footer: page-footer;
            sheet-size: A3;
            margin-top: 50px;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 50px;
        }



        body {
            font-family: Arial, sans-serif;
            margin: 0;
            /* Remove default margins */
        }

        body,
        .receipt-container,
        .header,
        .footer,
        .info-table td,
        .payment-table th,
        .payment-table td,
        .sign-table td {
            line-height: 1;
            /* Reduce line height */
        }


        .receipt-container {
            width: 100%;
            border-collapse: collapse;
            height: 100vh;
            /* Make table full page height */
        }

        .receipt-row {
            display: table-row;
        }

        .receipt-cell {
            width: 50%;
            height: 48%;
            /* Adjust height to fit four on one page */
            padding: 5px;
            /* Reduce padding */
            vertical-align: top;
            border: 1px solid #000;
            box-sizing: border-box;
        }

        .header,
        .footer {
            text-align: center;
            font-weight: bold;
        }

        .info-table,
        .payment-table,
        .sign-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            /* Reduce margin */
        }

        .info-table td,
        .payment-table th,
        .payment-table td,
        .sign-table td {
            border: 1px solid #000;
            padding: 3px;
            /* Reduce padding */
            font-size: 12px;
            /* Reduce font size */
        }

        .payment-table th {
            font-weight: bold;
        }

        .sign-table td {
            border: none;
            padding-top: 15px;
        }

        .company-logo {
            max-height: 80px;
            max-width: 80px;
        }

        .copyright {
            margin: 0;
            font-size: 10px;
            /* Reduce font size */
        }

        button {
            background-color: #4CAF50;
            /* Green */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        .receipt-container {
            width: 100%;
            border: 1px solid #000;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
        }

        /* Print-specific styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact;
                /* Ensures color accuracy for print */
            }

            /* Force each group of 4 tables to fit on a single page */
            .page {
                page-break-after: always;
                /* Ensures no content spills onto the next page */
                display: grid;
                grid-template-rows: repeat(4, auto);
                /* Ensures exactly 4 tables per page */
                height: 100vh;
                /* Makes each page occupy the full height */
                margin: 0;
            }

            .receipt-container {
                break-inside: avoid;
                /* Prevents tables from splitting across pages */
            }
        }
    </style> --}}

    <style>
        @page {
            header: page-header;
            footer: page-footer;
            sheet-size: legal;
            margin-top: 20px;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        body,
        .receipt-container,
        .footer,
        .info-table td,
        .payment-table th,
        .payment-table td,
        .sign-table td {
            line-height: 0.7;
        }

        .header{
            line-height: 1;
        }

        .receipt-container {
            /* width: 100%;
            border-collapse: collapse;
            height: 100vh; */

            border-collapse: collapse;
            width: 816px;   /* 8.5 inches in pixels */
            height: 1344px; /* 14 inches in pixels */
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);    /* Optional shadow for realism */
            border: 1px solid #ddd; /* Optional border */
        }

        .receipt-row {
            display: table-row;
        }

        .receipt-cell {
            width: 50%;
            height: 48%;
            padding: 5px;
            vertical-align: top;
            border: 1px solid #000;
            box-sizing: border-box;
        }

        .header,
        .footer {
            text-align: center;
            font-weight: bold;
        }

        .info-table,
        .sign-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .payment-table {
            margin: auto;
            /* Centers the table horizontally */
            border-collapse: collapse;
            text-align: left;
            width: 80%;
        }

        .info-table td,
        .payment-table th,
        .payment-table td,
        .sign-table td {
            border: 1px solid #000;
            padding: 2px;
            font-size: 10px;
        }

        .payment-table th {
            text-align: center;
            font-weight: bold;
        }

        .sign-table td {
            border: none;
            padding-top: 10px;
        }

        .company-logo {
            margin: 0 !important;
            padding: 0 !important;
            max-height: 80px;
            max-width: 80px;
        }

        .copyright {
            margin: 0;
            font-size: 9px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 3px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        @media print {
            .no-print, .no-print * {
                display: none !important;
            }

            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact;
            }

            .page {
                page-break-after: always;
                display: grid;
                grid-template-rows: repeat(4, auto);
                height: 100vh;
                margin: 0;
            }

            .receipt-container {
                break-inside: avoid;
            }
        }
    </style>
</head>


{{-- @dd($previousDueStatus); --}}


<body>

    <div class="no-print">
        <button onclick="window.print();">Print</button>
    </div>


    @foreach ($generateBills as $index => $bill)
        <table class="receipt-container" style="height: 100px;">
            <tr class="receipt-row">
                <td class="receipt-cell">
                    <table class="header" style="width: 100%;border-collapse: collapse; 0;margin: 0;">
                        <tr>
                            <td style="width: 20%; padding: 0;  margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        @php
                                            ini_set('pcre.backtrack_limit', '10000000');
                                            $logoPath = public_path('uploads/company/' . $company->logo);
                                            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                                            $base64Logo =
                                                'data:image/' .
                                                $type .
                                                ';base64,' .
                                                base64_encode(file_get_contents($logoPath));
                                        @endphp
                                        <img src="{{ $base64Logo }}" alt="Logo" class="company-logo">
                                    @endforeach
                                </div>
                            </td>
                            <td colspan="8" style="text-align: center; padding: 0; margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        <strong>{{ $company->name }}</strong><br />
                                        <p style="font-weight: normal; margin: 0; font-size:10px">
                                            <span style="font-weight: lighter;">
                                                {{ $company->head_office }} <br />
                                                Tel: {{ $company->tel_number }} Cell: {{ $company->phone_number }}
                                            </span>
                                        </p>
                                    @endforeach
                                </div>
                            </td>
                            <td style="width: 20%; padding: 0"></td>
                        </tr>
                    </table>

                    <table class="office-copy" style="width: 100%; border: none; height: 8px;">
                        <tr>
                            <td style="width: 20%"></td>
                            <td style="text-align: center; ">
                                @if ($bill->month == null)
                                    <h5 style="margin: 0; padding: 0;"><u>Yearly CP Service Bill</u></h5>
                                @else
                                    <h5 style="margin: 0; padding: 0;"><u>Monthly CP Service Bill</u></h5>
                                @endif
                            </td>
                            <td style="text-align: right;  width: 20%">
                                <h6 style="margin: 0; padding: 0;">Office Copy</h6>
                            </td>
                        </tr>
                    </table>

                    <table class="info-table" style="width: 100%; border-collapse: collapse; border: none">
                        <tr>


                            <td colspan="2" style="width: 50%; border: none; text-align: left">
                                <b>ID No:</b> {{ $bill->flat->flatID }}
                            </td>
                            <td style="width: 20%; text-align: center; border: none">
                                <b>Bill No:</b> {{ $bill->billNo }}
                            </td>
                            <td style="width: 30%; border: none; text-align: right">
                                <b>Period:</b>
                                {{ $bill->month_id ? substr($bill->month->name, 0, 3) : '' }}
                                {{ $bill->year ? $bill->year->year : '' }}
                            </td>
                        </tr>


                        <tr>
                            <td colspan="2" style="width: 40%; border: none; text-align: left">
                                <b>Owner:</b> {{ $bill->flat->ownerName }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right">
                                <b>Issue Date:</b> {{ $bill->updated_at->format('d-M-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 30%; border: none; text-align: left">
                                <b>Tenant:</b> {{ $bill->flat->tenantName }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right">
                                <b>Type:</b> {{ substr($bill->gettype->typeName, 0, 1) }}
                                {{-- {{ substr($bill->typeName, 0, 1) }} --}}
                            </td>
                        </tr>




                        <tr>
                            <td style="width: 25%; border: none; text-align: left">
                                <b>Block:</b> {{ $bill->AssignBlock->blockName }}
                            </td>
                            <td style="width: 25%; text-align: left; border: none">
                                <b>Road:</b> {{ $bill->AssignRoad->roadName }}
                            </td>
                            <td style="width: 25%; text-align: center; border: none">
                                <b>Plot/House:</b> {{ $bill->AssignPlot->plotName }}
                            </td>
                            <td style="width: 25%; border: none; text-align: right">
                                <b>Flat/Unit:</b> {{ $bill->units }}
                            </td>
                        </tr>
                    </table>

                    <table class="payment-table">
                        <tr>
                            <th>Particulars</th>
                            <th>Amount</th>
                        </tr>

                        @if ($bill->month == null)
                            <tr>
                                <td>CP Service Charge</td>
                                <td align="right">
                                    @php
                                        // Check if the bill has a `year` value and calculate for the current year
                                        $cpServiceCharge = 0;
                                        if ($bill->year->year) {
                                            // Multiply the monthly amount by 12 to get the annual service charge for the current year
                                            // $cpServiceCharge = $bill->amount * 12;
                                             $cpServiceCharge = $bill->monthlyDue;
                                        }
                                    @endphp
                                    {{ $cpServiceCharge }}
                                </td>
                            </tr>
                            <tr>
                                <td>Previous Due</td>
                                <td align="right">
                                    @php
                                        $previousDueSum = 0;

                                        if ($bill->year) {
                                            $currentYear = $bill->year->year;

                                            // Get previous bills for the same flat but excluding the current year
                                            $previousBills = $bill->flat
                                                ->generateBills() // Assuming GenerateBill has a 'flat' relationship
                                                ->whereHas('year', function ($query) use ($currentYear) {
                                                    $query->where('year', '<', $currentYear); // Filter by year from the related 'Year' model
                                                })
                                                ->get();

                                            // Sum the previous dues
                                            $previousDueSum = $previousBills->sum('monthlyDue');
                                        }
                                    @endphp
                                    {{ $previousDueSum }}
                                </td>
                            </tr>
                            <tr>
                                <td>Advance</td>
                                <td align="right">{{ $bill->flat->advance }}</td>
                            </tr>
                            <tr>
                                <td><b>Total Payable</b></td>
                                <td align="right"><b>
                                        @php
                                            // Calculate Total Due (CP Service Charge + Previous Due)
                                            $totalDue = $cpServiceCharge + $previousDueSum;

                                            // Deduct Advance from Total Due (if applicable)
                                            $totalPayable = $totalDue - $bill->advance;

                                            // Ensure total payable is not negative
                                            if ($totalPayable < 0) {
                                                $totalPayable = 0; // If advance exceeds due, total payable is zero
                                            }
                                        @endphp
                                        {{ $totalPayable }}
                                    </b>
                                </td>
                            </tr>
                        @endif






                        {{-- Table for month and year both come  --}}
                        @if ($bill->month != null)
                            <tr>
                                <td>CP Service Charge</td>
                                <td align="right">
                                    {{-- {{ $bill->amount }} --}}
                                    {{ $bill->monthlyDue }}
                                </td>
                            </tr>
                            <tr>
                                <td>Previous Due</td>
                                <td align="right">
                                    @php
                                        $previousDueSum = 0;

                                        if ($bill->created_at) {
                                            // Get year and month of the current bill
                                            $currentYear = $bill->year->year; // Assuming 'year' is a relationship with the 'year' table
                                            $currentMonth = $bill->month->name; // Assuming 'month' is a relationship that gives you the month name (e.g. 'January')

                                            // Array of months in order
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

                                            // Determine the index of the current month
                                            $currentMonthIndex = array_search($currentMonth, $months);

                                            // Query for previous bills based on year and month
                                            $previous = DB::table('generate_bills')
                                                ->join('months', 'generate_bills.month_id', '=', 'months.id') // Join with months table to get month names
                                                ->join('years', 'generate_bills.year_id', '=', 'years.id') // Join with years table to get the real year
                                                ->where('generate_bills.flats', $bill->flats)
                                                ->where(function ($query) use (
                                                    $currentYear,
                                                    $currentMonthIndex,
                                                    $months
                                                ) {
                                                    $query
                                                        // Include all months of previous years
                                                        ->where('years.year', '<', $currentYear)
                                                        ->orWhere(function ($query) use (
                                                            $currentYear,
                                                            $currentMonthIndex,
                                                            $months
                                                        ) {
                                                            // If the year is the same, include only months before the current month
                                                            $query
                                                                ->where('years.year', $currentYear)
                                                                ->whereIn(
                                                                    'months.name',
                                                                    array_slice($months, 0, $currentMonthIndex),
                                                                ); // Exclude current month
                                                        });
                                                })
                                                ->pluck('monthlyDue'); // Fetch all the previous monthly dues

                                            // Sum all the monthly dues from previous years and current year (excluding current month)
                                            $previousDueSum = $previous->sum();
                                        }
                                    @endphp

                                    {{ $previousDueSum }}
                                </td>
                            </tr>
                            <tr>
                                <td>Advance</td>
                                <td align="right">{{ $bill->flat->advance }}</td>
                            </tr>
                            <tr>
                                <td><b>Total Payable</b></td>
                                <td align="right"><b>
                                        @php
                                            // $totalDue = $bill->amount + $previousDueSum;
                                            $totalDue = $bill->monthlyDue + $previousDueSum;
                                            $totalPayable = max(0, $totalDue - $bill->advance); // Ensure total payable is not negative
                                        @endphp
                                        {{ $totalPayable }}</b></td>
                            </tr>
                        @endif
                    </table>
                    <table style="margin-top: 15px;">
                        <tr>
                            <td>
                                <div class="footer"><u>Authorised By: </u></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="copyright">
                                    <h5>Powered By: Smart Software Ltd</h5>
                                </div>
                            </td>
                        </tr>

                    </table>
                </td>

                <td class="receipt-cell">
                    <table class="header" style="width: 100%;border-collapse: collapse; 0;margin: 0;">
                        <tr>
                            <td style="width: 20%; padding: 0;  margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        @php
                                            ini_set('pcre.backtrack_limit', '10000000');
                                            $logoPath = public_path('uploads/company/' . $company->logo);
                                            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                                            $base64Logo =
                                                'data:image/' .
                                                $type .
                                                ';base64,' .
                                                base64_encode(file_get_contents($logoPath));
                                        @endphp
                                        <img src="{{ $base64Logo }}" alt="Logo" class="company-logo">
                                    @endforeach
                                </div>
                            </td>
                            <td colspan="8" style="text-align: center; padding: 0; margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        <strong>{{ $company->name }}</strong><br />
                                        <p style="font-weight: normal; margin: 0; font-size:10px">
                                            <span style="font-weight: lighter;">
                                                {{ $company->head_office }} <br />
                                                Tel: {{ $company->tel_number }} Cell: {{ $company->phone_number }}
                                            </span>
                                        </p>
                                    @endforeach
                                </div>
                            </td>
                            <td style="width: 20%; padding: 0"></td>
                        </tr>
                    </table>

                    <table class="office-copy" style="width: 100%; border: none; height: 8px;">
                        <tr>
                            <td style="width: 20%"></td>
                            <td style="text-align: center; ">
                                @if ($bill->month == null)
                                    <h5 style="margin: 0; padding: 0;"><u>Yearly CP Service Bill</u></h5>
                                @else
                                    <h5 style="margin: 0; padding: 0;"><u>Monthly CP Service Bill</u></h5>
                                @endif
                            </td>
                            <td style="text-align: right;  width: 20%">
                                <h6 style="margin: 0; padding: 0;">Payer's Copy</h6>
                            </td>
                        </tr>
                    </table>

                    <table class="info-table" style="width: 100%; border-collapse: collapse; border: none">
                        <tr>


                            <td colspan="2" style="width: 50%; border: none; text-align: left">
                                <b>ID No:</b> {{ $bill->flat->flatID }}
                            </td>
                            <td style="width: 20%; text-align: center; border: none">
                                <b>Bill No:</b> {{ $bill->billNo }}
                            </td>
                            <td style="width: 30%; border: none; text-align: right">
                                <b>Period:</b>
                                {{ $bill->month_id ? substr($bill->month->name, 0, 3) : '' }}
                                {{ $bill->year ? $bill->year->year : '' }}
                            </td>
                        </tr>


                        <tr>
                            <td colspan="2" style="width: 40%; border: none; text-align: left">
                                <b>Owner:</b> {{ $bill->flat->ownerName }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right">
                                <b>Issue Date:</b> {{ $bill->updated_at->format('d-M-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 30%; border: none; text-align: left">
                                <b>Tenant:</b> {{ $bill->flat->tenantName }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right">
                                <b>Type:</b> {{ substr($bill->gettype->typeName, 0, 1) }}
                                {{-- {{ substr($bill->typeName, 0, 1) }} --}}
                            </td>
                        </tr>




                        <tr>
                            <td style="width: 25%; border: none; text-align: left">
                                <b>Block:</b> {{ $bill->AssignBlock->blockName }}
                            </td>
                            <td style="width: 25%; text-align: left; border: none">
                                <b>Road:</b> {{ $bill->AssignRoad->roadName }}
                            </td>
                            <td style="width: 25%; text-align: center; border: none">
                                <b>Plot/House:</b> {{ $bill->AssignPlot->plotName }}
                            </td>
                            <td style="width: 25%; border: none; text-align: right">
                                <b>Flat/Unit:</b> {{ $bill->units }}
                            </td>
                        </tr>
                    </table>

                    <table class="payment-table">
                        <tr>
                            <th>Particulars</th>
                            <th>Amount</th>
                        </tr>

                        @if ($bill->month == null)
                            <tr>
                                <td>CP Service Charge</td>
                                <td align="right">
                                    @php
                                        // Check if the bill has a `year` value and calculate for the current year
                                        $cpServiceCharge = 0;
                                        if ($bill->year->year) {
                                            // Multiply the monthly amount by 12 to get the annual service charge for the current year
                                            // $cpServiceCharge = $bill->amount * 12;
                                             $cpServiceCharge = $bill->monthlyDue;
                                        }
                                    @endphp
                                    {{ $cpServiceCharge }}
                                </td>
                            </tr>
                            <tr>
                                <td>Previous Due</td>
                                <td align="right">
                                    @php
                                        $previousDueSum = 0;

                                        if ($bill->year) {
                                            $currentYear = $bill->year->year;

                                            // Get previous bills for the same flat but excluding the current year
                                            $previousBills = $bill->flat
                                                ->generateBills() // Assuming GenerateBill has a 'flat' relationship
                                                ->whereHas('year', function ($query) use ($currentYear) {
                                                    $query->where('year', '<', $currentYear); // Filter by year from the related 'Year' model
                                                })
                                                ->get();

                                            // Sum the previous dues
                                            $previousDueSum = $previousBills->sum('monthlyDue');
                                        }
                                    @endphp
                                    {{ $previousDueSum }}
                                </td>
                            </tr>
                            <tr>
                                <td>Advance</td>
                                <td align="right">{{ $bill->flat->advance }}</td>
                            </tr>
                            <tr>
                                <td><b>Total Payable</b></td>
                                <td align="right"><b>
                                        @php
                                            // Calculate Total Due (CP Service Charge + Previous Due)
                                            $totalDue = $cpServiceCharge + $previousDueSum;

                                            // Deduct Advance from Total Due (if applicable)
                                            $totalPayable = $totalDue - $bill->advance;

                                            // Ensure total payable is not negative
                                            if ($totalPayable < 0) {
                                                $totalPayable = 0; // If advance exceeds due, total payable is zero
                                            }
                                        @endphp
                                        {{ $totalPayable }}
                                    </b>
                                </td>
                            </tr>
                        @endif






                        {{-- Table for month and year both come  --}}
                        @if ($bill->month != null)
                            <tr>
                                <td>CP Service Charge</td>
                                <td align="right">
                                    {{-- {{ $bill->amount }} --}}
                                    {{ $bill->monthlyDue }}
                                </td>
                            </tr>
                            <tr>
                                <td>Previous Due</td>
                                <td align="right">
                                    @php
                                        $previousDueSum = 0;

                                        if ($bill->created_at) {
                                            // Get year and month of the current bill
                                            $currentYear = $bill->year->year; // Assuming 'year' is a relationship with the 'year' table
                                            $currentMonth = $bill->month->name; // Assuming 'month' is a relationship that gives you the month name (e.g. 'January')

                                            // Array of months in order
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

                                            // Determine the index of the current month
                                            $currentMonthIndex = array_search($currentMonth, $months);

                                            // Query for previous bills based on year and month
                                            $previous = DB::table('generate_bills')
                                                ->join('months', 'generate_bills.month_id', '=', 'months.id') // Join with months table to get month names
                                                ->join('years', 'generate_bills.year_id', '=', 'years.id') // Join with years table to get the real year
                                                ->where('generate_bills.flats', $bill->flats)
                                                ->where(function ($query) use (
                                                    $currentYear,
                                                    $currentMonthIndex,
                                                    $months
                                                ) {
                                                    $query
                                                        // Include all months of previous years
                                                        ->where('years.year', '<', $currentYear)
                                                        ->orWhere(function ($query) use (
                                                            $currentYear,
                                                            $currentMonthIndex,
                                                            $months
                                                        ) {
                                                            // If the year is the same, include only months before the current month
                                                            $query
                                                                ->where('years.year', $currentYear)
                                                                ->whereIn(
                                                                    'months.name',
                                                                    array_slice($months, 0, $currentMonthIndex),
                                                                ); // Exclude current month
                                                        });
                                                })
                                                ->pluck('monthlyDue'); // Fetch all the previous monthly dues

                                            // Sum all the monthly dues from previous years and current year (excluding current month)
                                            $previousDueSum = $previous->sum();
                                        }
                                    @endphp

                                    {{ $previousDueSum }}
                                </td>
                            </tr>
                            <tr>
                                <td>Advance</td>
                                <td align="right">{{ $bill->flat->advance }}</td>
                            </tr>
                            <tr>
                                <td><b>Total Payable</b></td>
                                <td align="right"><b>
                                        @php
                                            // $totalDue = $bill->amount + $previousDueSum;
                                            $totalDue = $bill->monthlyDue + $previousDueSum;
                                            $totalPayable = max(0, $totalDue - $bill->advance); // Ensure total payable is not negative
                                        @endphp
                                        {{ $totalPayable }}</b></td>
                            </tr>
                        @endif
                    </table>
                    <table style="margin-top: 15px;">
                        <tr>
                            <td>
                                <div class="footer"><u>Authorised By: </u></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="copyright">
                                    <h5>Powered By: Smart Software Ltd</h5>
                                </div>
                            </td>
                        </tr>

                    </table>
                </td>


            </tr>
        </table>
    @endforeach

    {{-- <table>
        <tr>
            <td>
                @isset($generateBills)
                    {{ $generateBills->links('custom') }}
                @endisset
            </td>
        </tr>
    </table> --}}
</body>

</html>
