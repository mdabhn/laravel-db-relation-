<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    protected $fillable = [
        'file_location', 'uploader_name', 'uploader_id', 'group_id', 'task_id'
    ];
}
