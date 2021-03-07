<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intrest extends Model
{
    protected $fillable = [
        'general', 'one_week', 'one_month'
    ];
}
