<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Group;
use App\Models\SupplierType;
use App\Traits\AutoCreatedUpdated;
use App\Model;

class Supplier extends Model
{
    use AutoCreatedUpdated;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function supplier_type()
    {
        return $this->belongsTo(SupplierType::class);
    }

   

    // supplier type scope


    public function scopeGeneral_store($query)
    {
        $query->where('supplier_type_id', 1);
    }

}
