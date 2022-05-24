<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $dates = ['start','end'];

    protected $fillable = ['notice_type_id','notice_category_id','title','description','start','end','file'];

    public function type()
    {
        return $this->belongsTo(NoticeType::class,'notice_type_id');
    }

    public function category()
    {
        return $this->belongsTo(NoticeCategory::class,'notice_category_id');
    }
}
