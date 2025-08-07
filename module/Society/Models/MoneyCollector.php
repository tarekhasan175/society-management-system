<?php

namespace Module\Society\Models;

use App\Models\Model;

class MoneyCollector extends \App\Model
{
    protected $table = 'money_collectors';
    protected $fillable = ([
        "name",
    ]);

}
