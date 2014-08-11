<?php

class Userinformation extends \Eloquent {
	protected $fillable = ['firstname', 'middlename', 'lastname', 'is_male'];

	public function user()
	{
		return $this->belongsTo('User');
	}
}