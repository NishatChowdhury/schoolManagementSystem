<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeePivot extends Model
{
    protected $table ='fee_pivots';
    protected $fillable = ['fee_category_id','fee_setup_id','amount'];

    /**
     * A fee pivot is belongs to a category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(FeeCategory::class,'fee_category_id');
    }

}
