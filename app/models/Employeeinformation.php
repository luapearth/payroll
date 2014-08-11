<?php

class Employeeinformation extends \Eloquent {
	protected $fillable = ['employeeid', 'rid', 'department_id', 'sss', 'tin'];

	public function user()
	{
		return $this->belongsTo('User');
	}
}