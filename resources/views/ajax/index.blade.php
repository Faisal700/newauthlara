<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ajax crud</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <form id="addform">
        	@csrf
        	
        <div class="modal-body">	
		  <div class="form-group">
		    <label>First Name</label>
		    <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
		  </div>
		  <div class="form-group">
		    <label>Last Name</label>
		    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
		  </div>
		  <div class="form-group">
		    <label>Courses</label>
		    <input type="text" name="course" class="form-control" placeholder="Enter Course">
		  </div>
		  <div class="form-group">
		    <label>Section</label>
		    <input type="text" name="section" class="form-control" placeholder="Enter Section">
		  </div>
		    </div>
		    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Employee</button>
      </div>
</form>
    
    </div>
  </div>
</div>
	<div class="container">
		<div class="jumbotron">
			<div class="row">
					<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  Add Employee now
			</button>
			</div>
		</div>
		<div>
			<ul>
			@foreach ($employess as $employee)
			    <li>{{$employee->fname}}</li>
				<li>{{$employee->lname}}</li>
				<li>{{$employee->course}}</li>
				<li>{{$employee->section}}</li> <br>
				
			@endforeach
			</ul>
		</div>
	</div>

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
         		url:"{{ route('employee.store') }}",
         		data:$('#addform').serialize(),
         		success: function(response){
                   console.log(response)
                   $('#exampleModal').modal('hide')
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