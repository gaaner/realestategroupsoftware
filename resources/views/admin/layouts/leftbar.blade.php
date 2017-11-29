<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title')</title>
	<meta name="description" content="Kiwi is a premium adman dashboard template based on bootstrap">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	
	<!-- theme customizier \ demo only -->
	<link rel="stylesheet" href="{{ asset('assets/examples/css/theme-customizer.css') }}">
	<script src="{{ asset('assets/examples/js/theme-customizer.js') }}"></script>
	
	<!-- core plugins -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/hamburgers.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/animate.css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/switchery/dist/switchery.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/sweetalert/dist/sweetalert.css') }}">
	<!-- Site-wide styles -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('leftbar/css/site.css') }}">

	<!-- plugins for the current page -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/owl.carousel.css') }}">

	<!-- current page styles -->
	<link rel="stylesheet" href="{{ asset('assets/examples/css/dashboards/dashboard.v1.css') }}">
	
	<!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600">

	<script src="{{ asset('assets/vendor/bower_components/breakpoints.js/dist/breakpoints.min.js') }}"></script>
	<script>
		Breakpoints({xs: {min:0,max:575},sm: {min:576,max:767},md: {min:768,max:991},lg: {min:992,max:1199},xl: {min:1200,max:Infinity}});
	</script>
	@yield('pageCss')
</head>
<body class="menubar-left menubar-light dashboard dashboard-v1">
	<!--[if lt IE 10]>
	  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<nav class="site-navbar navbar fixed-top navbar-toggleable-sm navbar-inverse bg-indigo-500">
		<!-- navbar header -->
		<div class="navbar-header">
			<a href="../index.html" class="navbar-brand">
				<span class="brand-icon"><i class="fa fa-houzz"></i></span>
				<span class="brand-name hidden-fold">Kiwi</span>
			</a>
		</div><!-- .navbar-header -->
		
		<div class="collapse navbar-collapse" id="site-navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item hidden-sm-down">
					<button data-toggle="menubar-fold" class="nav-link hamburger hamburger--arrowalt is-active js-hamburger" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</li>
				<li class="nav-item d-flex align-items-center">
					<h5 class="hidden-sm-down m-0 ml-3 page-title">@yield('topTitle')</h5>
				</li>
			</ul>
		
			
		</div><!-- /.navbar-collapse -->	</nav><!-- .site-navbar -->

	<div class="site-wrapper">
		<aside class="site-menubar">
			<div class="site-user">
				<div class="media align-items-center">
					<a href="javascript:void(0)">
						<img class="avatar avatar-circle" src="../assets/global/images/221.jpg" alt="avatar"/>
					</a>
			
					<div class="media-body hidden-fold">
						<h6 class="mborder-a-0"><a href="javascript:void(0)" class="username">{{Auth::user()->name}}</a></h6>
						<div class="dropdown">
							<a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<small>Web Developer</small>
								<span class="caret"></span>
							</a>
							<div class="dropdown-menu animated scaleInDownRight">
								<div role="separator" class="divider"></div>
								<form action="{{ route('admin.logout') }}" method="POST">
									{{ csrf_field() }}
									<button type="submit" class="dropdown-item" href="logout.html">
										<span class="mr-1"><i class="fa fa-power-off"></i></span>
										<span>Logout</span>
									</button>
								</form>
							</div>
						</div>
					</div><!-- /.media-body -->
				</div><!-- ./media -->
			</div><!-- ./site-user -->
			
			<div class="menubar-scroll-wrapper">
				<div class="site-menubar-inner">
					<ul class="site-menu">
					
						<li>
							<a href="{{ route('admin.property.index') }}">
								<i class="menu-icon zmdi zmdi-collection-item zmdi-hc-lg"></i>
								<span class="menu-text">Imóveis</span>
							</a>
						</li>

						<li>
							<a href="{{ route('admin.user.index') }}">
								<i class="menu-icon zmdi zmdi-account-circle zmdi-hc-lg"></i>
								<span class="menu-text">Usuários</span>
							</a>
						</li>
					
					</ul><!-- .site-menu -->	</div><!-- .menubar-scroll-inner -->
			</div><!-- /.menubar-scroll-wrapper -->
		</aside><!-- site-menubar -->

		<main class="site-main">
			<div class="site-content">
				@if(session()->has('success'))
					<div class="alert alert-outline alert-success" role="alert">
						<i class="fa fa-bug mr-3"></i>{{ session('success') }}
					</div>
				@endif
				@if($errors->any())
			        @foreach($errors->all() as $error)
			            <div class="alert alert-outline alert-danger" role="alert">
							<i class="fa fa-bug mr-3"></i>{{ $error }}
						</div>
			        @endforeach
			    @endif
				@yield('content')
			</div><!-- .site-content -->

			<footer class="site-footer">
				<div class="copyright">Made with <i class="fa fa-heart text-danger"></i> by <a class="text-info" href="http://spantags.com">SpanTags</a> 2017</div>
				<div class="footer-menu">
					<a href="javascript:void(0)">Careers</a>
					<a href="javascript:void(0)">Privacy Policy</a>
					<a href="javascript:void(0)">Feedback</a>
				</div>
				
			</footer><!-- /.site-footer -->
		</main><!-- .site-main -->
	</div><!-- ./sit-wrapper -->

	<div id="site-search" class="site-search">
		<form action="#" class="site-search-form">
			<input class="search-field" type="search" placeholder="Search..."/>
			<span class="search-icon">
				<i class="fa fa-search"></i>
			</span>
			<button type="button" class="site-search-close" data-toggle="site-search">
				<i class="fa fa-close"></i>
			</button>
		</form>
		<div class="site-search-backdrop" data-toggle="site-search"></div>
	</div><!-- ./site-search -->


<div id="site-panel" class="site-panel">
	<div class="site-panel-tabs">
		<!-- tabs list -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" href="#friends-panel" data-toggle="tab" role="tab">
					<i class="zmdi zmdi-comments zmdi-hc-lg"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#notifications-panel" data-toggle="tab" role="tab">
					<i class="zmdi zmdi-notifications zmdi-hc-lg"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#settings-panel" data-toggle="tab" role="tab">
					<i class="zmdi zmdi-settings zmdi-hc-lg"></i>
				</a>
			</li>
		</ul><!-- .nav-tabs -->
	
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="friends-panel">
				<div class="scroll-container">
					<div class="py-4 px-3">
						<h6 class="text-uppercase m-0 text-muted">Active Now</h6>
					</div>
	
					<div class="media-list">
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/203.jpg" alt="">
								<i class="status status-online"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Patrice Semo</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/101.jpg" alt="">
								<i class="status status-online"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Audry Rowbotham</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/202.jpg" alt="">
								<i class="status status-online"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Jonathan Radej</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
					</div><!-- /.media-list -->
	
					<div class="py-4 px-3">
						<h6 class="text-uppercase m-0 text-muted">Other Users</h6>
					</div>
	
					<div class="media-list">
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/204.jpg" alt="">
								<i class="status status-away"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Joelle Pabon</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/201.jpg" alt="">
								<i class="status status-away"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Fae Atamanczyk</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/101.jpg" alt="">
								<i class="status status-away"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">German Rosch</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/102.jpg" alt="">
								<i class="status status-away"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Aurora Nemet</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/103.jpg" alt="">
								<i class="status status-busy"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Letisha Eroman</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/105.jpg" alt="">
								<i class="status status-busy"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Zina Sivert</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/211.jpg" alt="">
								<i class="status status-busy"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Annie Vanderbeek</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<div class="avatar avatar-circle">
								<img src="../assets/global/images/208.jpg" alt="">
								<i class="status status-busy"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Karoline Herrling</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
					</div><!-- /.media-list -->
				</div><!-- /.scroll-container -->
			</div><!-- /.tab-pane -->
	
			<div role="tabpanel" class="tab-pane" id="notifications-panel">
				<div class="scroll-container">
					<div class="py-4 px-3">
						<h6 class="text-uppercase m-0 text-muted">Notifications</h6>
					</div>
					<div class="media-list">
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-success" data-plugin="firstLitter" data-target="#notification-1"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-1">Raye Nolton</h6>
								<small>Lorem ipsum dolor sit amet.</small>
							</div>
						</a>
						
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-info" data-plugin="firstLitter" data-target="#notification-02"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-02">Lucretia Philipson</h6>
								<small>Lorem ipsum dolor sit amet.</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-warning" data-plugin="firstLitter" data-target="#notification-2"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-2">Roxy Heckerman</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-primary" data-plugin="firstLitter" data-target="#notification-3"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-3">Glennis Nest</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-success" data-plugin="firstLitter" data-target="#notification-4"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-4">Basil Hugo</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-danger" data-plugin="firstLitter" data-target="#notification-5"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-5">Anamaria Piedrahita</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-primary" data-plugin="firstLitter" data-target="#notification-6"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-6">Karl SlomaLuanna</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-success" data-plugin="firstLitter" data-target="#notification-7"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-7">Willa Santolucito</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-info" data-plugin="firstLitter" data-target="#notification-8"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-8">Justin Bogaert</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
	
						<a href="javascript:void(0)" class="media">
							<span class="avatar bg-warning" data-plugin="firstLitter" data-target="#notification-9"></span>
							<div class="media-body">
								<h6 class="media-heading" id="notification-9">Gino Kinderknecht</h6>
								<small>Lorem ipsum dolor sit amet</small>
							</div>
						</a>
					</div><!-- /.media-list -->
				</div><!-- /.scroll-container -->
			</div><!-- /.tab-pane -->
	
			<div role="tabpanel" class="tab-pane" id="settings-panel">
				<div class="scroll-container">
					<div class="py-4 px-3">
						<h6 class="text-uppercase m-0 text-muted">Account Settings</h6>
					</div>
	
					<div class="p-3">
						<div class="d-flex mb-3">
							<label for="user-settings-option1">Show My username</label>
							<span class="ml-auto">
								<input id="user-settings-option1" type="checkbox" data-plugin="switchery" data-color="#60c84c" data-size="small" checked />
							</span>
						</div>
	
						<div class="d-flex mb-3">
							<label for="user-settings-option2">Make my profile public</label>
							<span class="ml-auto">
								<input id="user-settings-option2" type="checkbox" data-plugin="switchery" data-color="#60c84c" data-size="small" checked />
							</span>
						</div>
	
						<div class="d-flex mb-3">
							<label for="user-settings-option3">Allow cloud backups</label>
							<span class="ml-auto">
								<input id="user-settings-option3" type="checkbox" data-plugin="switchery" data-color="#60c84c" data-size="small" checked />
							</span>
						</div>
					</div><!-- /.p-3 -->
				</div><!-- /.scroll-container -->
			</div><!-- /.tab-pane -->
		</div><!-- /.tab-content -->
	</div><!-- /.site-panel-tabs -->
</div>

<!-- theme-customizer \ demo only \ remove it when you done with it -->
<!-- theme customizer -->
<div id="theme-customizer">
	<header class="p-4">
		<a href="https://themeforest.net/item/kiwi-responsive-web-app-kit/20562688?s_rank=1" class="btn btn-block btn-lg btn-primary fz-base">BUY Kiwi NOW!</a>
		<hr>
		<div class="d-flex justify-content-between customizer-action-btns">
			<button id="customizerResetButton" class="btn btn-outline-danger">Reset</button>
			<button id="customizerSaveButton" class="btn btn-outline-success">Save</button>
		</div>
	</header>
	
	<div class="theme-customizer-body">
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="navbar-tab" data-toggle="tab" href="#navbar" role="tab" aria-controls="navbar" aria-expanded="true">Navbar</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="menubar-tab" data-toggle="tab" href="#menubar" role="tab" aria-controls="menubar" aria-expanded="true">Menubar</a>
			</li>
		</ul>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane p-4 fade show active" id="navbar" role="tabpanel" aria-labelledby="navbar-tab">
				<div>
					<input id="navbarInverse" data-toggle="navbarInverse" type="checkbox" data-plugin="switchery" data-size="small" />
					<label for="navbarInverse" class="ml-3">Navbar Inverse</label>
				</div>
				<hr>
				<h6 class="mb-4">Navbar Skin</h6>
				<div class="mb-3">
					<div class="radio radio-indigo">
						<input type="radio" id="nb-skin-2" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-indigo-500">
						<label for="nb-skin-2">Indigo</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-blue">
						<input type="radio" id="nb-skin-4" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-blue-500">
						<label for="nb-skin-4">Blue</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-cyan">
						<input type="radio" id="nb-skin-6" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-cyan-500">
						<label for="nb-skin-6">Cyan</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-orange">
						<input type="radio" id="nb-skin-5" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-orange-500">
						<label for="nb-skin-5">Orange</label>
					</div>
				</div>


				<div class="mb-3">
					<div class="radio radio-red">
						<input type="radio" id="nb-skin-7" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-red-500">
						<label for="nb-skin-7">Red</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-pink">
						<input type="radio" id="nb-skin-13" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-pink-500">
						<label for="nb-skin-13">Pink</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-purple">
						<input type="radio" id="nb-skin-12" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-purple-500">
						<label for="nb-skin-12">Purple</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-green">
						<input type="radio" id="nb-skin-8" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-green-500">
						<label for="nb-skin-8">Green</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-teal">
						<input type="radio" id="nb-skin-9" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-teal-500">
						<label for="nb-skin-9">Teal</label>
					</div>
				</div>

				<div class="mb-3">
					<div class="radio radio-brown">
						<input type="radio" id="nb-skin-10" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-brown-500">
						<label for="nb-skin-10">Brown</label>
					</div>
				</div>

				<div>
					<div class="radio radio-gray">
						<input type="radio" id="nb-skin-11" name="navbar-skin-option" data-toggle="navbarSkin" data-skin="bg-gray-500">
						<label for="nb-skin-11">Gray</label>
					</div>
				</div>
			</div><!-- /.tab-pane -->

			<div class="tab-pane fade p-4" id="menubar" role="tabpanel" aria-labelledby="menubar-tab">
				<div>
					<input id="menubarInverse" data-toggle="menubarInverse" type="checkbox" data-plugin="switchery" data-size="small" />
					<label for="menubarInverse" class="ml-3">Menubar Inverse</label>
				</div>
				<hr>
				<div class="hidden-top hidden-sm-down">
					<input id="menubarFold" data-toggle="menubarFold" type="checkbox" data-plugin="switchery" data-size="small" />
					<label for="menubarFold" class="ml-3">Menubar Folded</label>
				</div>
			</div><!-- /.tab-pane -->
		</div><!-- /.tab-content -->


		<div id="theme-customizer-toggler" data-toggle="class" data-target="#theme-customizer" data-class="show">
			<i class="fa fa-gear fa-2x"></i>
		</div>
	</div><!-- /.theme-customizer-body -->
</div><!-- /.theme-customizer -->

<!-- Video modal -->
<div class="modal fade video-modal" id="video-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <iframe src="about:blank" width="760" height="440" allowfullscreen></iframe>
    </div>
  </div>
</div><!-- #video-modal -->

<!-- site-wide JS plugins -->
<script src="{{ asset('assets/vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/switchery/dist/switchery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/waypoints/lib/shortcuts/sticky.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/global/js/plugins/firstlitter.js') }}"></script>
<script src="{{ asset('assets/global/js/plugins/video-modal.js') }}"></script>

<!-- plugins for the current page -->
<script src="{{ asset('assets/vendor/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/vendor/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/vendor/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/vendor/flot/jquery.flot.curvedLines.js') }}"></script>
<script src="{{ asset('assets/vendor/flot/jquery.flot.categories.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>

<!-- site-wide scripts -->
<script src="{{ asset('assets/global/js/main.js') }}"></script>
<script src="{{ asset('leftbar/js/site.js') }}"></script>
<script src="{{ asset('leftbar/js/menubar.js') }}"></script>

<!-- current page scripts -->
<script src="{{ asset('assets/examples/js/dashboards/dashboard.v1.js') }}"></script>

@yield('pageScripts')
</body>
</html>