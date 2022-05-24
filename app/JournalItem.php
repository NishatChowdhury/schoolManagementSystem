<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class JournalItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'journal_items';

    protected $fillable = ['journal_id','coa_id','description','debit','credit'];

    /**
     * A journal item is belongs to a journal
     * @return BelongsTo
     */
    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class);
    }

    /**
     * A journal item is belongs to a chart of account
     * @return BelongsTo
     */
    public function coa(): belongsTo
    {
        return $this->belongsTo(COA::class,'coa_id');
    }
}
