<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<title>Esito del caricamento - Larabox :: an awesome temporary file upload service</title>

		<style type="text/css">
		.container, .download_url{
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

			<p><b>File caricato con successo!</b></p>

			<p>Il tuo file è stato caricato senza problemi: adesso puoi condividerlo usando il link di seguito.</p>

			<hr/>

			<p><b>{{ $upload->name }}</b></p>
			<p><input type="text" class="form-control download_url" value="{{ url('download/'.$upload->path) }}" /></p>

			<p>Il file sarà disponibile fino alle {{ date('H:i - d/m/Y', strtotime($upload->expires_at)) }}</p>

			<hr/>

			<p><a href="{{ url('upload') }}" class="btn btn-success">Carica un altro file</a></p>

		</div>
	</body>
</html>