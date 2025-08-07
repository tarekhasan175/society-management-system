<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class BusinessNature extends \App\Model
{

    protected $table = "business_nature";

    protected $fillable = [
        'businessNatureName',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'natureofBusinessID');
    }



}
