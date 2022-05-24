<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeritList extends Model
{
    protected $fillable = ['session_id','class_id','group_id','ssc_roll','board','passing_year','name','status'];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function applied()
    {
        return $this->hasOne(AppliedStudent::class,'ssc_roll','ssc_roll');
    }
}
