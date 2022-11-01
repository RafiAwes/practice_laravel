<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bootstrap Dashboard by Bootstrapious.com</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="{{ url('/') }}/backend_assets/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="{{ url('/') }}/backend_assets/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="{{ url('/') }}/backend_assets/css/fontastic.css">
	<!-- Google fonts - Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<!-- jQuery Circle-->
	<link rel="stylesheet" href="{{ url('/') }}/backend_assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
	<!-- Custom Scrollbar-->
	<link rel="stylesheet" href="{{ url('/') }}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="{{ url('/') }}/backend_assets/css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="{{ url('/') }}/backend_assets/css/custom.css">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ url('/') }}/backend_assets/img/favicon.ico">
    <!-- Toastr-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


</head>

<body>
	<!-- Side Navbar -->
	<nav class="side-navbar">
		<div class="side-navbar-wrapper">
			<!-- Sidebar Header    -->
			<div class="sidenav-header d-flex align-items-center justify-content-center">
				<!-- User Info-->
				<div class="sidenav-header-inner text-center"><img src="{{ url('/') }}/backend_assets/img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
					<h2 class="h5">Nathan Andrews</h2><span>Web Developer</span>
				</div>
				<!-- Small Brand information, appears on minimized sidebar-->
				<div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
			</div>
			<!-- Sidebar Navigation Menus-->
			<div class="main-menu">
				<h5 class="sidenav-heading">Main</h5>
				<ul id="side-main-menu" class="side-menu list-unstyled">
					<li><a href="/category/"> <i class="icon-home"></i>category </a></li>
					<li><a href="/sub-category/"> <i class="icon-form"></i>Subcategory </a></li>
					{{-- <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
					<li><a href="tables.html"> <i class="icon-grid"></i>Tables </a></li> --}}
					<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Product </a>
						<ul id="exampledropdownDropdown" class="collapse list-unstyled">
							<li><a href="/add/product/">Add Product</a></li>
							<li><a href="#">View Product</a></li>
						</ul>
					</li>
					<li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li>
					<li> <a href="#"> <i class="icon-mail"></i>Demo
							<div class="badge badge-warning">6 New</div></a></li>
				</ul>
			</div>
			{{-- <div class="admin-menu">
				<h5 class="sidenav-heading">Second menu</h5>
				<ul id="side-admin-menu" class="side-menu list-unstyled">
					<li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
					<li> <a href="#"> <i class="icon-flask"> </i>Demo
							<div class="badge badge-info">Special</div></a></li>
					<li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
					<li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
				</ul>
			</div> --}}
		</div>
	</nav>
	<div class="page">
		<!-- navbar-->
		<header class="header">
			<nav class="navbar">
				<div class="container-fluid">
					<div class="navbar-holder d-flex align-items-center justify-content-between">
						<div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
								<div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div>
							</a></div>
						<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

							<!-- Log out-->
							<li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="d-none d-sm-inline-block">
                                        {{ __('Logout') }}
                                    </span>
                                    <i class="fa fa-sign-out">
                                    </i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
						</ul>
					</div>
				</div>
			</nav>
		</header>


        @yield('content')






		<footer class="main-footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<p>Your company &copy; 2017-2019</p>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!-- JavaScript files-->
	<script src="{{ url('/') }}/backend_assets/vendor/jquery/jquery.min.js"></script>
	<script src="{{ url('/') }}/backend_assets/vendor/popper.js/umd/popper.min.js"> </script>
	<script src="{{ url('/') }}/backend_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ url('/') }}/backend_assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
	<script src="{{ url('/') }}/backend_assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
	<script src="{{ url('/') }}/backend_assets/vendor/chart.js/Chart.min.js"></script>
	<script src="{{ url('/') }}/backend_assets/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="{{ url('/') }}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="{{ url('/') }}/backend_assets/js/charts-home.js"></script>
	<!-- Main File-->
	<script src="{{ url('/') }}/backend_assets/js/front.js"></script>
	<script src="https://kit.fontawesome.com/c218529370.js"></script>

    @yield('footer_js')

    <!-- Toastr-->
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
