<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class CompanySetting extends \App\Model
{
    protected $table = "company_settings";
    protected $fillable = [
        'name',
        'address',
        'isDefault',
        'phone',
        'fax',
        'mobile',
        'web',
        'email',
        'logo',
        'sign',
        'shortName',
    ];
}
