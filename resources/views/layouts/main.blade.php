<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>BillSheets Online - @yield('title')</title>

		<!-- Bootstrap core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="/assets/css/custom.css" rel="stylesheet">

	</head>

	<body>

		<!-- navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand text-uppercase" href="/">
						BillSheets
					</a>
				</div>
				<!-- /.navbar-header -->
				<?php $view = substr($_SERVER['REQUEST_URI'], 1); ?>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="btn-wide {{ $view === 'bills' ? 'active' : '' }}"><a href="{{ route('bills.index') }}" 
							   class="list-group-item">Bills</a></li>
						<li class="btn-wide pad-left-10 {{ $view === 'payees' ? 'active' : '' }}"><a href="{{ route('payees.index') }}" 
							   class="list-group-item">Payees</a></li>
					</ul>
				</div>
			</div>
		</nav>		
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					@if (session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
					@endif

					@yield('content')
				</div>
			</div>


		</div><!-- /.container -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>