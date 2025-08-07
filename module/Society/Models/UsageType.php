<?php

namespace Module\Society\Models;

use App\Models\Model;

class UsageType extends \App\Model
{
    protected $table = 'usage_types';
    protected $fillable = ([
        'title',
        'typeName',
        'amount',
    ]);

}
