<?php

namespace Module\Account\Models;


use App\Traits\AutoCreatedUpdatedWithCompany;

class RfqCustomer extends Model
{
    use AutoCreatedUpdatedWithCompany;


    public function rfqCompany()
    {
        return $this->hasOne(ClientCompay::class ,'id','client_company_id');
    }



    public function customer()
    {
        return $this->belongsTo(Customer::class, 'acc_customer_id', 'id');
    }
}
