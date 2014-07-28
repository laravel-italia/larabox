<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<title>Download ({{ $upload->name }}) - Larabox :: an awesome temporary file upload service</title>

		<style type="text/css">
		.container, .password_box{
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

			<form action="{{ url('download/'.$upload->path) }}" method="post">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="hidden" name="upload_id" value="{{ $upload->id }}" />

				<p><b>Download del File</b></p>

				<p>Hai richiesto di scaricare un file.</p>

				@if(Session::has('message'))
					<hr/>
					<p><b>{{ Session::get('message') }}</b></p>
				@endif

				<hr/>

				<p><b>Dettagli</b></p>

				<p>
					<b>Nome:</b> {{ $upload->name }}
				</p>

				<p>
					<b>Caricato:</b> {{ date('d/m/Y H:i', strtotime($upload->created_at)) }}
				</p>

				<p>
					<b>Scadenza:</b> {{ date('d/m/Y H:i', strtotime($upload->expires_at)) }}
				</p>

				<hr/>

				@if($upload->password != null)
					<p>Questo file è privato. Per scaricarlo dovrai inserire la sua password.</p>
					<p>
						<input type="password" name="password" placeholder="Password" class="password_box" />
					</p>
					<hr/>
				@endif

				<p><button type="submit" class="btn btn-lg btn-success">Scarica il File</button></p>	
			</form>
		</div>
	</body>
</html>