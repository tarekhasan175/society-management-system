<?php

namespace Module\Permission\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded = ['id'];

    public function submodules()
    {
        return $this->hasMany(Submodule::class);
    }

    public function scopeActive($q)
    {
        return $q->whereStatus(1);
    }
}
