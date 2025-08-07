<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class MemberFeeAssign extends \App\Model
{
    protected $table = "member_fee_assign";
    protected $fillable = [
        "year",
        "memberCategory",
        "memberID",
        "amount",
        "paymentDate",
    ];
}
