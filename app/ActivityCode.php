<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityCode extends Model
{
    protected $fillable = [
        'code',
        'description',
    ];
}
