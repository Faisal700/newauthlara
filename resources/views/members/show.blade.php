<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>show now</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<h1>{{$member->name}}</h1>
	<h1>{{$member->email}}</h1>
	<h1>{{$member->age}}</h1>
	<h1>{{$member->profile->phone}}</h1>
	<h1>{{$member->profile->address}}</h1>
	<h1>{{$member->profile->notes}}</h1>
	<a href="{{ route('members.index') }}" class="btn btn-primary">Go Back</a>
</body>
</html>