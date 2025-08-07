<?php

namespace Module\Society\Models;
use Module\Society\Models\Block;
use Module\Society\Models\MoneyCollector;

use App\Models\Model;

class Road extends \App\Model
{
    protected $table = 'roads';
    protected $guarded=['id'];
    // protected $fillable = [
    //     'roadID',
    //     'roadName',
    //     'blockID',
    //     'blockName',
    //     'moneyCollectorID',
    //     'moneyCollectorName',
    // ];



    public  function block()
    {
        return $this->belongsTo(Block::class , 'block_name_id',  'id');

    }


    public  function monycontroll()
    {
        return $this->belongsTo(MoneyCollector::class , 'money_collector_name_id', 'id');

    }


}
