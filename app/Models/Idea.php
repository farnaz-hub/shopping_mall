<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = ['created_at', 'updated_at'];


    public function task()
    {
        return $this->belongsTo(Task::class);
    }


    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
