<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagorikWordAdd extends \App\Model
{
    use HasFactory;


    protected $guarded=['id'];

    public  function cityarea()
    {
       return $this->belongsTo(CityAreaAdd::class , 'city_area_id', 'id');

    }

}
