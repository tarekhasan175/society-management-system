<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class AccountYear extends \App\Model
{
    protected $table = "accountyear";

    protected $fillable = [
        "fromDate",
        "toDate",
        "sessionName",
        "lock",
    ];


    public function memberships()
    {
        return $this->hasMany(Membership::class, 'session');
    }

}
