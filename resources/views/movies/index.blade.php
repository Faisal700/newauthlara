@extends('layouts.app')
@section('content')
@section('data')
<div class="wrapperdiv">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Genres</th>
      <th scope="col">Release Year</th>
    </tr>
  </thead>
  @if(session()->has('message'))
    <div class="alert alert-danger container">
      {{session('message')}}
    </div>
  @endif
  @if($movies)
  <tbody>
    @foreach($movies as $movie)
    <tr>
      <td><img class="align-middle" src="{{ asset('uploads/'.$movie->poster) }}" alt="user_img" width="40px"></td>
      <td class="align-middle">{{$movie->title}}</td>
      <td class="align-middle">{{$movie->genre}}</td>
      <td class="align-middle">{{$movie->release_year}}</td>
      <td class="align-middle">
        <form method="post" action="{{ route('movies.destroy', $movie->id) }}">
        <a href="{{ route('movies.show',$movie->id) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('movies.edit',$movie->id) }}" class="btn btn-danger">Edit</a>
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete')" >Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
  @endif
</table>
<div class="d-flex">
  <div class="mx-auto">
    {!! $movies->links() !!}
  </div>
</div>
</div>
@endsection