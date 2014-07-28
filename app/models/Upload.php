<?php

class Upload extends \Eloquent {
	protected $fillable = [];

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = ($value == null) ? null : Hash::make($value);
	}
}