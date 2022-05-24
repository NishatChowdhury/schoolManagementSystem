<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoaParent extends Model
{
    use SoftDeletes;

    protected $table = 'coa_parents';

    protected $fillable = ['coa_grandparents_id','name'];

    /**
     * A Parents is belongs to Grandparents
     * @return BelongsTo
     */
    public function parents(): BelongsTo
    {
        return $this->belongsTo(COA::class,'coa_grandparents_id');
    }

    public function children()
    {
        return $this->hasMany(COA::class,'coa_parents_id');
    }
}
