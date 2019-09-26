<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'employee_name',
        'date',
        'employer_name',
        'description',
        'irp5_code',
        'amount',
        'note',
    ];
}
