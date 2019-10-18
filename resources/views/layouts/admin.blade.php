<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<span class="navbar-brand">V 6.2.0</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="./#/dashboard">Dashboard</a>
						</li>
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Administration</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="./#/pegawai">User</a>
								<a class="dropdown-item" href="#">Group</a>
								<a class="dropdown-item" href="#">Show User Log</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./#/blog">Operational</a>
						</li>
						<li class="nav-item">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Accounting</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">COA</a>
								<a class="dropdown-item" href="#">Jurnal</a>
								<a class="dropdown-item" href="#">General Ledger</a>
								<a class="dropdown-item" href="#">Trial Balance</a>
								<a class="dropdown-item" href="#">Balance Sheet</a>
								<a class="dropdown-item" href="#">Period</a>
								<a class="dropdown-item" href="#">Posting</a>
								<a class="dropdown-item" href="#">Closing</a>
							</div>
						</li>
						<li class="nav-item">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Finance</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">General Cash Bank</a>
								<a class="dropdown-item" href="#">Inter Cash Bank</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>
</html>
