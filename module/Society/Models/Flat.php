<?php

namespace Module\Society\Models;

use App\Models\Model;

class Flat extends \App\Model
{
    protected $table = 'flats';

    protected $guarded = ['id'];

    // public function generateBills()
    // {
    //     return $this->hasMany(GenerateBill::class, 'flatID', 'flats');
    // }

    // Relationship to GenerateBill (if it's not already defined)
    public function generateBills()
    {
        return $this->hasMany(GenerateBill::class, 'flat_id', 'id');
    }


    public function payments()
    {
        return $this->hasManyThrough(Payment::class, GenerateBill::class, 'flatID', 'generate_bill_id', 'flatID', 'id');
    }
    public function usagetype()
    {
        return $this->belongsTo(UsageType::class, 'usage_type_id', 'id');
    }

    public  function road()
    {
        return $this->belongsTo(Road::class, 'road_id', 'id');
    }
    public  function plot()
    {
        return $this->belongsTo(Road::class, 'road_id', 'id');
    }


    public  function getroad()
    {
        return $this->belongsTo(Road::class, 'road_id', 'id');
    }

    public  function getblock()
    {
        return $this->belongsTo(Block::class, 'block_id', 'id');
    }
    public  function getplot()
    {
        return $this->belongsTo(Plot::class, 'plot_id', 'id');
    }
    public  function getflat()
    {
        return $this->belongsTo(Flat::class, 'flat_id', 'id');
    }
}
