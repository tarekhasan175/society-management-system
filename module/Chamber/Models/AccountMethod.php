<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class AccountMethod extends \App\Model
{
    protected $table = "account_payment_methods";
    protected $fillable = [
        'methodName',
        'methodDetails',
        'isActive',
        'lastEntryBy',
    ];
}
