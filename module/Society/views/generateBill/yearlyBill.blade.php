@php
    $block =
        $generateBills->isNotEmpty() && $generateBills->first()->Block
            ? $generateBills->first()->Block->blockName
            : 'Unknown Block';
    $road =
        $generateBills->isNotEmpty() && $generateBills->first()->AssignRoad
            ? $generateBills->first()->AssignRoad->roadName
            : 'Unknown Road';
    $year =
        $generateBills->isNotEmpty() && $generateBills->first()->Assignyear
            ? $generateBills->first()->Assignyear->year
            : 'Unknown Year';
    $month =
        $generateBills->isNotEmpty() && $generateBills->first()->Assignmonth
            ? $generateBills->first()->Assignmonth->name
            : 'Unknown Month';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            Yearly Bill for block #{{ $block }}, road #{{ $road }}, year #{{ $year }}, month
            #{{ $month }}
        </title>
    </head>
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
        .header,
        .footer,
        .info-table td,
        .payment-table th,
        .payment-table td,
        .sign-table td {
            line-height: 1;
        }

        .receipt-container {
            border-collapse: collapse;
            width: 816px;
            height: 1344px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
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
            margin-top: 3px;
        }

        .info-table td,
        .payment-table th,
        .payment-table td,
        .sign-table td {
            border: 1px solid #000;
            padding: 2px;
            font-size: 10px;
        }

        .payment-table {
            margin: auto;
            border-collapse: collapse;
            text-align: left;
            width: 80%;
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
            font-size: 8px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
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

            .receipt-container {
                width: 100%;
                border: 1px solid #000;
                margin-bottom: 5px;
                padding: 5px;
                box-sizing: border-box;
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
                                            $defaultLogoPath = public_path('uploads/company/default.png');
                                            $path = file_exists($logoPath)
                                                ? $logoPath
                                                : (file_exists($defaultLogoPath)
                                                    ? $defaultLogoPath
                                                    : null);
                                            $base64Logo = $path
                                                ? 'data:image/' .
                                                    pathinfo($path, PATHINFO_EXTENSION) .
                                                    ';base64,' .
                                                    base64_encode(file_get_contents($path))
                                                : null;
                                        @endphp
                                        @if ($base64Logo)
                                            <img src="{{ $base64Logo }}" alt="Logo" class="company-logo">
                                        @endif
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
                                <h5 style="margin: 0; padding: 0;"><u>Yearly CP Service Bill</u></h5>
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
                            {{-- <td>
                                @php
                                    $previousDueSum = 0;

                                    if ($bill->year->year) {
                                        $currentYear = $bill->year->year;

                                        // Query for previous years' bills, excluding the current year
                                        $previous = DB::table('generate_bills')
                                            ->where('flats', $bill->flats)
                                            ->where('year', '<', $currentYear) // Only previous years
                                            ->pluck('monthlyDue');

                                        // Sum the previous dues
                                        $previousDueSum = $previous->sum();
                                    }
                                @endphp
                                {{ $previousDueSum }}
                            </td> --}}

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
                            <td align="right">
                                <b>
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
                                            $defaultLogoPath = public_path('uploads/company/default.png');
                                            $path = file_exists($logoPath)
                                                ? $logoPath
                                                : (file_exists($defaultLogoPath)
                                                    ? $defaultLogoPath
                                                    : null);
                                            $base64Logo = $path
                                                ? 'data:image/' .
                                                    pathinfo($path, PATHINFO_EXTENSION) .
                                                    ';base64,' .
                                                    base64_encode(file_get_contents($path))
                                                : null;
                                        @endphp
                                        @if ($base64Logo)
                                            <img src="{{ $base64Logo }}" alt="Logo" class="company-logo">
                                        @endif
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
                                <h5 style="margin: 0; padding: 0;"><u>Yearly CP Service Bill</u></h5>
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
                                {{-- @php
                                    $previousDueSum = 0;

                                    if ($bill->year) {
                                        $currentYear = $bill->year;

                                        // Query for previous years' bills, excluding the current year
                                        $previous = DB::table('generate_bills')
                                            ->where('flats', $bill->flats)
                                            ->where('year', '<', $currentYear) // Only previous years
                                            ->pluck('monthlyDue');

                                        // Sum the previous dues
                                        $previousDueSum = $previous->sum();
                                    }
                                @endphp
                                {{ $previousDueSum }} --}}


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
                            <td align="right">
                                <b>
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

        {{-- <hr style="border: 1px solid #000; width: 80%; margin: 20px auto;">

    @if (($index + 1) % 2 == 0)
    <hr> <!-- Adds a horizontal line after every two receipts -->
    <div style="page-break-after: always;"></div>
@endif --}}
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
