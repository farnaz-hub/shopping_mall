<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['created_at', 'updated_at'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function solver()
    {
        return $this->belongsTo(User::class);
    }


    public function owner()
    {
        return $this->belongsTo(User::class);
    }


    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
}
