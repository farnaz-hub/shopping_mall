<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $guarded = ['created_at', 'updated_at'];


    public function addresses(){
        return $this->hasMany(Address::class);
    }

}


