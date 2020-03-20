<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReqGroup extends Model
{
    protected $fillable = [
        'sender_id', 'group_id'
    ];
}
