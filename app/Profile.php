<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'surname', 'lastname', 'email'];

    public function photos()
    {
        return $this->hasMany('App\Photo', 'profile_id', 'id');
    }
}
