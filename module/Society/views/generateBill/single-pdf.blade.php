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
        Monthly Money Receipt for block #{{ $block }}, road #{{ $road }}, year #{{ $year }},
        month #{{ $month }};
    </title>


    <style>
        @page {
            header: page-header;
            footer: page-footer;
            sheet-size: Legal;
            margin-top: 30px;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 5px;
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
            line-height: 0.7;
        }

        .receipt-container {
            border-collapse: collapse;
            width: 816px;
            height: 1344px;
            margin: 5px;
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
                <table class="header"
                    style="width: 100%;border-collapse: collapse;line-height: 1;padding: 0;margin: 0;">
                    <tr>
                        <td style="width: 20%; padding: 0;  margin: 0;">
                            <div>
                                @foreach ($companies as $company)
                                    <?php
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
                            <h5 style="margin: 0; padding: 0;"><u>Money Receipt</u></h5>
                        </td>
                        <td style="text-align: right;  width: 20%;">
                            <h6 style="margin: 0; padding: 0;">Office Copy</h6>
                        </td>
                    </tr>
                </table>

                <table class="info-table" style="width: 100%; border-collapse: collapse; border: none;">
                    <tr>
                        <td colspan="2" style="width: 40%; border: none; text-align: left;">
                            <b>ID No:</b> {{ @$bill->plot->plotID }}
                        </td>
                        <td style="width: 30%; text-align: center; border: none;">
                            <b>Bill No:</b> {{ $bill->billNo }}
                        </td>
                        <td style="width: 30%; border: none; text-align: right;">
                            <b>Period:</b>
                            {{ $bill->month_id ? substr($bill->month->name, 0, 3) : '' }}
                            {{ $bill->year ? $bill->year->year : '' }}
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
                            <b>Tenant:</b>
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
                        {{-- <td>{{ $bill->amount }}</td> --}}
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

                <table class="sign-table" style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 35%;">Cash/Cheque No:</td>
                        <td style="width: 35%;">Bank:</td>
                        <td style="width: 30%;">Date:</td>
                    </tr>
                </table>

                <table class="sign-table" style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 40%; padding: 10px 0; text-align: left;">
                            <div style="border-bottom: 1px solid #000; width: 100%;"></div>
                            Receiver Signature & Date:
                        </td>
                        <td style="width: 20%;"></td>
                        <td style="width: 40%; padding: 10px 0; text-align: left;">
                            <div style="border-bottom: 1px solid #000; width: 100%;"></div>
                            Payer's Signature:
                        </td>
                    </tr>
                </table>

                <table style="text-align: center; width:100%;">
                    <tr>
                        <td style="text-align: left;">
                            <div class="copyright">
                                <h5>Powered By: Smart Software Ltd</h5>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; margin-top:5px; font-size:12px;">

                            <div class="footer">*** Thank You For Your Payment ***</div>
                        </td>
                    </tr>
                </table>



            </td>

            <td class="receipt-cell">
                <table class="header"
                    style="width: 100%;border-collapse: collapse;line-height: 1;padding: 0;margin: 0;">
                    <tr>
                        <td style="width: 20%; padding: 0;  margin: 0;">
                            <div>
                                @foreach ($companies as $company)
                                    <?php
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
                        <td style="width: 20%"></td>
                        <td style="text-align: center; ">
                            <h5 style="margin: 0; padding: 0;"><u>Money Receipt</u></h5>
                        </td>
                        <td style="text-align: right;  width: 20%;">
                            <h6 style="margin: 0; padding: 0;">Payer's Copy</h6>
                        </td>
                    </tr>
                </table>

                <table class="info-table" style="width: 100%; border-collapse: collapse; border: none;">
                    <tr>


                        <td colspan="2" style="width: 40%; border: none; text-align: left;">
                            <b>ID No:</b> {{ $bill->plot->plotID }}
                        </td>
                        <td style="width: 30%; text-align: center; border: none;">
                            <b>Bill No:</b> {{ $bill->billNo }}
                        </td>
                        <td style="width: 30%; border: none; text-align: right;">
                            <b>Period:</b>
                            {{ $bill->month_id ? substr($bill->month->name, 0, 3) : '' }}
                            {{ $bill->year ? $bill->year->year : '' }}
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2" style="width: 40%; border: none; text-align: left;">
                            <b>Owner:</b> {{ $bill->plot->ownerName }}
                        </td>
                        <td colspan="2" style="width: 30%; border: none; text-align: right;">
                            <b>Issue Date:</b> {{ $bill->updated_at->format('d-M-Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 30%; border: none; text-align: left;">
                            <b>Tenant:</b>
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
                            <b>Flat/Unit:</b> {{ $bill->singleBillDetails->pluck('flat.flatName')->filter()->implode(',') }}
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
                        {{-- <td>{{ $bill->amount }}</td> --}}
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
                        <td align="right"><b>
                                <?php
                                $totalDue = $bill->total_monthlyDue + $previousDueSum;
                                $totalPayable = max(0, $totalDue - $bill->advance);
                                ?>
                                {{ $totalPayable }}</b></td>
                    </tr>
                </table>

                <table class="sign-table" style="width: 100%; border-collapse: collapse">
                    <tr>
                        <td style="width: 35%;">Cash/Cheque No:</td>
                        <td style="width: 35%;">Bank:</td>
                        <td style="width: 30%;">Date:</td>
                    </tr>
                </table>

                <table class="sign-table" style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 40%; padding: 10px 0; text-align: left;">
                            <div style="border-bottom: 1px solid #000; width: 100%;"></div>
                            Receiver Signature & Date:
                        </td>
                        <td style="width: 20%;"></td>
                        <td style="width: 40%; padding: 10px 0; text-align: left;">
                            <div style="border-bottom: 1px solid #000; width: 100%;"></div>
                            Payer's Signature:
                        </td>
                    </tr>
                </table>

                <table style="text-align: center; width:100%;">
                    <tr>
                        <td style="text-align: left;">
                            <div class="copyright">
                                <h5>Powered By: Smart Software Ltd</h5>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; margin-top:5px; font-size:12px;">
                            <div class="footer">*** Thank You For Your Payment ***</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    {{-- @endforeach --}}



</body>

</html>
