<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <form method="post" action="{{ route('members.update',$member->id) }}">
 	@csrf
 	@method('PUT')
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-control">Name</label>
					<div class="col-sm-10">
						<input type="text" name="name" value="{{$member->name}}" id="name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-control">Email</label>
					<div class="col-sm-10">
						<input type="text" name="email" id="email" value="{{$member->email}}" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="age" class="col-sm-2 col-form-control">age</label>
					<div class="col-sm-10">
						<input type="text" name="age" id="age" value="{{$member->age}}" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-2 col-form-control">phone</label>
					<div class="col-sm-10">
						<input type="text" name="phone" id="phone" value="{{$member->profile->phone}}" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="address" class="col-sm-2 col-form-control">address</label>
					<div class="col-sm-10">
						<input type="text" name="address" id="address" value="{{$member->profile->address}}" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="notes" class="col-sm-2 col-form-control">notes</label>
					<div class="col-sm-10">
						<input type="text" name="notes" id="notes" value="{{$member->profile->notes}}" class="form-control">
					</div>
				</div>
				<div class="col-sm-10">
						<button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
					</div>
 </form>
</body>
</html>