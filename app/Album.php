<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name','gallery_category_id'];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class,'gallery_category_id');
    }

    public function images()
    {
        return $this->hasMany(Gallery::class);
    }
}
