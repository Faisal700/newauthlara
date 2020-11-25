@extends('layouts.app')
@section('content')
@section('data')

<div class="wrapperdiv">
   @if($movie)
   <div class="row pb-5">
   	<div class="col-4"></div>
   	<div class="col-4">
   	<div class="card" style="width: 20rem;">
	  <img src="{{ asset('uploads/'.$movie->poster) }}" class="card-img-top mt-2" alt="not display">
	  <div class="card-body">
	    <h5 class="card-title">{{$movie->title}}</h5>
	    <p class="card-text">{{$movie->genre}} | {{$movie->release_year}}</p>
	    <a href="{{ route('movies.index') }}" class="btn btn-primary">Go Back</a>
	  </div>
	</div>	
   	</div>
   	<div class="col-4"></div>
   </div>
   @endif
	</div>
@endsection