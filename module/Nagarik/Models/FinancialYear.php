<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinancialYear extends \App\Model
{
    use HasFactory;


    protected $guarded=['id'];


    public  function nagoriklicencefee()
    {
        $this->belongsTo(NagoriLicenceFee::class);

    }

}
