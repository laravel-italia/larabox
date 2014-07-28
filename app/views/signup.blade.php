<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<title>Iscrizione - Larabox :: an awesome temporary file upload service</title>

		<style type="text/css">
		.container{
			text-align: center;
		}

		.logo {
			margin:35px 0px;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<img class="logo" src="{{ asset('img/logo.png') }}" />

			<hr/>

			<form action="{{ url('user/signup') }}" method="post">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

				<p><b>Iscrizione</b></p>

				<p>Compila il form di seguito per iscriverti a Larabox!</p>

				@if(Session::has('message'))
					<hr/>
					<p>{{ Session::get('message') }}</p>
				@endif

				<hr/>
				
				<p>
					<input type="text" name="first_name" class="form-control" placeholder="Nome" />
				</p>

				<p>
					<input type="text" name="last_name" class="form-control" placeholder="Cognome" />
				</p>

				<p>
					<input type="text" name="email" class="form-control" placeholder="Indirizzo email" />
				</p>

				<p>
					<input type="password" name="password" class="form-control" placeholder="Password" />
				</p>

				<hr/>

				<p><button type="submit" class="btn btn-lg btn-success">Registrati</button></p>	
			</form>

		</div>
	</body>
</html>