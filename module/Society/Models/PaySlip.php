<?php

namespace Module\Society\Models;

use App\Models\Model;

class PaySlip extends \App\Model
{
    protected $table = 'pay_slips';

    protected $fillable = [
        'bill_no',
        'pay_month',
        'pay_year',
        'bill_month',
        'bill_year',
        'flat_id',
        'current_due',
        'charge_amount',
        'payment_amount'
    ];
}
