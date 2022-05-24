<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class COA extends Model
{
    use HasFactory;

    protected $table = 'coa';

    protected $fillable = ['name','code','coa_grandparents_id','coa_parents_id','is_enabled','description','created_by'];

    /**
     * A Chart of Account is belongs to a parents
     * @return BelongsTo
     */
    public function parents(): BelongsTo
    {
        return $this->belongsTo(CoaParent::class,'coa_parents_id');
    }

    /**
     * A Chart of Account is belongs to a grandparents
     * @return BelongsTo
     */
    public function grandparents(): BelongsTo
    {
        return $this->belongsTo(CoaGrandparent::class,'coa_grandparents_id');
    }

    /**
     * A Chart of Account has many journal items
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(JournalItem::class,'coa_id');
    }
}
