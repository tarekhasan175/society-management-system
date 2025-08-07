<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagorikSector extends \App\Model
{
    use HasFactory;


    protected $guarded=['id'];


    public  function wordareya()
    {
        return $this->belongsTo(NagorikWordAdd::class , 'nagorik_word_id', 'id');

    }
}
