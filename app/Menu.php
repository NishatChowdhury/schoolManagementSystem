<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['menu_id','type','name','uri','page_id','system_page','url','order','editable','deletable'];

    public function children()
    {
        return $this->hasMany(Menu::class);
    }

    public function hasChild()
    {
        return $this->children()->count() > 0;
    }

    /**\
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
