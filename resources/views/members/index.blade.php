<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>memebrs</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	@foreach ($members as $member)
		<ul>
			<li>{{$member->name}}</li>
			<li>{{$member->email}}</li>
			<li>{{$member->age}}</li>
			@foreach ($member->profiles as $profile)
				{{-- expr --}}
			
			<li>{{$profile->phone}}</li>
			<li>{{$profile->address}}</li>
			<li>{{$profile->notes}}</li>
			<form method="post" action="{{ route('members.destroy', $member->id) }}">
			<a href="{{ route('members.create') }}" class="btn btn-primary">Create</a>	
			<a href="{{ route('members.show',$member->id) }}" class="btn btn-primary">Show</a>
			<a href="{{ route('members.edit',$member->id) }}" class="btn btn-primary">Edit</a>
			@csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete')" >Delete</button>
        </form>
		</ul>
	@endforeach	
	@endforeach
</body>
</html>