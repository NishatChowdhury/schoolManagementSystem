<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationSetting extends Model
{
    protected $fillable=['api_key','sender_id'];
}
