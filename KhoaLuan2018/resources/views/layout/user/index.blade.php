<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="assets/user/css/reset.css">
	<link rel="stylesheet" href="assets/user/css/style.css">
	<link rel="stylesheet" href="assets/user/css/all.css"> 
	@yield('css')
	<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script> 
</head>

<body onload="timeclock()">  
	<div class="container"> 
    @include('layout/user/header')
		<main class="main">
		@include('layout/user/left_header')

        @yield('content')

        @include('layout/user/right_header')
		</main> <!-- END MAIN -->
		<div class="clickTop"><i class="fas fa-angle-up"></i></div>  
	</div>
	@include('layout/user/footer')
</body>

</html>
<script src='assets/user/js/style.js'></script>  
@yield('script')