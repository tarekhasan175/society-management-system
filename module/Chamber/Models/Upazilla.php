<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class Upazilla extends \App\Model
{
    protected $table = "upazillas";
    protected $fillable = [
        "name",
        "district_id"
    ];



    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'upazillaID');
    }


}
