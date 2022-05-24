<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoaGrandparent extends Model
{
    use HasFactory;

    protected $table = 'coa_grandparents';

    protected $fillable = ['coa_great_grandparents_id','name'];

    public function childs()
    {
        return $this->hasMany(CoaParent::class,'coa_grandparents_id');
    }
}
