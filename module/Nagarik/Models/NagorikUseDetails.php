<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NagorikUseDetails extends \App\Model
{
    use HasFactory;


    protected $guarded=['id'];


    public function user()
    {

        return $this->belongsTo(User::class , 'id');

    }


}
