<?php

namespace Module\Account\Models;

use App\Model;
use App\Traits\AutoCreatedUpdatedWithCompany;

class ProductModels extends Model
{
    use AutoCreatedUpdatedWithCompany;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
