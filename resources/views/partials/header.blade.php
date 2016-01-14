<!-- index.html -->
<!doctype html>
<html>
	<head>
		<title>Time Tracker</title>
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
	</head>
	@if (array_key_exists('ng-app', View::getSections()) && array_key_exists('ng-controller', View::getSections()))
	<body class="ng-cloak" ng-cloak ng-app="@yield('ng-app')" ng-controller="@yield('ng-controller')">
	@else
	<body>
	@endif
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ url('/') }}">TimeTracker</a>
				</div>

				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
						@if(!auth()->guest())
						<li><a href="{{ url('/home') }}">Dashboard</a></li>
						<li><a href="{{ url('/user/teams') }}">Teams</a></li>
						<li><a href="{{ url('/user/projects') }}">Projects</a></li>
						<li><a href="{{ url('/user/tasks') }}">Tasks</a></li>
						@endif
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if(auth()->guest())
							@if(!Request::is('auth/login'))
								<li><a href="{{ url('/auth/login') }}">Login</a></li>
							@endif
							@if(!Request::is('auth/register'))
								<li><a href="{{ url('/auth/register') }}">Register</a></li>
							@endif
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/user/' . Auth::user()->id . '/edit') }}">Edit Profile</a></li>
									<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			@if (Session::has('message'))
			    <div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif
		</div>
