<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = ['phone','address','notes','member_id'];
    public function member()
    {
    	return $this->belongsTo('App\Member');
    }
}
