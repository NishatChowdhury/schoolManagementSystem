<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_title','book_code','author_name','description','category_id','no_of_issue','shelve'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class,'category_id');
    }

    /**
     * A book has many issues
     * @return HasMany
     */
    public function issue()
    {
        return $this->hasMany(IssueBook::class,'book_id')->where('is_return',0);
    }

    /**
     * A book has many returns
     * @return HasMany
     */
    public function return()
    {
        return $this->hasMany(IssueBook::class,'book_id')->where('is_return',1);
    }

}
