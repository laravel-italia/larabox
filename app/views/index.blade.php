<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<title>Larabox :: an awesome temporary file upload service</title>

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

			<p><b>Ehi! Benvenuto.</b></p>

			<p>Larabox è un fantastico servizio che ti permette di caricare un file per un periodo di tempo limitato.</p>
			<p>Scegli il file, decidi per quanto deve essere disponibile e via! Se vuoi puoi anche proteggerlo con una password.</p>
			<p>Gratuito e facile da usare. Basta iscriversi e in pochi secondi sei già dentro.</p>
			<p>Che cosa aspetti? Provalo subito!</p>

			<hr/>

			@if(Auth::check())
				<p><a href="{{ url('upload') }}" class="btn btn-lg btn-success">Carica un File!</a></p>
				<p><a href="{{ url('user/logout') }}" class="btn btn-info">Logout</a></p>
			@else
				<p><a href="{{ url('user/signup') }}" class="btn btn-lg btn-success">Registrati Ora!</a></p>
				<p><a href="{{ url('user/login') }}" class="btn btn-info">Sei già iscritto? Accedi!</a></p>
			@endif

		</div>
	</body>
</html>