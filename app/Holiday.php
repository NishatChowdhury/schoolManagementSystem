<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    //use HasFactory;

    protected $fillable = ['name'];

    public function duration()
    {
        return $this->hasMany(HolidayDuration::class);
    }
}
