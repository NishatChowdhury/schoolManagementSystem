<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = ['name'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function images()
    {
        return $this->hasManyThrough(Gallery::class,Album::class);
    }
}
