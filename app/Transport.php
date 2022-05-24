<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable =['location_id','student_id','status'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
