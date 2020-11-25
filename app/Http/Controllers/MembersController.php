<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Profile;
class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::with('profiles')->get();
        return view('members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->age = $request->age;
        $member->save();
        $profile = new Profile;
        $profile->phone =$request->phone;
        $profile->address = $request->address;
        $profile->notes = $request->notes;
        $member->profile()->save($profile);
        return redirect()->route('members.index')->with('message','Data is Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member->name = $request->name;
        $member->email = $request->email;
        $member->age = $request->age;
        $member->update();
        $member->profile->phone = $request->phone;
        $member->profile->address = $request->address;
        $member->profile->notes = $request->notes;
        $member->profile->push();
        return redirect()->route('members.index')->with('message','Data is updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('message','Selected Record is deleted successfully');
    }
}
