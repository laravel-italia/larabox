<?php

class SiteController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('only' => 'getUpload|postUpload|getResult'));
		$this->beforeFilter('csrf', array('only' => 'postDownload|postUpload'));
	}

	public function getIndex()
	{
		return View::make('index');
	}

	public function getDownload($path)
	{
		if(!isset($path))
		{
			return Redirect::to('/');
		}

		$upload = Upload::where('path', '=', $path)->first();

		if($upload == null || strtotime($upload->expires_at) < time())
		{
			return Redirect::to('/');
		}

		return View::make('download')->with('upload', $upload);
	}

	public function postDownload($path)
	{
		$upload = Upload::find(Input::get('upload_id'));

		if($upload->password != null)
		{
			if(!Hash::check(Input::get('password'), $upload->password))
			{
				return Redirect::to('download/'.$path)->with('message', 'Errore: La password non è corretta! Riprova.');
			}
		}

		return Response::download('uploads/'.$upload->path, $upload->name);
	}

	public function getUpload()
	{
		return View::make('upload');
	}

	public function postUpload()
	{
		$validator = Validator::make(
			Input::all(), 
			array(
		        'file' => 'required|max:2048'
		    ), 
			array(
			    'file.required' => 'Scegli un file da caricare!',
			    'file.max' => 'Il file che hai scelto è troppo grande!'
			)
		);

		if($validator->fails())
		{
			return Redirect::to('upload')->with('message', $validator->messages()->first());
		}

		$originalName = Input::file('file')->getClientOriginalName();
		$fileName = sha1($originalName . time());

		Input::file('file')->move('uploads', $fileName);

		$upload = new Upload;

		$upload->name = (Input::has('name')) ? Input::get('name') : $originalName;
		$upload->path = $fileName;
		$upload->expires_at = date("Y-m-d H:i:s", time() + intval(Input::get('expiration')));

		$upload->password = (Input::has('password')) ? Hash::make(Input::get('password')) : NULL;

		if(!$upload->save())
		{
			return Redirect::to('upload')->with('message', 'Problemi in fase di upload. Riprovare.');
		}

		return Redirect::to('result')->with('upload_id', $upload->id);
	}

	public function getResult()
	{
		if(Session::has('upload_id'))
		{
			return View::make('result')->with('upload', Upload::find(Session::get('upload_id')));
		}

		return Redirect::to('/');
	}

}