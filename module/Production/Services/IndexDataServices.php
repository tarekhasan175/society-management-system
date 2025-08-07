<?php

namespace Module\Production\Services;

use Module\Production\Models\RawMaterials;

class IndexDataServices
{
    public function getRawMaterialsData()
    {
        if(auth()->user()->company_id == 1){
            return RawMaterials::query()
            ->latest()
            ->get();
        }else{
            return RawMaterials::query()
            ->where('company_id', auth()->user()->company_id)
            ->latest()
            ->get();
        }
    }
}
