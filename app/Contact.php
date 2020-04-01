<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Contact extends Model
{
    protected $guarded = [];

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
