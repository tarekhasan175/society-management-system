<?php

namespace Module\Society\Models;

use Module\Society\Models\Year;
use App\Models\Month;

use App\Models\Model;

class GenerateBill extends \App\Model
{
    protected $table = 'generate_bills';


    protected $guarded = ['id'];

    public function flat()
    {
        return $this->belongsTo(Flat::class, 'flat_id', 'id');
    }
    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id', 'id');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public  function Block()
    {
        return $this->belongsTo(Block::class, 'block_id', 'id');
    }


    public  function AssignBlock()
    {
        return $this->belongsTo(Block::class, 'block_id', 'id');
    }

    public  function roads()
    {
        return $this->belongsTo(Road::class, 'road_id', 'id');
    }

    public  function road()
    {
        return $this->belongsTo(Road::class, 'road_id', 'id');
    }

    public  function AssignRoad()
    {
        return $this->belongsTo(Road::class, 'road_id', 'id');
    }


    public  function AssignPlot()
    {
        return $this->belongsTo(Plot::class, 'plot_id', 'id');
    }


    public  function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    public  function Assignyear()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    public  function Assignmonth()
    {
        return $this->belongsTo(Month::class, 'month_id', 'id');
    }

    public  function month()
    {
        return $this->belongsTo(Month::class, 'month_id', 'id');
    }

    public  function gettype()
    {
        return $this->belongsTo(UsageType::class, 'usage_type_id', 'id');
    }
}
