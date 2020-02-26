<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'user_id', 'name', 'code', 'description'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
