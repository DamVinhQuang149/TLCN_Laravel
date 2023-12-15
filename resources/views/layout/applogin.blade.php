

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('assets//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles3.css') }}">
	
</head>

<body>
	@yield('content')
    <script src="{{ asset('assets//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	{{-- @if (session('success'))
    <script>
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 4000
        });
    </script>
	@elseif (session('warning'))
		<script>
			Swal.fire({
				position: "top-center",
				icon: "warning",
				title: "{{ session('warning') }}",
				showConfirmButton: false,
				//timer: 4000
			});
		</script>
	@elseif (session('error'))
		<script>
			Swal.fire({
				position: "top-center",
				icon: "error",
				title: "{{ session('error') }}",
				showConfirmButton: false,
				//timer: 4000
			});
		</script>

	@elseif ($errors->any())
		@foreach ($errors->all() as $error)
			<script>
			Swal.fire({
				position: "top-center",
				icon: "error",
				title: "failed!!!",
				text: "{{ $error }}",
				showConfirmButton: false,
			});
			</script>
		@endforeach
	@endif --}}
	
</body>

</html>