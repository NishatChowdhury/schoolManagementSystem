<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPivot extends Model
{
    protected $table ='payment_pivots';
    protected $fillable = ['stu_payment_id','category_id','amount'];

    public function fee_categories(){
        return $this->belongsTo(FeeCategory::class,'category_id');
    }
}
