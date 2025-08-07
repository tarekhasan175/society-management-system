<?php

namespace Module\Account\Models;

use App\Models\Company;
use App\Traits\AutoCreatedUpdatedWithCompany;

class RfqJobNumber extends Model
{
    use AutoCreatedUpdatedWithCompany;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }



    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function ClientCompany()
    {
        return $this->belongsTo(ClientCompay::class , 'client_company_id','id');
    }



    public function rfqCustomer()
    {
        return $this->belongsTo(RfqCustomer::class, 'rfq_customers_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(RfqJobNumberDetails::class, 'rfq_job_numbers_id', 'id');
    }
    public function poId()
    {
        return $this->hasOne(PoAccounts::class, 'id', 'po_accounts_id');
    }


}
