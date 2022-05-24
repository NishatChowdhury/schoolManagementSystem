<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weeklyOff extends Model
{
    use HasFactory;
    protected $fillable = ['show_option'];
}
