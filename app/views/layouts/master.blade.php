<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('page_title', 'Home') - Greenhat</title>

	<!-- Custom styles for this template -->
	<link href="/assets/css/style.css" rel="stylesheet">

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
					<a href="{{ route('calendar.index') }}" class="dropdown-toggle" data-toggle="dropdown">Calendar</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li><a href="/profile">Your Profile</a></li>
						<li><a href="/logout">Sign Out</a></li>
					</ul>
				</li>
			</ul>
			<p class="navbar-text navbar-right">Hello, {{ Auth::user()->first_name }} </p>
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
<script src="/assets/js/handlebars.js"></script>
<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/js/json2.js"></script>
<script src="/assets/js/jqueryui.js"></script>
<script src="/assets/js/elockbox.js"></script>

@yield('footer', '')
</body>
</html>