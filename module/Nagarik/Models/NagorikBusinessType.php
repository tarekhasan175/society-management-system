<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagorikBusinessType extends \App\Model
{

    use HasFactory;


    protected $guarded=['id'];

    public  function nagorikLicence()
    {
       return $this->belongsTo(NagoriLicenceFee::class);

    }


}
