<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Recupero Password</h2>

		<div>
			<p>Ciao! Se ricevi questa mail è perché hai richiesto un reset della password su <b>Larabox!</b></p>
			<p>Clicca sul seguente link per procedere: {{ URL::to('password/reset', array($token)) }}</p>
			<p>Se non sei stato tu a richiedere il reset allora aspett {{ Config::get('auth.reminder.expire', 60) }} minuti: la richiesta verrà annullata automaticamente.</p>
		</div>
	</body>
</html>