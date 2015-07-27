<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title> 
			@section('title') 
			@show 
		</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Bootstrap 3.0: Latest compiled and minified CSS -->
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

		<!-- Optional theme -->
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"> -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">

		<style>
		@section('styles')
			body {
				padding-top: 60px;
			}
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="{{ asset('js/html5shiv.min.js') }}"></script>
		<![endif]-->

	
	</head>

	<body>
		

		<!-- Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="{{ route('home') }}">物业收费管理</a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
				@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
					<li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ action('\\Sentinel\Controllers\UserController@index') }}">Users</a></li>
					<li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ action('\\Sentinel\Controllers\GroupController@index') }}">Groups</a></li>
				@endif
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            @if (Sentry::check())
				<li {{ (Request::is('profile') ? 'class="active"' : '') }}><a href="{{ route('sentinel.profile.show') }}">{{ Session::get('email') }}</a>
				</li>
				<li>
					<a href="{{ route('sentinel.logout') }}">Logout</a>
				</li>
				@else
				<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ route('sentinel.login') }}">Login</a></li>
				<li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="{{ route('sentinel.register.form') }}">Register</a></li>
				@endif
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
			<div class="row">
                <div class="col-md-3">
                    <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
                        <ul class="nav bs-docs-sidenav">

                            <li>
                                <a href="#overview">项目管理</a>
                                <ul class="nav">
                                    <li><a href="#overview-doctype">房屋管理</a></li>
                                    <li><a href="#overview-normalize">客户管理</a></li>
                                    <li><a href="#overview-mobile">费用设定</a></li>
                                    <li><a href="#overview-type-links">表具抄录</a></li>
                                    <li><a href="#overview-container">费用报告</a></li>
                                </ul>
                            </li>

                        </ul>

                    </nav>
                </div>
                <div class="col-md-9">
                    <!-- Notifications -->
                    @include('Sentinel::layouts/notifications')
                            <!-- ./ notifications -->

                    <!-- Content -->
                    @yield('content')
                            <!-- ./ content -->
                </div>

            </div>
		</div>

		<!-- ./ container -->

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/restfulizer.js') }}"></script>
		<!-- Thanks to Zizaco for the Restfulizer script.  http://zizaco.net  -->
	</body>
</html>
