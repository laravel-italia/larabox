<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<title>Reset Password Utente - Larabox :: an awesome temporary file upload service</title>

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

			<form action="{{ url('user/reset') }}" method="post">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				
				<p><b>Reset Password Utente</b></p>

				<p>Scegli una nuova password per il tuo account!</p>

				@if(Session::has('message'))
					<hr/>
					<p>{{ Session::get('message') }}</p>
				@endif

				<hr/>

				<input type="hidden" name="token" value="{{ $token }}">
			    <p><input type="email" name="email" placeholder="Indirizzo email" class="form-control"></p>
			    <p><input type="password" name="password" placeholder="Password" class="form-control"></p>
			    <p><input type="password" name="password_confirmation" placeholder="Conferma Password" class="form-control"></p>

				<hr/>

				<p><button type="submit" class="btn btn-lg btn-success">Salva Nuova Password</button></p>	
			</form>

		</div>
	</body>
</html>