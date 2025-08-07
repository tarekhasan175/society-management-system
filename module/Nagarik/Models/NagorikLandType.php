<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagorikLandType extends \App\Model
{
    use HasFactory;


    protected $guarded=['id'];
protected $with = ['holdingTexRate'];
    public function holdingTexRate()
    {
        return $this->belongsTo(NagoriHoldinTexRate::class, 'id', 'nagorik_land_type_id');
    }

}
