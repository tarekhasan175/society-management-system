<?php

namespace Module\Production\Models;

use App\Model;
use Module\Account\Models\Product;
use Module\Account\Models\Unit;

class NewTradeApply extends Model
{

    protected $guarded = ['id'];
    protected $table = 'new_trade_apply';

}
