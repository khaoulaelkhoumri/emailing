<!doctype html>
<html lang="en">
	
<!-- Mirrored from bootstrap.gallery/le-rouge/design-blue/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 09:11:24 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{ asset('front/assets/img/fav.png')}}"/>

		<!-- Title -->
		<title>Le Rouge Admin Template - Login</title>
		
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css')}}" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="{{ asset('front/assets/css/main.css')}}" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			@if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-alert-outline me-2"></i>
                @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
			<form action="{{ route('login')}}" method="POST">
                @csrf
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									<img src="{{ asset('front/assets/img/logo-dark.png')}}" alt="Le Rouge Admin Dashboard" />
								</a>
								<h5>Welcome back,<br />Please Login to your Account.</h5>
								<div class="form-group">
									<input name="email" type="text" class="form-control" placeholder="Email Address" />
								</div>
								<div class="form-group">
									<input name="password" type="password" class="form-control" placeholder="Password" />
								</div>
								<div class="actions mb-4">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="remember_pwd">
										<label class="custom-control-label" for="remember_pwd">Remember me</label>
									</div>
									<button type="submit" class="btn btn-primary">Login</button>
								</div>
								<div class="forgot-pwd">
									<a class="link" href="forgot-pwd.html">Forgot password?</a>
								</div>
								<hr>
								<div class="actions align-left">
									<span class="additional-link">New here?</span>
									<a href="signup.html" class="btn btn-dark">Create an Account</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

	</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-blue/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 09:11:24 GMT -->
</html>