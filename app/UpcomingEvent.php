<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpcomingEvent extends Model
{
    protected $dates = ['date'];

    protected $fillable = ['title','date','time','venue','details','image'];
}
