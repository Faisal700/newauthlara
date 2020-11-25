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
            $avatar = rand() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $avatar)->resize(300,300);
    		// $fileName = time().'.'. $avatar->getClientOriginalExtension();
    		// Image::make($request->file('avatar'))->resize(300,300)->save(public_path('/uploads/avatars/'. $fileName));
    		$user = Auth::user();
    		$user->avatar = $fileName;
    		$user->save();
    	}
    	return view('profile', array('user'=>Auth::user()));
    }
}
