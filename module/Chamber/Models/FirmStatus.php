<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class FirmStatus extends \App\Model
{
    protected $table = 'firmstatus';
    protected $fillable = ['firmStatusName'];

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'firmStatus');
    }
}
