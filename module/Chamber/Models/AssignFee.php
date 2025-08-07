<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class AssignFee extends \App\Model
{
    protected $guarded = ['id'];
    public function year()
    {
        return $this->belongsTo(AccountYear::class,'year_id');
    }
    public function memberCategory()
    {
        return $this->belongsTo(MemberCategory::class, 'membercategory_id');
    }
    public function paymentHead()
    {
        return $this->belongsTo(PaymentHead::class, 'paymenthead_id');
    }
}