<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagoriHoldinTexRate extends \App\Model
{
    use HasFactory;


    protected $guarded=['id'];

    public  function cityarea()
    {
        return $this->belongsTo(CityAreaAdd::class , 'nagorik_region_id', 'id');

    }

    public  function nagoriklandtype()
    {
        return $this->belongsTo(NagorikLandType::class , 'nagorik_land_type_id', 'id');

    }

    public function landType()
    {
        return $this->belongsTo(NagorikLandType::class, 'h_land_use_type', 'id');
    }

}
