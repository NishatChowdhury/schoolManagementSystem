<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    protected $table = 'coa';

    protected $fillable = ['name','code','coa_parents_id','coa_grandparents_id','is_enabled','description'];

    public function parent()
    {
        return $this->belongsTo(CoaParent::class,'coa_parent_id');
    }

    function scopeActive($coa){
        return $coa->whereIsActive(1)->get();
    }

    function journals(){
        return $this->hasMany(Journal::class);
    }

}
