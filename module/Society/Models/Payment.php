<?php

namespace Module\Society\Models;

use App\Models\Model;


class Payment extends \App\Model
{
    protected $table = 'payments';

    protected $fillable = ([
        'generate_bill_id',
        'amountPaid',
        'paymentDate',
        'advance',
    ]);


    public function generateBill()
    {
        return $this->belongsTo(GenerateBill::class, 'generate_bill_id');
    }

    
}
