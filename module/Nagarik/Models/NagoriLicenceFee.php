<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagoriLicenceFee extends \App\Model
{

    use HasFactory;


    protected $guarded=['id'];


    public  function financeyear()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year_id', 'id');

    }
    public  function nagorikbusinesstype()
    {
        return $this->belongsTo(NagorikBusinessType::class, 'nagorik_business_type_id', 'id');

    }
}
