<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banani Society, Dhaka Report</title>
    <style>
        @media print {
            /* @page {
                size: legal;
                margin: 20mm;
            } */

            @page {
                header: page-header;
                footer: page-footer;
                sheet-size: legal;
                margin-top: 20px;
                margin-left: 15px;
                margin-right: 15px;
                margin-bottom: 20px;
            }

            body {
                font-family: Arial, sans-serif;
                margin: 40px;
            }

            .header {
                text-align: center;
            }

            .header1 {
                text-align: right;
                margin: 0;
            }

            .header img {
                width: 100px;
            }

            .company-logo {
                max-height: 100px;
                max-width: 100px;
            }

            .header h1 {
                margin: 0;
            }

            .header p {
                margin: 0;
            }

            .details {
                margin-top: 20px;
            }

            .details p {
                margin: 5px 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .details-table {
                border: none;
            }

            .details-table th,
            .details-table td {
                border: none;
                text-align: left;
            }

            .report-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .report-table th,
            .report-table td {
                border: 1px solid #ddd;
                padding: 8px 10px;
                font-size: 12px;
                text-align: left;
            }

            .report-table th {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            .report-table tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .totals-row {
                font-weight: bold;
                background-color: #e6f7ff;
            }

        }
    </style>

</head>

<body>
    <div class="header1">
        <p style="font-size: 12px;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    </div>

    {{-- <div style="display: flex;">

        @if (isset($companies) && $companies->isNotEmpty())
            @foreach ($companies as $company)
                @php
                    ini_set('pcre.backtrack_limit', '10000000');
                    $logoPath = public_path('uploads/company/' . $company->logo);
                    $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                    $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($logoPath));
                @endphp
                <img alt="Banani Society Logo" height="auto" width="100" src="{{ $base64Logo }}"
                    alt="{{ $company->name }} Logo" width="100" style="float: left; margin-right: 50px;">
            @endforeach
        @endif

        <h2 style="margin: 0; padding-left: 10px;">
            @if ($companies)
                @foreach ($companies as $company)
                    {{ $company->name }}{{ !$loop->last ? ', ' : '' }}
                    <p style="font-weight: normal; margin: 0; font-size:12px">
                        <span style="font-weight: lighter;">
                            {{ $company->head_office }} <br />
                            Tel: {{ $company->tel_number }} Cell: {{ $company->phone_number }}
                        </span>
                    </p>
                @endforeach
            @endif
        </h2>
    </div> --}}

    <table class="header" style="width: 100%;border-collapse: collapse; 0;margin: 0;">
        <tr>
            <td style="width: 20%; padding: 0;  margin: 0;">
                <div>
                    {{-- @foreach ($companies as $company)
                        @php
                            ini_set('pcre.backtrack_limit', '10000000');
                            $logoPath = public_path('uploads/company/' . $company->logo);
                            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                            $base64Logo =
                                'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($logoPath)) ?? '';
                        @endphp
                        <img src="{{ $base64Logo }}" alt="Logo" class="company-logo">
                    @endforeach --}}
                </div>
            </td>
            <td colspan="8" style="text-align: center; padding: 0; margin: 0;">
                <div>
                    @foreach ($companies as $company)
                        <h2>
                            <strong>{{ $company->name }}</strong><br />
                        </h2>

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

    <div class="details" style="margin-top: -5px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <h6>
                Billing Information for:
            </h6>
            <table class="details-table">


                @if (isset($searchingYear))
                    <tr>
                        <th style="width: 130px; font-size: 12px;">
                            <p><b>Year:</b></p>
                        </th>
                        <td style=" font-size: 12px;">{{ $searchingYear->year }}</td>
                    </tr>
                @endif


                @if (isset($searchingMonth))
                    <tr>
                        <th style="width: 130px; font-size: 12px;">
                            <p><b>Month:</b></p>
                        </th>
                        <td style=" font-size: 12px;">{{ $searchingMonth->name }}</td>
                    </tr>
                @endif


                @if ($searchingBlock)
                    <tr>
                        <th style="width: 130px;  font-size: 12px;">
                            <p><b>Block Name:</b></p>
                        </th>
                        <td style=" font-size: 12px;">{{ $searchingBlock->blockName }}</td>
                    </tr>
                @endif


                @if (isset($searchingRoad))
                    <tr>
                        <th style="width: 130px;  font-size: 12px;">
                            <p><b>Road Name:</b></p>
                        </th>
                        <td style=" font-size: 12px;">{{ $searchingRoad->roadName }}</td>
                    </tr>
                @endif

                @if (isset($searchingPlot))
                    <tr>
                        <th style="width: 130px;  font-size: 12px;">
                            <p><b>Plot Name:</b></p>
                        </th>
                        <td style=" font-size: 12px;">{{ $searchingPlot->plotName }}</td>
                    </tr>
                @endif

            </table>
        </div>
    </div>

    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 12%; font-size: 12px; text-align: left; padding-left: 30px;">Bill No</th>
                <th style="width: 8%; font-size: 12px; text-align: left;">Road</th>
                <th style="width: 8%; font-size: 12px; text-align: left;">Plot</th>
                <th style="width: 12%; font-size: 12px; text-align: left;">Flat Name</th>
                <th style="width: 10%; font-size: 12px; text-align: left;">Flat ID</th>
                <th style="width: 12%; font-size: 12px; text-align: left;">Owner Name</th>
                <th style="width: 12%; font-size: 12px; text-align: left;">Tenant Name</th>
                <th style="width: 12%; font-size: 12px; text-align: left;">Usage Type</th>
                <th style="width: 10%; font-size: 12px; text-align: left;">Charge</th>
                <th style="width: 10%; font-size: 12px; text-align: left;">Pre Due</th>
                <th style="width: 8%; font-size: 12px; text-align: left;">Paid</th>
                <th style="width: 8%; font-size: 12px; text-align: left;">Advance</th>
                <th style="width: 12%; font-size: 12px; text-align: left;">Remarks</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($generateBills) && count($generateBills) > 0)
                @php
                    $totalAmount = 0;
                    $totalMonthlyDue = 0;
                    $totalPaid = 0; // Initialize total paid
                    $totaladvance = 0;
                @endphp

                @foreach ($generateBills as $month => $bills)
                    <tr>
                        <td colspan="8" style="text-align: left; font-weight: bold; font-size: 12px;">
                            {{ @$month->month->name }}
                        </td>
                    </tr>

                    @foreach ($bills as $generateBill)
                        <tr>
                            <td style="font-size: 12px; padding-left: 30px;">{{ @$generateBill->billNo }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->roads->roadName }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->plot->plotName }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->flat->flatName }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->flats }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->flat->ownerName }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->flat->tenantName }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->flat->usagetype->typeName }}</td>
                            @if ($generateBill->month == null)
                                {
                                <td style="font-size: 12px;">{{ @$generateBill->amount * 12 }}</td>
                                }
                            @else{
                                <td style="font-size: 12px;">{{ @$generateBill->amount }}</td>
                                }
                            @endif

                            {{-- <td style="font-size: 12px;">{{ @$generateBill->monthlyDue }}</td> --}}
                            @php
                                $previousDueSum = 0;

                                if ($generateBill->created_at) {
                                    $currentDate = $generateBill->created_at;
                                    $previousDueSum = DB::table('generate_bills')
                                        ->where('flat_id', $generateBill->flat_id)
                                        ->where('created_at', '<', $currentDate) // Only previous bills
                                        ->sum('monthlyDue'); // Sum of monthlyDue for those previous bills
                                }

                                if ($generateBill->month == null) {
                                    $paidAmount = $generateBill->amount * 12 - $generateBill->monthlyDue; // Calculate paid amount
                                    $totalPaid += $paidAmount; // Add to total paid
                                } else {
                                    $paidAmount = $generateBill->amount - $generateBill->monthlyDue; // Calculate paid amount
                                    $totalPaid += $paidAmount; // Add to total paid
                                }

                            @endphp

                            <td style="font-size: 12px;">{{ @$previousDueSum }}</td>

                            <td style="font-size: 12px;">
                                @if ($generateBill->month == null)
                                    @if ($generateBill->monthlyDue == 0)
                                        @php
                                            $total = 0;
                                            $total = $generateBill->amount * 12;
                                        @endphp
                                        {{ $total }}
                                    @endif
                                @else
                                    {{ $generateBill->amount - $generateBill->monthlyDue }}
                                @endif
                            </td>
                            <td style="font-size: 12px;">{{ @$generateBill->advance }}</td>
                            <td style="font-size: 12px;">{{ @$generateBill->flat->remarks }}</td>

                        </tr>
                        @php
                            $totalAmount += $generateBill->amount;
                            $totalMonthlyDue += $previousDueSum;
                            $totaladvance += $generateBill->advance;
                        @endphp
                    @endforeach
                @endforeach

                <!-- Display the totals -->
                <tr>
                    <td colspan="8" style="text-align: right; font-weight: bold; font-size: 12px;">Total:</td>
                    @if ($generateBill->month == null)
                        {
                        <td style="font-size: 12px; font-weight: bold;">{{ $totalAmount * 12 }}</td>
                        }
                    @else{
                        <td style="font-size: 12px; font-weight: bold;">{{ $totalAmount }}</td>
                        }
                    @endif

                    <td style="font-size: 12px; font-weight: bold;">{{ $totalMonthlyDue }}</td>
                    <td style="font-size: 12px; font-weight: bold;">
                        {{-- @if ($generateBill->month == null)
                            @if ($generateBill->monthlyDue == 0)
                                @php
                                    $total = 0;
                                    $total = $generateBill->amount * 12;
                                @endphp
                                {{ $total }}
                            @else
                                0
                            @endif
                        @else
                            {{ $totalAmount - $generateBill->amount }}
                        @endif --}}

                        {{ $totalPaid }}
                    </td>
                    <td style="font-size: 12px; font-weight: bold;">{{ $totaladvance }}</td>

                </tr>
            @else
                <tr>
                    <td colspan="8" style="text-align: center; font-size: 12px; padding-top: 30px;">No bills
                        available</td>
                </tr>
            @endif

        </tbody>
    </table>

</body>

</html>
