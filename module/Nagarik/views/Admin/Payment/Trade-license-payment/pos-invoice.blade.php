<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>NSTL0{{ $invoice->id }}</title>




    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @media print {
            #invoice {
                margin-top: 0 !important;
                margin-bottom: 0 !important;
                padding-top: 2px !important;
                font-size: 16px !important;
            }

            .company-logo {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }


            .no-print,
            .no-print * {
                display: none !important;
            }

            .container {
                height: 100%;
                /* width: 58mm; */
                width: 100%;
            }
            .invoice-price {
                /* margin-right: -70px !important; */
            }
            .invoice-no{
                width: 300px!important;
            }

        }

        body {
            background: #efefef;
            font-family: 'Fira Code', monospace;
            font-size: .8rem;
            font-weight: 600;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .col-2 {
            float: left;
            width: 16.6666666667%;
        }

        .col-3 {
            float: left;
            width: 25%;
        }

        .col-4 {
            float: left;
            width: 33.3333333333%;
        }

        .col-6 {
            float: left;
            width: 50%;
        }

        .col-8 {
            float: left;
            width: 66.6666666666%;
        }

        .col-9 {
            float: left;
            width: 75%;
        }

        .col-10 {
            float: left;
            width: 83.3333333333%;
        }

        #invoice {
            background: #ffffff;
            width: 302.36px;
            min-height: 100px;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 50px;
            padding: 5px;
        }

        .container {
            height: 100%;
        }

        .company-logo {
            /* width: 60px; */
            margin: 0px auto;
            margin-top: 5px;
            text-align: center
        }

        .logo {
            width: 100%;
        }

        .company-info {
            font-size: .6rem;
            font-weight: 700;
            text-align: center;
        }

        .receipt-heading {
            text-align: center;
            font-weight: 700;
            margin: 0 auto;
            margin-top: 2px;
            max-width: 450px;
            position: relative;
        }


        .invoice-info {
            margin-top: 1px;
            margin-bottom: 10px;
        }

        .invoice-info .date {
            text-align: right;
        }

        table {
            width: 100%;
        }

        table,
        th {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .invoice-price {
            padding: 5px;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: right !important;
        }

        .footer {
            /* margin: -25px; */
            font-size: .7rem;
            padding: 0.3rem;
            text-align: center;
        }


        .no-print {
            text-align: center;
            margin-top: 10px;
        }

        .no-print .btn {
            border: none;
            color: white;
            padding: 6px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .no-print .btn.btn-print {
            background-color: #4CAF50;
        }

        .no-print .btn.btn-back {
            background-color: rgb(250, 225, 0);
        }

    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>

<body>


<div class="no-print">
    <a href="javascript:void(0)" onclick="window.print()" class="btn btn-print"> Print</a>
    <a href="" class="btn btn-back">Back</a>
    <a onclick="window.close();"
       style=" background-color: red; border: none;color: white; padding: 6px 12px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;cursor: pointer; border-radius: 5px;">Close</a>
</div>

<section id="invoice">
    <div class="container">
        <div class="company-logo">
                <img src="{{ asset('/uploads/company/'.companyInfo()->logo) }}" alt="Logo" class="logo" style="width: 70px; height: 50px;">

        </div>



        <div class="company-info">
            <p style="font-size: 16px">{{ companyInfo()->name }}</p>
            <p style="font-size: 11px">Cell: {{ companyInfo()->phone_number }}</p>
            <p style="font-size: 11px">{{ companyInfo()->email }}</p>
        </div>

        <div style="display: flex; justify-content: space-between;margin-top: 3px;font-size: 15px;">
            <p>BIN: 101</p>
            <p>Mushak-2.3</p>
        </div>

        <div class="invoice-info">
            <div class="row">
                <div class="col-12 invoice-no text-center">
                    Invoice No: NSTL0{{ $invoice->id }}<br>
                </div>
            </div>
            <p style="margin-top: 10px;">Date: {{ $invoice->created_at }}</p>
            <p>Civil: {{ $invoice->source->user->name }}({{ $invoice->source->user->phone }})</p>
            <p>License No: {{ $invoice->source->license_no }}</p>
        </div>




        <div class="product-info">
            <table>

                <thead>
                <tr>
                    <th>SL</th>
                    <th class="text-left">B.name</th>
                    <th>Session</th>
                    <th> </th>
                    <th> </th>
                    <th>Fee</th>
                </tr>
                </thead>

                <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                {{ substr($invoice->source->business_name, 0, 10) }}
                            </td>
                            <td class="text-center">{{ $invoice->source->financialYear->start_year }}-{{ $invoice->source->financialYear->end_year }}</td>
                            <td class="text-center"> </td>
                            <td class="text-center"> </td>
                            <td class="text-right">{{ $invoice->source->license_fee }}</td>
                        </tr>
                </tbody>
            </table>


            <div class="invoice-price">
                <div class="row">
                    <div class="col-8">
                        <p>Subtotal: </p>
                        <p>VAT: </p>
                    </div>
                    <div class="col-4">
                        <p>{{ $invoice->source->license_fee + 150 }}</p>
                        <p><span style="font-size: 7px"></span>150</p>
                    </div>
                </div>
                ------------
                <div class="row">
                    <div class="col-8">
                        <p>Total Payable:</p>
                    </div>
                    <div class="col-4">
                        <p>{{ floatval($invoice->amount)  }}</p>
                    </div>
                </div>
                ------------
                <div class="row">
                    <div class="col-8">
                        <p>Paid Amount: </p>
                    </div>
                    <div class="col-4">
                        <p>{{ floatval($invoice->amount) }}</p>
                    </div>
                </div>
            </div>

        </div>




        <div class="footer">
            <p style="margin-bottom: 10px">Paid Amount {{ floatval($invoice->amount) }}</p>
            <p>This is generated by system, no refund allowed after payment</p>
            <small><strong style="margin-top: 10px">Software Developed By: Smart Software Ltd</strong></small>
        </div>
    </div>
</section>


<script>
    window.print()
</script>
</body>

</html>
