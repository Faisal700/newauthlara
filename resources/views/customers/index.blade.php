<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>index</title>
	<link rel="stylesheet" href="">
</head>
<body>
	@foreach ($companies as $company)
		{{$company->name}}
		<ul>
		@foreach ($company->customers as $customer)
			<li>{{$customer->name}}</li>
		@endforeach
		</ul>
	@endforeach
</body>
</html>