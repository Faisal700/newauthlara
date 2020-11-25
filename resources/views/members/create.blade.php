<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mmembers</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<!-- CSS -->
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

 <form id="addform">
 	@csrf
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-control">Name</label>
					<div class="col-sm-10">
						<input type="text" name="name" id="name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-control">Email</label>
					<div class="col-sm-10">
						<input type="text" name="email" id="email" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="age" class="col-sm-2 col-form-control">age</label>
					<div class="col-sm-10">
						<input type="text" name="age" id="age" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-2 col-form-control">phone</label>
					<div class="col-sm-10">
						<input type="text" name="phone" id="phone" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="address" class="col-sm-2 col-form-control">address</label>
					<div class="col-sm-10">
						<input type="text" name="address" id="address" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="notes" class="col-sm-2 col-form-control">notes</label>
					<div class="col-sm-10">
						<input type="text" name="notes" id="notes" class="form-control">
					</div>
						<div class="form-group row">
					<label for="profile" class="col-sm-2 col-form-control">notes</label>
					<div class="col-sm-10">
						<input type="text" name="notes" id="notes" class="form-control">
					</div>
				</div>
				<div class="col-sm-10">
						<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
					</div>
 </form>
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
         $('#addform').on('submit',function(e){
         	e.preventDefault();
         	console.log('submitted');
         	$.ajax({
         		type:"POST",
         		url:"{{ route('members.store') }}",
         		data:$('#addform').serialize(),
         		success: function(response){
                   console.log(response)
                   alert('data is save');
         		},
         		errro:function(error){
         			console.log(error)
         			alert('error');
         		}
         	})
         });
		});  
	</script>
</body>
</html>