<?php

namespace Module\Society\Models;

use App\Models\Model;

class Block extends \App\Model
{
    protected $table = 'blocks';
    protected $fillable = [
        'blockName',
    ];
}
