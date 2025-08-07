<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagorikRoadAdd extends \App\Model
{

    use HasFactory;
    protected $guarded=['id'];


    public  function nagorikbloc()
    {
        return $this->belongsTo(NagorikBlock::class , 'nagorik_block_id', 'id');

    }

}
