<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;
class UserController extends Controller
{
    public function profile()
    {
    	return view('profile', array('user'=>Auth::user()));
    }

    public function update_avatar(Request $request)
    {
    	if($request->hasFile('avatar'))
    	{
    		$avatar = $request->file('avatar');
    		$fileName = time().'.'. $avatar->getClientOriginalExtension();
    		$avatar->move(public_path('images'), $fileName);
    		$user = Auth::user();
    		$user->avatar = $fileName;
    		$user->save();
    	}
    	return view('profile', array('user'=>Auth::user()));
    }
}
