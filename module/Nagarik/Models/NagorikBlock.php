<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagorikBlock extends \App\Model
{

    use HasFactory;


    protected $guarded=['id'];


    public  function nagoriksector()
    {
        return $this->belongsTo(NagorikSector::class , 'nagorik_sector_id', 'id');

    }

}
