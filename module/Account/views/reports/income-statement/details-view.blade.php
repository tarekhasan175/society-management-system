<div class="col-sm-12" style="width: 100%">
    <table class="table table-sm table-bordered detail-table">
        <thead>
        <tr>
            <th colspan="2">Particular</th>
            <th class="text-center">2021</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td colspan="2"><strong
                    style="font-size: 15px">{{ isset($accountSystemSettings->income_statement_sales1) ? $accountSystemSettings->income_statement_sales1 : 'Sales'  }}</strong>
            </td>
            <td class="text-center">
                {{ number_format($sale_amount = optional(optional($revenues)->accountControls)->sum(function($accountControl) {
                    return $accountControl->accounts->sum('balance');
                }), 0) }}
            </td>
        </tr>


        <tr style="border:none !important" class="detail-rows">
            <td colspan="3">
                <div class="col-sm-8 col-sm-offset-1" style="width: 66% !important">
                    <table class="table table-borderless" style="border:none !important;margin-bottom:0%">

                        @foreach ($revenues->accountControls as $accountControl)
                            @foreach ($accountControl->accounts as $account)
                                <tr style="border:none !important">
                                    <td style="border:none !important">
                                        @if($account->name == 'Sales')
                                            {{ isset($accountSystemSettings->income_statement_sales2) ? $accountSystemSettings->income_statement_sales2 : 'Sales' }}
                                        @else
                                            {{ $account->name }}
                                        @endif
                                    </td>
                                    <td style="border:none !important" class="text-right"
                                        style="border:none !important">

                                        {{ number_format($account->balance, 2) }}

                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </td>

        </tr>


        @php
            $less_amount = $purchases->accountControls->sum(function($accountControl) {
                return $accountControl->accounts->sum('balance');
            })
        @endphp
        <tr>
            <td colspan="2"><strong
                    style="font-size: 15px">Less: {{ isset($accountSystemSettings->income_statement_cost_of_goods_sold) ? $accountSystemSettings->income_statement_cost_of_goods_sold : 'Cost of Goods Sold' }}</strong>
            </td>
            <td class="text-center">
                {{ number_format($less_amount, 0) }}</td>
        </tr>

        <tr style="border:none !important" class="detail-rows">
            <td colspan="3">
                <div class="col-sm-8 col-sm-offset-1" style="width: 66% !important">
                    <table class="table table-borderless" style="border:none !important;margin-bottom:0%">

                        @foreach ($purchases->accountControls as $accountControl)
                            @foreach ($accountControl->accounts as $account)
                                <tr style="border:none !important">
                                    <td style="border:none !important">{{ $account->name }}</td>
                                    <td style="border:none !important" class="text-right"
                                        style="border:none !important">
                                        {{ number_format($account->balance, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        <tr style="border:none !important">
                            <td style="border:none !important">Labour Cost</td>
                            <td style="border:none !important" class="text-right"
                                style="border:none !important">
                                {{ number_format(00, 2) }}
                            </td>
                        </tr>
                        <tr style="border:none !important">
                            <td style="border:none !important">WAGES</td>
                            <td style="border:none !important" class="text-right"
                                style="border:none !important">
                                {{ number_format(00, 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
            </td>

        </tr>


        <tr>
            <td colspan="2" class="text-right">
                <strong>Gross Profit:</strong>
            </td>
            <td class="text-center">
                <strong>{{ number_format($gross_profit = $sale_amount - $less_amount, 0) }}</strong>
            </td>
        </tr>


        <tr>
            <td colspan="2"><strong>Expenses:</strong></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="2">
                <strong>Operating Expenses:</strong>
            </td>
            <td></td>
        </tr>

        <td colspan="2">
            Administrative Expenses
        </td>
        <td class="text-center">
            {{
                number_format(
                    $expense = $expenses->accountControls->sum(function($accountControl) {
                        return $accountControl->accounts->sum('balance');
                    }),
                0)
            }}
        </td>
        </tr>


        <tr style="border:none !important" class="detail-rows">
            <td colspan="3">
                <div class="col-sm-8 col-sm-offset-1" style="width: 66% !important">
                    <table class="table table-borderless" style="border:none !important;margin-bottom:0%">

                        @foreach ($expenses->accountControls as $accountControl)
                            @foreach ($accountControl->accounts as $account)
                                <tr style="border:none !important">
                                    <td style="border:none !important">{{ $account->name }}</td>
                                    <td style="border:none !important" class="text-right"
                                        style="border:none !important">
                                        {{ number_format($account->balance, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </td>

        </tr>

        <tr>
            <td colspan="2">
                <strong>Non-Operating Expenses:</strong>
            </td>
            <td></td>
        </tr>


        <tr>
            <td colspan="2">
                Depreciation
            </td>
            <td class="text-center">
                {{ number_format(
                        $depreciation = $depreciations->accountControls->sum(function($accountControl) {
                            return $accountControl->accounts->sum('balance');
                        }),
                    0)
                }}
            </td>
        </tr>

        <tr style="border:none !important" class="detail-rows">
            <td colspan="3">
                <div class="col-sm-8 col-sm-offset-1" style="width: 66% !important">
                    <table class="table table-borderless" style="border:none !important;margin-bottom:0%">

                        @foreach ($depreciations->accountControls as $accountControl)
                            @foreach ($accountControl->accounts as $account)
                                <tr style="border:none !important">
                                    <td style="border:none !important">{{ $account->name }}</td>
                                    <td style="border:none !important" class="text-right"
                                        style="border:none !important">
                                        {{ number_format($account->balance, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </td>

        </tr>


        <tr>
            <td colspan="2" class="text-right">
                <strong>Operating Profit:</strong>
            </td>
            <td class="text-center">
                <strong>{{ number_format($operative_profit = $gross_profit - $expense - $depreciation, 0) }}</strong>
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <strong style="font-size: 15px">Add: Non-operating Income</strong>
            </td>
            <td class="text-center">{{ number_format($none_operating_income = $equity->accountControls->sum(function($accountControl) {
                                return $accountControl->accounts->sum('balance');
                            }), 0) }}</td>
        </tr>


        <tr style="border:none !important" class="detail-rows">
            <td colspan="3">
                <div class="col-sm-8 col-sm-offset-1" style="width: 66% !important">
                    <table class="table table-borderless" style="border:none !important;margin-bottom:0%">

                        @foreach ($equity->accountControls as $accountControl)
                            @foreach ($accountControl->accounts as $account)
                                <tr style="border:none !important">
                                    <td style="border:none !important">{{ $account->name }}</td>
                                    <td style="border:none !important" class="text-right"
                                        style="border:none !important">
                                        {{ number_format($account->balance, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </td>

        </tr>


        <tr>
            <td colspan="2" class="text-right">
                <strong>Earnings Before Interest & Tax:</strong>
            </td>
            <td class="text-center">
                <strong>{{ number_format($earning_interest_and_tax = $operative_profit + $none_operating_income, 0) }}</strong>
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <strong style="font-size: 15px">Less: {{ isset($accountSystemSettings->income_statement_financial_expenses) ? $accountSystemSettings->income_statement_financial_expenses : 'Financial Expenses' }}</strong>
            </td>
            <td class="text-center">{{ $financial_expendex = 0 }}</td>
        </tr>


        <tr>
            <td colspan="2" class="text-right">
                <strong>Earnings Before Tax:</strong>
            </td>
            <td class="text-center">
                <strong>{{ number_format($earning_before_tax = $earning_interest_and_tax + $financial_expendex, 0) }}</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Less: Provision for Income Tax
            </td>
            <td class="text-center">{{ $income_tax = 0 }}</td>
        </tr>


        <tr>
            <td colspan="2">
                <strong>Net Profit/(Loss) after Tax:</strong>
            </td>
            <td class="text-center">
                <strong>{{ number_format($net_profit_and_loss = $earning_before_tax + $income_tax, 0) }}</strong>
            </td>
        </tr>
        </tbody>
    </table>
</div>
