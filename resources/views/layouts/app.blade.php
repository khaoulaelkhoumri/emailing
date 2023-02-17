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
	<link rel="shortcut icon" href="{{ asset('front/assets/img/fav.png')}}" />

	<!-- Title -->
	<title>Le Rouge Admin Template - Admin Dashboard</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css')}}"/>
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="{{ asset('front/assets/fonts/style.css')}}"/>
	<link rel="stylesheet" href="{{ asset('front/assets/css/main.css')}}">

	<!-- *************
		************ Vendor Css Files *************
	************ -->
	<!-- DateRange css -->
	<link rel="stylesheet" href="{{ asset('front/assets/vendor/daterange/daterange.css')}}" />
	@yield('style')
</head>
<body>
	<!-- Loading starts -->
	<div id="loading-wrapper">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Loading ends -->
	<!-- Page wrapper start -->
	<div class="page-wrapper">			
			@include('layouts.sidebare')
		<!-- Page content start  -->
		@php
			if(!isset($breadCamps))
			$breadCamps = [];
		@endphp
		<div class="page-content">
				@include('layouts.header',$breadCamps)
				@yield('content')
		</div>
		<!-- Page content end -->
	</div> 

	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="{{ asset('front/assets/js/jquery.min.js')}}"></script>
	<script src="{{ asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('front/assets/js/moment.js')}}"></script>

		{{--Slimscroll JS --}}
	<script src="{{ asset('front/assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>

	<!-- Daterange -->
	<script src="{{ asset('front/assets/vendor/daterange/daterange.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/daterange/custom-daterange.j')}}s"></script>

	<!-- Polyfill JS -->
	<script src="{{ asset('font/assets/vendor/polyfill/polyfill.min.js')}}"></script>

	<!-- Main JS -->
	<script src="{{ asset('front/assets/js/main.js')}}"></script>
	@yield('script')
</body>
</html>