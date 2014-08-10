<?php

class Role extends \Eloquent {
	protected $fillable = [];

	public $timestamps = false;

	public function users()
	{
		return $this->belongsToMany('User', 'user_roles');
	} 
}