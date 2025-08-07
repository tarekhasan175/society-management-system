<?php
$block = $bill && $bill->Block ? $bill->Block->blockName : 'Unknown Block';
$road = $bill && $bill->AssignRoad ? $bill->AssignRoad->roadName : 'Unknown Road';
$year = $bill && $bill->Assignyear ? $bill->Assignyear->year : 'Unknown Year';
$month = $bill && $bill->Assignmonth ? $bill->Assignmonth->name : 'Unknown Month';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Monthly Bill for block #{{ $block }}, road #{{ $road }}, year #{{ $year }}, month
        #{{ $month }}
    </title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
            sheet-size: Legal;
            margin-top: 50px;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 5px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        body {

            .receipt-container,
            .header,
            .footer,
            .info-table td,
            .payment-table th,
            .payment-table td,
            .sign-table td {
                line-height: 0.7;
            }
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
            margin-top: 5px;
        }

        .payment-table {
            margin: auto;
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

        .sign-table {
            margin-top: 12px !important;
        }

        .copyright h5 {
            margin-top: 0 !important;
        }


        .copyright {
            margin: 0;
            font-size: 9px;
        }

        .company-logo {
            margin: 0 !important;
            padding: 0 !important;
            max-height: 80px;
            max-width: 80px;
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

            .no-print,
            .no-print * {
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

<body>

    <div class="no-print">
        <button onclick="window.print();">Print</button>
    </div>


    {{-- @foreach ($generateBills as $index => $bill) --}}
        <table class="receipt-container" style="height: 100px;">
            <tr class="receipt-row">
                <td class="receipt-cell">
                    <table class="header" style="width: 100%;border-collapse: collapse; 0;margin: 0;">
                        <tr>
                            <td style="width: 20%; padding: 0;  margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        <?php
                                        ini_set('memory_limit', '512M');
                                        ini_set('max_execution_time', '300');
                                        ini_set('pcre.backtrack_limit', '50000000');
                                        
                                        $logoPath = public_path('uploads/company/' . $company->logo);
                                        if (!file_exists($logoPath) || !$company->logo) {
                                            $logoPath = public_path('default.png');
                                        }
                                        $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                                        $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($logoPath));
                                        
                                        ?>
                                        <img src="{{ $base64Logo }}" alt="Logo" class="company-logo">
                                    @endforeach
                                </div>
                            </td>
                            <td colspan="8" style="text-align: center; padding: 0; margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        <strong>{{ $company->name }}</strong><br />
                                        <p style="font-weight: normal; margin: 0; font-size:10px;">
                                            <span style="font-weight: lighter;">
                                                {{ $company->head_office }} <br />
                                                Tel: {{ $company->tel_number }} Cell: {{ $company->phone_number }}
                                            </span>
                                        </p>
                                    @endforeach
                                </div>
                            </td>
                            <td style="width: 20%; padding: 0;"></td>
                        </tr>
                    </table>

                    <table class="office-copy" style="width: 100%; border: none; height: 8px;">
                        <tr>
                            <td style="width: 20%;"></td>
                            <td style="text-align: center; ">
                                <h5 style="margin: 0; padding: 0;"><u>Monthly CP Service Bill</u></h5>
                            </td>
                            <td style="text-align: right;  width: 20%;">
                                <h6 style="margin: 0; padding: 0;">Office Copy</h6>
                            </td>
                        </tr>
                    </table>

                    <table class="info-table" style="width: 100%; border-collapse: collapse; border: none;">
                        <tr>


                            <td colspan="2" style="width: 50%; border: none; text-align: left;">
                                <b>ID No:</b> {{ $bill->plot->plotID }}
                            </td>
                            <td style="width: 20%; text-align: center; border: none;">
                                <b>Bill No:</b> {{ $bill->billNo }}
                            </td>
                            <td style="width: 30%; border: none; text-align: right;">
                                <b>Period:</b>
                                @php
                                    $monthNames = [];
                                    if (!empty($bill->month_id)) {
                                        $monthIds = is_array($bill->month_id) ? $bill->month_id : [$bill->month_id];
                                        $months = \App\Models\Month::whereIn('id', $monthIds)->pluck('name')->toArray();
                                        $monthNames = array_map(function ($m) {
                                            return substr($m, 0, 3);
                                        }, $months);
                                    }
                                @endphp
                                {{ implode(', ', $monthNames) }} {{ $bill->year->year ?? '' }}
                            </td>
                        </tr>


                        <tr>
                            <td colspan="2" style="width: 40%; border: none; text-align: left;">
                                <b>Owner:</b> {{ $bill->plot->ownername }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right;">
                                <b>Issue Date:</b> {{ $bill->updated_at->format('d-M-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 30%; border: none; text-align: left;">
                                <b>Tenant:</b> {{ @$bill->flat->tenantName }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right;">
                                <b>Type:</b> {{ substr(@$bill->gettype->typeName, 0, 1) }}
                            </td>
                        </tr>




                        <tr>
                            <td style="width: 20%; border: none; text-align: left;">
                                <b>Block:</b> {{ $bill->AssignBlock->blockName }}
                            </td>
                            <td style="width: 20%; text-align: left; border: none;">
                                <b>Road:</b> {{ $bill->AssignRoad->roadName }}
                            </td>
                            <td style="width: 20%; text-align: center; border: none;">
                                <b>Plot/House:</b> {{ $bill->AssignPlot->plotName }}
                            </td>
                            <td style="width: 40%; border: none; text-align: right;">
                                <b>Flat/Unit:</b> {{ $bill->singleBillDetails->pluck('flat.flatName')->filter()->implode(', ') }}
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
                            <td align="right">{{ $bill->total_monthlyDue }}</td>
                        </tr>
                        <tr>
                            <td>Previous Due</td>
                            <td align="right">

                                <?php
                                $previousDueSum = 0;
                                
                                if ($bill->created_at) {
                                    $currentYear = @$bill->year->year;
                                    $currentMonth = @$bill->month->name;
                                
                                    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                
                                    $currentMonthIndex = array_search($currentMonth, $months);
                                
                                    $previous = DB::table('generate_bills')
                                        ->join('months', 'generate_bills.month_id', '=', 'months.id') // Join with months table to get month names
                                        ->join('years', 'generate_bills.year_id', '=', 'years.id') // Join with years table to get the real year
                                        ->where('generate_bills.flats', $bill->flats)
                                        ->where(function ($query) use ($currentYear, $currentMonthIndex, $months) {
                                            $query->where('years.year', '<', $currentYear)->orWhere(function ($query) use ($currentYear, $currentMonthIndex, $months) {
                                                $query->where('years.year', $currentYear)->whereIn('months.name', array_slice($months, 0, $currentMonthIndex)); // Exclude current month
                                            });
                                        })
                                        ->pluck('monthlyDue');
                                
                                    $previousDueSum = $previous->sum();
                                }
                                ?>

                                {{ $previousDueSum }}


                            </td>
                        </tr>
                        <tr>
                            <td>Advance</td>
                            <td align="right">{{ @$bill->flat->advance }}</td>
                        </tr>
                        <tr>
                            <td><b>Total Payable</b></td>
                            <td align="right"><b> <?php
                            $totalDue = $bill->total_monthlyDue + $previousDueSum;
                            $totalPayable = max(0, $totalDue - $bill->advance);
                            ?>
                                    {{ $totalPayable }}</b></td>
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
                    <table class="header" style="width: 100%;border-collapse: collapse;padding: 0;margin: 0;">
                        <tr>
                            <td style="width: 20%; padding: 0; margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        <?php
                                        ini_set('memory_limit', '512M');
                                        ini_set('max_execution_time', '300');
                                        ini_set('pcre.backtrack_limit', '50000000');
                                        
                                        $logoPath = public_path('uploads/company/' . ($company->logo ?: 'default.png'));
                                        
                                        if (!file_exists($logoPath)) {
                                            $logoPath = public_path('uploads/company/default.png');
                                        }
                                        
                                        $base64Logo = '';
                                        if (file_exists($logoPath)) {
                                            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                                            $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($logoPath));
                                        }
                                        ?>
                                        @if (!empty($base64Logo))
                                            <img src="{{ $base64Logo }}" alt="Logo" class="company-logo">
                                        @else
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td colspan="8" style="text-align: center; padding: 0; margin: 0;">
                                <div>
                                    @foreach ($companies as $company)
                                        <strong>{{ $company->name ?? 'N/A' }}</strong><br />
                                        <p style="font-weight: normal; margin: 0; font-size:10px;">
                                            <span style="font-weight: lighter;">
                                                {{ $company->head_office ?? 'N/A' }} <br />
                                                Tel: {{ $company->tel_number ?? 'N/A' }} Cell:
                                                {{ $company->phone_number ?? 'N/A' }}
                                            </span>
                                        </p>
                                    @endforeach
                                </div>
                            </td>

                            <td style="width: 20%; padding: 0;"></td>
                        </tr>
                    </table>

                    <table class="office-copy" style="width: 100%; border: none; height: 8px;">
                        <tr>
                            <td style="width: 20%;"></td>
                            <td style="text-align: center; ">
                                <h5 style="margin: 0; padding: 0;"><u>Monthly CP Service Bill</u></h5>
                            </td>
                            <td style="text-align: right;  width: 20%">
                                <h6 style="margin: 0; padding: 0;">Payer's Copy</h6>
                            </td>
                        </tr>
                    </table>

                    <table class="info-table" style="width: 100%; border-collapse: collapse; border: none;">
                        <tr>


                            <td colspan="2" style="width: 50%; border: none; text-align: left;">
                                <b>ID No:</b> {{ $bill->plot->plotID }}
                            </td>
                            <td style="width: 20%; text-align: center; border: none;">
                                <b>Bill No:</b> {{ $bill->billNo }}
                            </td>
                            <td style="width: 30%; border: none; text-align: right;">
                                <b>Period:</b>
                                @php
                                    $monthNames = [];
                                    if (!empty($bill->month_id)) {
                                        $monthIds = is_array($bill->month_id) ? $bill->month_id : [$bill->month_id];
                                        $months = \App\Models\Month::whereIn('id', $monthIds)->pluck('name')->toArray();
                                        $monthNames = array_map(function ($m) {
                                            return substr($m, 0, 3);
                                        }, $months);
                                    }
                                @endphp
                                {{ implode(', ', $monthNames) }} {{ $bill->year->year ?? '' }}
                            </td>
                        </tr>


                        <tr>
                            <td colspan="2" style="width: 40%; border: none; text-align: left;">
                                <b>Owner:</b> {{ $bill->plot->ownername }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right;">
                                <b>Issue Date:</b> {{ $bill->updated_at->format('d-M-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 30%; border: none; text-align: left;">
                                <b>Tenant:</b> {{ @$bill->flat->tenantName }}
                            </td>
                            <td colspan="2" style="width: 30%; border: none; text-align: right;">
                                <b>Type:</b> {{ substr(@$bill->gettype->typeName, 0, 1) }}
                            </td>
                        </tr>




                        <tr>
                            <td style="width: 20%; border: none; text-align: left;">
                                <b>Block:</b> {{ $bill->AssignBlock->blockName }}
                            </td>
                            <td style="width: 20%; text-align: left; border: none;">
                                <b>Road:</b> {{ $bill->AssignRoad->roadName }}
                            </td>
                            <td style="width: 20%; text-align: center; border: none;">
                                <b>Plot/House:</b> {{ $bill->AssignPlot->plotName }}
                            </td>
                            <td style="width: 40%; border: none; text-align: right;">
                                <b>Flat/Unit:</b> {{ $bill->singleBillDetails->pluck('flat.flatName')->filter()->implode(', ') }}
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
                            <td align="right">{{ $bill->total_monthlyDue }}</td>
                        </tr>
                        <tr>
                            <td>Previous Due</td>
                            <td align="right">
                                <?php
                                $previousDueSum = 0;
                                
                                if ($bill->created_at) {
                                    $currentYear = $bill->year->year;
                                    $currentMonth = $bill->month->name;
                                
                                    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                
                                    $currentMonthIndex = array_search($currentMonth, $months);
                                
                                    $previous = DB::table('generate_bills')
                                        ->join('months', 'generate_bills.month_id', '=', 'months.id')
                                        ->join('years', 'generate_bills.year_id', '=', 'years.id')
                                        ->where('generate_bills.flats', $bill->flats)
                                        ->where(function ($query) use ($currentYear, $currentMonthIndex, $months) {
                                            $query->where('years.year', '<', $currentYear)->orWhere(function ($query) use ($currentYear, $currentMonthIndex, $months) {
                                                $query->where('years.year', $currentYear)->whereIn('months.name', array_slice($months, 0, $currentMonthIndex)); // Exclude current month
                                            });
                                        })
                                        ->pluck('monthlyDue');
                                
                                    $previousDueSum = $previous->sum();
                                }
                                ?>

                                {{ $previousDueSum }}

                            </td>
                        </tr>
                        <tr>
                            <td>Advance</td>
                            <td align="right">{{ @$bill->flat->advance }}</td>
                        </tr>
                        <tr>
                            <td><b>Total Payable</b></td>
                            <td align="right"><b> <?php
                            $totalDue = $bill->total_monthlyDue + $previousDueSum;
                            $totalPayable = max(0, $totalDue - $bill->advance);
                            ?>
                                    {{ $totalPayable }}</b></td>
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
    {{-- @endforeach --}}

</body>

</html>
