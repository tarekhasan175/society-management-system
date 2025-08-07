<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly Bill for block #
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->block }},
        @endif
        Road #
        @if ($generateBills->isNotEmpty())
            {{ $generateBills->first()->road }},
            {{ $generateBills->first()->month }},
            {{ $generateBills->first()->year }},
        @endif
    </title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
            sheet-size: A4;
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
    </style>
</head>

<body>
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
                                            if (function_exists('ini_set')) {
                                                ini_set('pcre.backtrack_limit', '10000000');
                                            }

                                            $logoPath = public_path('uploads/company/' . $company->logo);

                                            if (!file_exists($logoPath) || !$company->logo) {
                                                $logoPath = public_path('uploads/company/default.png');
                                            }

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
                                        <p style="font-weight: normal; margin: 0; font-size:12px">
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
                                <h4 style="margin: 0; padding: 0;"><u>Monthly CP Service Bill</u></h4>
                            </td>
                            <td style="text-align: right;  width: 20%">
                                <h6 style="margin: 0; padding: 0;">Office Copy</h6>
                            </td>
                        </tr>
                    </table>

                    <table class="info-table" style="width: 100%; border-collapse: collapse; border: none">
                        <tr>


                            <td style="width: 30%; border: none; text-align: left">
                                <b>ID No:</b> {{ $bill->flat->flatID }}
                            </td>
                            <td colspan="2" style="width: 30%; text-align: center; border: none">
                                <b>Bill No:</b> {{ $bill->billNo }}
                            </td>
                            <td style="width: 30%; border: none; text-align: right">
                                <b>Period:</b>
                                {{ $bill->month ? substr($bill->month->month, 0, 3) : '' }}
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
                        <tr>
                            <td>CP Service Charge</td>
                            <td>{{ $bill->amount }}</td>
                        </tr>
                        <tr>
                            <td>Previous Due</td>
                            <td>
                                {{-- @php
                                $previousDueSum = 0;

                                if ($bill->created_at) {
                                    // Get year and month of the current bill
                                    $currentYear = $bill->year->year;
                                    $currentMonth = $bill->month->month;

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
                                        ->where('flats', $bill->flats)
                                        ->where(function ($query) use ($currentYear, $currentMonthIndex, $months) {
                                            $query
                                                ->where('year', '<=', $currentYear)
                                                ->where(function ($query) use (
                                                    $currentYear,
                                                    $currentMonthIndex,
                                                    $months
                                                ) {
                                                    // Get all previous months (less than the current month index)
                                                    $query
                                                        ->where(function ($subQuery) use (
                                                            $currentYear,
                                                            $currentMonthIndex,
                                                            $months
                                                        ) {
                                                            // Select previous months of the current year
                                                            for ($i = 0; $i < $currentMonthIndex; $i++) {
                                                                $subQuery->orWhere(function ($q) use (
                                                                    $currentYear,
                                                                    $months,
                                                                    $i
                                                                ) {
                                                                    $q->where('year', $currentYear)->where(
                                                                        'month',
                                                                        $months[$i]
                                                                    );
                                                                });
                                                            }
                                                        })
                                                        ->orWhere(function ($subQuery) use ($currentYear) {
                                                            // Select all months of previous years
                                                            $subQuery->where('year', '<', $currentYear);
                                                        });
                                                });
                                        })
                                        ->pluck('monthlyDue');

                                    // Sum the previous dues
                                    $previousDueSum = $previous->sum();
                                }
                            @endphp

                                {{ $previousDueSum }} --}}

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
                                            ->where(function ($query) use ($currentYear, $currentMonthIndex, $months) {
                                                $query
                                                    // Include all months of previous years
                                                    ->where('years.year', '<', $currentYear)
                                                    ->orWhere(function ($query) use (
                                                        $currentYear,
                                                        $currentMonthIndex,
                                                        $months,
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
                            <td>{{ $bill->advance }}</td>
                        </tr>
                        <tr>
                            <td><b>Total Payable</b></td>
                            <td><b> @php
                                $totalDue = $bill->amount + $previousDueSum;
                                $totalPayable = max(0, $totalDue - $bill->advance); // Ensure total payable is not negative
                            @endphp
                                    {{ $totalPayable }}</b></td>
                        </tr>
                    </table>

                    {{-- <table class="sign-table" style="width: 100%; border-collapse: collapse">
                        <tr>
                            <td style="width: 30%">Cash/Cheque No:</td>
                            <td style="width: 30%">Bank:</td>
                            <td style="width: 30%">Date:</td>
                        </tr>
                        <tr>
                            <td style="width: 45%">
                                <span
                                    style="
                      border-bottom: 1px solid #000;
                      width: 100%;
                      display: inline-block;
                    "></span>Receiver
                                Signature & Date:
                            </td>
                            <td style="width: 10%"></td>
                            <td style="width: 45%">
                                <span
                                    style="
                      border-bottom: 1px solid #000;
                      width: 100%;
                      display: inline-block;
                    "></span>
                                Payer's Signature:
                            </td>
                        </tr>
                    </table> --}}
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

                    {{-- <div class="footer">*** Thank You For Your Payment ***</div> --}}
                </td>

                <td class="receipt-cell">
                    <table class="header" style="width: 100%;border-collapse: collapse;padding: 0;margin: 0;">
                        <tr>
                            <td style="width: 20%; padding: 0;  margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        @php
                                            if (function_exists('ini_set')) {
                                                ini_set('pcre.backtrack_limit', '10000000');
                                            }

                                            $logoPath = public_path('uploads/company/' . $company->logo);

                                            if (!file_exists($logoPath) || !$company->logo) {
                                                $logoPath = public_path('uploads/company/default.png');
                                            }

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
                                        <p style="font-weight: normal; margin: 0; font-size:12px">
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
                                <h4 style="margin: 0; padding: 0;"><u>Monthly CP Service Bill</u></h4>
                            </td>
                            <td style="text-align: right;  width: 20%">
                                <h6 style="margin: 0; padding: 0;">Payer's Copy</h6>
                            </td>
                        </tr>
                    </table>

                    <table class="info-table" style="width: 100%; border-collapse: collapse; border: none">
                        <tr>


                            <td style="width: 30%; border: none; text-align: left">
                                <b>ID No:</b> {{ $bill->flat->flatID }}
                            </td>
                            <td colspan="2" style="width: 30%; text-align: center; border: none">
                                <b>Bill No:</b> {{ $bill->billNo }}
                            </td>
                            <td style="width: 30%; border: none; text-align: right">
                                <b>Period:</b>
                                {{ $bill->month ? substr($bill->month->month, 0, 3) : '' }}
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
                        <tr>
                            <td>CP Service Charge</td>
                            <td>{{ $bill->amount }}</td>
                        </tr>
                        <tr>
                            <td>Previous Due</td>
                            <td>




                                @php
                                    $previousDueSum = 0;

                                    if ($bill->created_at) {
                                      
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
                                            ->where(function ($query) use ($currentYear, $currentMonthIndex, $months) {
                                                $query
                                                    // Include all months of previous years
                                                    ->where('years.year', '<', $currentYear)
                                                    ->orWhere(function ($query) use (
                                                        $currentYear,
                                                        $currentMonthIndex,
                                                        $months,
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
                            <td>{{ $bill->advance }}</td>
                        </tr>
                        <tr>
                            <td><b>Total Payable</b></td>
                            <td><b> @php
                                $totalDue = $bill->amount + $previousDueSum;
                                $totalPayable = max(0, $totalDue - $bill->advance); // Ensure total payable is not negative
                            @endphp
                                    {{ $totalPayable }}</b></td>
                        </tr>
                    </table>

                    {{-- <table class="sign-table" style="width: 100%; border-collapse: collapse">
                        <tr>
                            <td style="width: 30%">Cash/Cheque No:</td>
                            <td style="width: 30%">Bank:</td>
                            <td style="width: 30%">Date:</td>
                        </tr>
                        <tr>
                            <td style="width: 45%">
                                <span
                                    style="
                      border-bottom: 1px solid #000;
                      width: 100%;
                      display: inline-block;
                    "></span>Receiver
                                Signature & Date:
                            </td>
                            <td style="width: 10%"></td>
                            <td style="width: 45%">
                                <span
                                    style="
                      border-bottom: 1px solid #000;
                      width: 100%;
                      display: inline-block;
                    "></span>
                                Payer's Signature:
                            </td>
                        </tr>
                    </table> --}}
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

                    {{-- <div class="footer">*** Thank You For Your Payment ***</div> --}}
                </td>
            </tr>

        </table>

        {{-- <hr style="border: 1px solid #000; width: 80%; margin: 20px auto;">

        @if (($index + 1) % 2 == 0)
        <hr> <!-- Adds a horizontal line after every two receipts -->
        <div style="page-break-after: always;"></div>
    @endif --}}
    @endforeach


    {{-- <tr>
            <td>
                @isset($generateBills)
                    {{ $generateBills->links('custom') }}
                @endisset
            </td>
        </tr> --}}

    <a href="{{ url()->current() }}?export_type=export_pdf&{{ request()->getQueryString() }}" target="_blank"
        style="margin-right: 5px">
        <img src="{{ asset('assets/images/export-icons/pdf-icon.png') }}">
    </a>


</body>

</html>
