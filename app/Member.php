<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $fillable = ['name','email','age'];
    public function profile()
    {
    	return $this->hasOne('App\Profile');
    }

    public function profiles()
    {
    	return $this->hasMany('App\Profile');
    }
}
