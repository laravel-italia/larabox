<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<title>Recupero Password Utente - Larabox :: an awesome temporary file upload service</title>

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

			<form action="{{ url('user/recovery') }}" method="post">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<p><b>Recupero Password Utente</b></p>

				<p>Inserisci il tuo indirizzo email per recuperare la tua password!</p>

				@if(Session::has('message'))
					<hr/>
					<p>{{ Session::get('message') }}</p>
				@endif

				<hr/>

				<p>
					<input type="text" name="email" class="form-control" placeholder="Indirizzo email" />
				</p>

				<hr/>

				<p><button type="submit" class="btn btn-lg btn-success">Recupera Password</button></p>	
			</form>

		</div>
	</body>
</html>