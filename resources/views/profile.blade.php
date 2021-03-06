@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <img src="{{ asset('uploads/avatars/'.$user->avatar) }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px; " />
          <h2>{{$user->name}}'s Profile</h2>
          <form enctype="multipart/form-data" action="{{ route('profile') }}" method="post">
              @csrf
              <label>Update Profile Image</label> <br>
              <input type="file" name="avatar">
              <input type="submit" class="pull-right btn btn-sm btn-primary">
          </form>

        </div>
    </div>
</div>
@endsection

