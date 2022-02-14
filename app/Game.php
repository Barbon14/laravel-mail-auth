<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillabler = [

        'title',
        'subtitle',
        'rating'
    ];
}
