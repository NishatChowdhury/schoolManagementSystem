<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInformation extends Model
{
    protected $table = 'site_information';

    protected $fillable = ['title','name','name_size','name_font','name_color','bn','bn_size','bn_font','bn_color','address','institute_code','eiin','phone','email','logo','logo_height','map'];
}
