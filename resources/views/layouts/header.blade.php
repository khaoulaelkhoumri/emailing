<!doctype html>
<html lang="en">
	
<!-- Mirrored from bootstrap.gallery/le-rouge/design-blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 08:57:04 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
	<meta name="author" content="ParkerThemes">
	<link rel="shortcut icon" href="{{asset('front/assets/img/fav.png')}}" />

	<!-- Title -->
	<title>Le Rouge Admin Template - Admin Dashboard</title>

	<!-- *************
		************ Common Css Files *************
	************ -->
	<!-- Bootstrap css -->
	<link rel="stylesheet" href=" {{ asset('front/assets/css/bootstrap.min.css')}}">
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="{{ asset('front/assets/fonts/style.css')}}">
	<!-- Main css -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/main.css')}}">

	<!-- *************
		************ Vendor Css Files *************
	************ -->
	<!-- DateRange css -->
	<link rel="stylesheet" href="{{ asset('front/assets/vendor/daterange/daterange.css')}}" />
	@yield('styles')
</head>
<body>
	<!-- Header start -->
	<header class="header">
		<div class="toggle-btns">
			<a id="toggle-sidebar" href="#">
				<i class="icon-list"></i>
			</a>
			<a id="pin-sidebar" href="#">
				<i class="icon-list"></i>
			</a>
		</div>
		<div class="header-items">
			<!-- Header actions start -->
			<ul class="header-actions">
				<li class="dropdown">
					<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
						<span class="user-name">{{(Auth::user())?Auth::user()->name:''}}</span>
						<span class="avatar">
							<img src="{{asset('front/assets/img/user6.png')}}" alt="avatar">
							<span class="status busy"></span>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
						<div class="header-profile-actions">
							<div class="header-user-profile">
								<div class="header-user">
									<img src="{{asset('front/assets/img/user6.png')}}" alt="Admin Template">
								</div>
								<h5>{{(Auth::user())?Auth::user()->name:''}}</h5>
								<p>
									@if (Auth::user())
										@switch(Auth::user()->role_id)
											@case(1) Utilisateur<@break
											@case(2) Admin @break 
										@endswitch 
									@endif
								</p>
							</div>
							<a href="{{ route('admin.profil')}}"><i class="icon-user1"></i> Mon Profile</a>
							<a href="#"><i class="icon-log-out1"></i> Déconnexion</a>
						</div>
					</div>
				</li>
			</ul>						
			<!-- Header actions end -->
		</div>
	</header>
	<!-- Header end -->
	<!-- Page header start -->
	<div class="page-header">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">Home</li>
			@foreach ($breadCamps as $item)
				<li class="breadcrumb-item {{($loop->last)?"active":""}}">{{$item}}</li>
			@endforeach
		</ol>
	</div>
	<!-- Page header end -->

@section('script')
	{{-- Slimscroll JS--}} 
	<script src="{{ asset('front/assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>
	<script src="{{ asset('front/assets/js/main.js')}}"></script> 

	<!-- Daterange -->
	<script src="{{ asset('front/assets/vendor/daterange/daterange.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/daterange/custom-daterange.j')}}s"></script>

	<!-- Polyfill JS -->
	<script src="{{ asset('front/assets/vendor/polyfill/polyfill.min.js')}}"></script>

	<!-- Apex Charts -->
	<script src="{{ asset('front/assets/vendor/apex/apexcharts.min.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/apex/admin/visitors.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/apex/admin/deals.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/apex/admin/income.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/apex/admin/customers.js')}}"></script>
@endsection

