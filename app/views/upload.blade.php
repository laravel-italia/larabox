<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<title>Upload - Larabox :: an awesome temporary file upload service</title>

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

			<p><b>Upload di un File</b></p>

			<p>Compila il modulo di seguito per caricare un nuovo file su Larabox.</p>

			@if(Session::has('message'))
				<hr/>
				<p>{{ Session::get('message') }}</p>
			@endif

			<hr/>

			<form action="{{ url('upload') }}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<p>
					<input name="file" type="file" class="form-control" />
				</p>

				<p>
					<input name="name" type="text" class="form-control" placeholder="Nome del File (lascia in bianco se vuoi usare quello attuale)" />
				</p>

				<p>
					<select name="expiration" class="form-control">
						<option value="1800">30 Minuti</option>
						<option value="3600">1 Ora</option>
						<option value="7200">2 Ore</option>
						<option value="10800">3 Ore</option>
						<option value="43200">12 Ore</option>
						<option value="86400">1 Giorno</option>
						<option value="172800">2 Giorni</option>
					</select>
				</p>

				<p>
					<input name="password" type="password" class="form-control" placeholder="Password (lascia vuoto per rendere il file pubblico)" />
				</p>

				<hr/>

				<p>
					<button class="btn btn-success form-control">Carica File</button>
				</p>
			</form>

		</div>
	</body>
</html>