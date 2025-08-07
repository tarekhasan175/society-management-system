<table class="table table-bordered table-striped" style="margin-bottom: 0">
    <thead>
        <tr class="table-header-bg">
            <th class="text-center">Sl</th>
            <th class="text-center">Date</th>
            <th class="text-center">Voucher No</th>
            <th class="pl-3">Description</th>
            <th class="text-right pr-1">Dr.</th>
            <th class="text-right pr-1">Cr.</th>
            <th class="text-right pr-1">Balance</th>
        </tr>
    </thead>

    <tbody>

        @if (request('account_id'))


            @php
                if ($selected_account->accountGroup->balance_type == 'Debit') {


                    $balance = ($debit_balance + $paginate_debit_balance) - ($credit_balance + $paginate_credit_balance);

                } else {

                    $balance = ($credit_balance + $paginate_credit_balance) - ($debit_balance + $paginate_debit_balance);
                }

            @endphp
            <tr>
                <td class="text-left pl-3" colspan="6">Opening Balance</td>
                <td class="text-right pr-1">{{ number_format($balance, 2) }}</td>
            </tr>
        @else
            <tr>
                <td colspan="7" style="font-size: 16px" class="text-center text-danger">
                    NO RECORDS FOUND!
                </td>
            </tr>
        @endif

        @php
            $total_debit = 0;
            $total_credit = 0;
        @endphp

        @foreach ($transactions as $transaction)
            @php
                
                if ($selected_account->accountGroup->balance_type == 'Debit') {
                    $balance += ($transaction->debit_amount - $transaction->credit_amount);
                } else {
                    $balance += ($transaction->credit_amount - $transaction->debit_amount);
                }
                
                $total_debit += $transaction->debit_amount;
                $total_credit += $transaction->credit_amount;
            @endphp
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $transaction->date }}</td>
                <td class="text-center">{{ $transaction->invoice_no }}</td>
                <td class="pl-3">{{ $transaction->description }}</td>
                <td class="text-right pr-1">{{ number_format($transaction->debit_amount, 2) }}</td>
                <td class="text-right pr-1">{{ number_format($transaction->credit_amount, 2) }}</td>
                <td class="text-right pr-1">{{ number_format($balance, 2) }}</td>
            </tr>
        @endforeach

        <tr>
            <th class="text-center" colspan="4">Total In Page</th>
            <th class="text-right pr-1">{{ number_format($total_debit, 2) }}</th>
            <th class="text-right pr-1">{{ number_format($total_credit, 2) }}</th>
            <th></th>
        </tr>
    </tbody>
</table>