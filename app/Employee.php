<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'title',
        'first_name',
        'nick_name',
        'last_name',
        'status',
    ];
}
