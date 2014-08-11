<?php

class EmployeesController extends \BaseController {

	protected $layout = 'layouts.master';

	public function Index()
	{
		$user = User::find(Auth::user()->id);
		if ($user->employeeinformation == null)
		{
			$empinfo = new Employeeinformation(array(
								'employeeid' => '',
								'sss' => '',
								'tin' => '',
								'rid' => '', 
								'department_id' => 1
								));
			$ref = $user->employeeinformation()->save($empinfo);
			$Empinfo = User::find($ref->user_id)->employeeinformation;
		}
		else
		{
			$Empinfo = $user->employeeinformation;
		}

		$this->layout->content = View::make('employees.index', compact('Empinfo'));
	}

	public function Update($id)
	{
		$empinfo = Employeeinformation::find($id);
		$empinfo->employeeid = Input::get('employeeid');
		$empinfo->rid = Input::get('rid');
		$empinfo->sss = Input::get('sss');
		$empinfo->tin = Input::get('tin');
		$empinfo->department_id = Input::get('department_id');

		$empinfo->save();

		return Redirect::to('/employees');
	}
}