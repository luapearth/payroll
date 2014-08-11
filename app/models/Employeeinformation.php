<?php

class EmployeeInformation extends \Eloquent {
	protected $fillable = ['employeeid', 'rid', 'department_id', 'sss', 'tin'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function department()
	{
		return $this->belongsTo('Department');
	}
}