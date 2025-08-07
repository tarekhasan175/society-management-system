<?php

namespace Module\Society\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Module\Society\Models\Plot;

use Module\Society\Models\UsageType;
use Module\Society\Models\Block;
use Module\Society\Models\MoneyCollector;
use Module\Society\Models\Road;
use Illuminate\Database\Eloquent\Model;


class HouseOrBuilding extends Model
{
    use HasFactory;

    // Specify the table name if needed
    protected $table = 'house_or_building';

    // Fillable fields for mass assignment
    protected $guarded=['id'];


    public  function block()

    {
        return $this->belongsTo(Block::class , 'block_id',  'id');

    }


    public  function road()
    {
        return $this->belongsTo(Road::class , 'road_id', 'id');

    }

    public  function plot()
    {
        return $this->belongsTo(Plot::class , 'plot_id', 'id');

    }

    public  function usagestatus()
    {
        return $this->belongsTo(UsageType::class , 'usage_type_id', 'id');

    }
}
