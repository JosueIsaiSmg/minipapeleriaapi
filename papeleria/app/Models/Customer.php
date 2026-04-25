<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','phone','email', 'social_profile_url', 'facebook_url'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
