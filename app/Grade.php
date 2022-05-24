<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['system', 'mark_from', 'mark_to', 'point_from', 'point_to', 'grade', 'comment'];
}
