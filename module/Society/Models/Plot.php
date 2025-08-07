<?php

namespace Module\Society\Models;
use Module\Society\Models\Block;
use Module\Society\Models\MoneyCollector;
use Module\Society\Models\Road;
use App\Models\Model;

class Plot extends \App\Model
{
    protected $table = 'plots';

    protected $guarded=['id'];

    public function houseOrBuilding()
    {
        return $this->hasOne(HouseOrBuilding::class, 'plotName', 'plotName');
    }

    public  function block()

    {
        return $this->belongsTo(Block::class , 'block_id',  'id');

    }


    public  function road()
    {
        return $this->belongsTo(Road::class , 'road_id', 'id');

    }
}
