<?php

class UserController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf', array('only' => 'postLogin|postSignup|postRecovery|postReset'));
	}

	public function getLogin()
	{
		return View::make('login');
	}

	public function postLogin()
	{
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			return Redirect::to('upload');
		}
		else
		{
			return Redirect::to('user/login')->with('message', 'Errore, le credenziali specificate non corrispondono a nessun utente.');
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function getSignup()
	{
		return View::make('signup');
	}

	public function postSignup()
	{
		$validator = Validator::make(
			Input::all(), 
			array(
		        'first_name' => 'required',
		        'last_name' => 'required',
		        'email' => 'required|email|unique:users',
		        'password' => 'required|min:6'
		    ), 
			array(
			    'first_name.required' => 'Inserire il nome!',
			    'last_name.required' => 'Inserire il cognome!',
			    'email.required' => 'Inserire il proprio indirizzo email!',
			    'password.required' => 'Scegliere una password!',

			    'email.email' => 'L\'indirizzo specificato deve essere un indirizzo email valido.',
			    'email.unique' => 'Esiste già un utente con questo indirizzo email!',

			    'password.min' => 'La password scelta deve essere lunga almeno sei caratteri.',
			)
		);

		if($validator->fails()){
			return Redirect::to('user/signup')->with('message', $validator->messages()->first());
		}

		$user = new User;

		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		if(!$user->save()){
			return Redirect::to('user/signup')->with('message', 'Problema in fase di iscrizione: riprovare.');
		}

		Auth::login($user);

		return Redirect::to('/');
	}

	public function getRecovery()
	{
		return View::make('recovery');
	}

	public function postRecovery()
	{
		Password::remind(Input::only('email'), function($message)
		{
		    $message->subject('Recupero Password - Larabox');
		});

		return Redirect::to('user/recovery')->with('message', 'Controlla la posta su '.Input::only('email').'!');
	}

	public function getReset()
	{
		if (is_null($token)) App::abort(404);
		return View::make('reset')->with('token', $token);
	}

	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
				return Redirect::to('user/reset')->with('message', 'Password non valida. Riprovare.');
			break;

			case Password::INVALID_TOKEN:
				return Redirect::to('user/reset')->with('message', 'Token non valido. Riprovare.');
			break;
			
			case Password::INVALID_USER:
				return Redirect::to('user/reset')->with('message', 'Utente non trovato. Riprovare.');
			break;

			case Password::PASSWORD_RESET:
				return Redirect::to('/');
			break;
		}
	}

}