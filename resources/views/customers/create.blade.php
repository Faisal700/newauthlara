<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>create</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="row">
        <div class="col-12">
            <h1>Add New Customer</h1>
        </div>
    </div>

    <div class="row" style="max-width: 500px">
        <div class="col-12">
            <form action="{{ route('customers.store') }}" method="POST">
                <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
    <div>{{ $errors->first('name') }}</div>
</div>

		<div class="form-group">
		    <label for="email">Email</label>
		    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
		    <div>{{ $errors->first('email') }}</div>
		</div>
		<div class="form-group">
		    <label for="phone">Phone</label>
		    <input type="text" name="phone" value="{{ old('phone') ?? $customer->phone }}" class="form-control">
		    <div>{{ $errors->first('phone') }}</div>
		</div>
         
		<div class="form-group">
		    <label for="company_id">Company</label>
		    <select name="company_id" id="company_id" class="form-control">
		        @foreach ($companies as $company)
		      <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
		        @endforeach
		    </select>
		</div>

		@csrf

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>
</body>
</html>