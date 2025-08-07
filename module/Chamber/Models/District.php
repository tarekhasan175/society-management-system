<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class District extends \App\Model
{

    protected $table = "districts";
    protected $fillable = [
        "name",
    ];


    public function upazillas()
    {
        return $this->hasMany(Upazilla::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'districtID');
    }


}
