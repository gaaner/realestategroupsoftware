<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login</title>
	<meta name="description" content="Kiwi is a premium adman dashboard template based on bootstrap">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- core plugins -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/animate.css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600">
	<!-- core plugins -->
	
	<!-- styles for the current page -->
	<link rel="stylesheet" href="{{ asset('assets/examples/css/pages/login.css') }}">
	<!-- / styles for the current page -->
</head>
<body class="simple-page page-login">
<!--[if lt IE 10]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<header class="simple-page-header">
		<div class="home-btn">
			<a href="/" class="btn btn-outline-secondary"><i class="fa fa-home animated zoomIn"></i></a>
		</div>
	</header>

	<div class="simple-page-wrap">
		<div class="simple-page-content mb-4">
	<div class="simple-page-logo animated zoomIn">
		<a href="index.html">
			<span><i class="fa fa-houzz"></i></span>
			<span>Kiwi</span>
		</a>
	</div><!-- logo -->

	<div class="simple-page-form animated flipInY" id="login-form">
		@if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-outline alert-danger" role="alert">
					<i class="fa fa-bug mr-3"></i>{{ $error }}
				</div>
            @endforeach
        @endif
		<form action="{{ route('admin.authenticate') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<input id="sign-in-email" name="email" type="email" class="form-control" placeholder="Email" required>
			</div>

			<div class="form-group">
				<input id="sign-in-password" name="password" type="password" class="form-control" placeholder="Password" required>
			</div>

			<input type="submit" class="btn btn-primary" value="ENTRAR">
		</form>

	</div><!-- #login-form -->
</div><!-- /.simple-page-content -->

	</div><!-- .simple-page-wrap -->

	<!-- core plugins -->
	<script src="{{ asset('assets/vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bower_components/tether/dist/js/tether.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>