<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['created_at', 'updated_at'];


    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
