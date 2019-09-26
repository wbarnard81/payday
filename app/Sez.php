<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sez extends Model
{
    protected $fillable = [
        'code',
        'description',
    ];
}
