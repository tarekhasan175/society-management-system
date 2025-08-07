<?php

namespace Module\Account\Models;


use App\Traits\AutoCreatedUpdatedWithCompany;

class PoAccounts extends Model
{
    use AutoCreatedUpdatedWithCompany;

    public function ClientCompany()
    {
        return $this->belongsTo(ClientCompay::class , 'client_company_id','id');
    }



    public function rfqCustomer()
    {
        return $this->belongsTo(RfqCustomer::class, 'rfq_customers_id', 'id');
    }
}
