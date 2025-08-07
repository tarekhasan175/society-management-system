<?php

namespace Module\Nagarik\Models;

use App\Model;

class PaymentModel extends Model
{
    protected $table = 'nagorik_payments';
    protected $with = ['financialYear'];

    public function source()
    {
        return $this->morphTo('source', 'source_type', 'source_id');
    }

    public function holdingtex()
    {
        return $this->hasOne(HoldingTexApply::class, 'id', 'source_id');
    }


    
    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year_id');
    }
}
