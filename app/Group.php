<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function groups(){
        return $this->hasMany('App\SessionClass');
    }
}
