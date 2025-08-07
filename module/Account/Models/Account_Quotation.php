<?php

namespace Module\Account\Models;


use App\Models\Company;
use App\Traits\AutoCreatedUpdatedWithCompany;
use Google\Service\CloudAlloyDBAdmin\QuantityBasedRetention;

class Account_Quotation extends Model
{
    use AutoCreatedUpdatedWithCompany;
    protected $table = 'account_quotations';

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
        return $this->hasMany(AccountQuotationDetails::class, 'quotation_id', 'id');
    }
}
