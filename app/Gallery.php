<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['album_id','title','description','tags','image'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
