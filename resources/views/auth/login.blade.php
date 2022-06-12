<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

    <title>Halaman {{ $title }}</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('css/my-style.css') }}">
    
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/font-awesome.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('backend/stylesheets/theme.css') }}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('backend/stylesheets/skins/default.css') }}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('backend/stylesheets/theme-custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset("backend/vendor/modernizr/modernizr.js") }}"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="{{ asset('backend/images/logo.png') }}" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
            @if(session()->has("loginError"))
            <div class="well danger text-center">
              {{ session("loginError") }}
            </div>
            @endif
						<form action="{{ route('auth.login') }}" method="post">
              @csrf
							<div class="form-group mb-lg @error('username') has-error @enderror">
								<label for="username">Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" id="username" autofocus/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
                @error('username')
                <small class="text-danger">
                  {{ $message }}
                </small>
                @enderror
							</div>

							<div class="form-group mb-lg @error('password') has-error @enderror">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" id="password"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
                @error('password')
                <small class="text-danger">
                  {{ $message }}
                </small>
                @enderror
							</div>

							<div class="row text-center">
                <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                <button type="reset" class="btn btn-primary hidden-xs">Reset</button>
                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{ asset('backend/vendor/jquery/jquery.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.js') }}"></script>
		<script src="{{ asset("backend/vendor/nanoscroller/nanoscroller.js") }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('backend/vendor/magnific-popup/magnific-popup.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('backend/javascripts/theme.js') }}"></script>
		
		<!-- Theme Custom -->
		<script src="{{ asset('backend/javascripts/theme.custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ asset('backend/javascripts/theme.init.js') }}"></script>

	</body><img src="http://www.ten28.com/fref.jpg">
</html>