<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationHistory extends Model
{
    protected $fillable = ['type','destination_count','user_id','sms_count','numbers','message','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
