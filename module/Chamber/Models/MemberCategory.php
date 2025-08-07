<?php

namespace Module\Chamber\Models;

use App\Models\Model;

class MemberCategory extends \App\Model
{


    protected $table = 'membercategories';
    protected $fillable = ['memberCategoryName'];


    public function memberships()
    {
        return $this->hasMany(Membership::class, 'memberCategoryID');
    }
}
