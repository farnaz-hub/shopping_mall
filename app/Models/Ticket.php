<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = ['created_at', 'updated_at'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
