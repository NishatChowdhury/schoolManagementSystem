<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['id', 'name', 'code', 'short_name', 'level', 'credit_fee'];

    public function ass_subject(){
        return $this->hasMany('App\AssignSubject');
    }
}
