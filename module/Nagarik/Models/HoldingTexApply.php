<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HoldingTexApply extends \App\Model
{
    use HasFactory;


    protected $guarded=['id'];

    public function paymentModel()
    {
        return $this->hasOne(PaymentModel::class, 'source_id', 'id');
    }

    public  function cityarea()
    {
        return $this->belongsTo(CityAreaAdd::class , 'city_area_id', 'id');

    }

    public  function wordareya()
    {
        return $this->belongsTo(NagorikWordAdd::class , 'nagorik_word_id', 'id');

    }


    public  function nagoriksector()
    {
        return $this->belongsTo(NagorikSector::class , 'nagorik_sector_id', 'id');

    }

    public  function nagorikbloc()
    {
        return $this->belongsTo(NagorikBlock::class , 'nagorik_block_id', 'id');

    }

    public  function nagorikroad()
    {
        return $this->belongsTo(NagorikRoadAdd::class , 'nagorik_road_id', 'id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function landType()
    {
        return $this->belongsTo(NagorikLandType::class, 'h_land_use_type', 'id');
    }
}
