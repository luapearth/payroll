<?php

class ProfileController extends \BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function index()
	{
		$user = User::find(Auth::user()->id);
		if ($user->userinformation == null)
		{
			$userinfo = new Userinformation(array(
								'firstname' => '',
								'middlename' => '', 
								'lastname' => '', 
								'is_male' => 1
								));
			$Userinformation = $user->userinformation()->save($userinfo);
		}
		else
		{
			$Userinformation = $user->userinformation;
		}

		$this->layout->content = View::make('profile.index', compact('Userinformation'));
	}

	public function update($id)
	{
		$userinfo = Userinformation::find($id);
		$userinfo->firstname = Input::get('firstname');
		$userinfo->middlename = Input::get('middlename');
		$userinfo->lastname = Input::get('lastname');
		$userinfo->is_male = Input::get('is_male');
		$userinfo->save();

		return Redirect::to('/profile');
	}

}