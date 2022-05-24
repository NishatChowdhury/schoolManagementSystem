<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['name','top_bar_background','top_bar_color','header_background','header_color','menu_background','menu_color','submenu_background','submenu_color','inner_background','inner_color','footer_background','footer_color'];

    /**
     * A theme has only one site
     * @return HasOne
     */
    public function current(): HasOne
    {
        return $this->hasOne(SiteInformation::class);
    }
}
