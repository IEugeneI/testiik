<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;

    public function profile()
    {
        return $this->belongsTo('App\Profile', 'id', 'profile_id');
    }
}
