<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'profit_code',
        'loss_code',
        'desctiption',
    ];
}
