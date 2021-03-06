<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('page_title', 'Home') - Greenhat</title>

	<!-- Custom styles for this template -->
	<link href="/assets/css/style.css" rel="stylesheet">
	<link href="/assets/css/calendar.min.css" rel="stylesheet">
	<link href="/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	
	<![endif]-->
</head>

<body>

<div class="navbar navbar-default navbar-fixed" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<span class="navbar-brand">Greenhat</span>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="{{ route('calendar.index') }}" class="dropdown-toggle" data-toggle="dropdown">{{ Lang::get('app.menu.calendar') }}</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Lang::get('app.menu.account') }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li><a href="{{ route('profile.index') }}">{{ Lang::get('app.menu.profile') }}</a></li>
						<li><a href="{{ route('action.logout') }}">{{ Lang::get('app.menu.logout') }}</a></li>
					</ul>
				</li>
			</ul>
			<p class="navbar-text navbar-right"> {{Lang::get('app.menu.greeting') }} {{ Auth::user()->first_name }} </p>
		</div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</div>

<div class="container" id="main">

	<div class="starter-template">
		@yield('content', "")
	</div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/rails.min.js"></script>
<script src="/assets/js/moment.min.js"></script>
<script src="/assets/js/underscore-min.js"></script>
<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/js/locales/bootstrap-datetimepicker.{{ Session::get('lang', 'en') }}.js" charset="UTF-8"></script>
<script src="/assets/js/calendar.min.js"></script>
<script src="/assets/js/language/zh-CN.js"></script>
<script src="/assets/js/greenhat.js"></script>

@yield('footer', '')
</body>
</html>