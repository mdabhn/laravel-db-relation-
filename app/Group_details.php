<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_details extends Model
{
    protected $fillable = [
        'group_id', 'task', 'type', 'done_by', 'created_by'
    ];
    public function group()
    {
        $this->belongsTo(Group::class);
    }
}
