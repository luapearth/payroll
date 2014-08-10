<?php

class AuthController extends \BaseController {
	protected $layout = 'layouts.auth';

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function index()
	{
		$this->layout->content = View::make('auth.index');
	}

	public function store()
	{
		$user = Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		));

		if ($user) return Redirect::intended('/');

		return Redirect::back()->with('message', 'warning::Invalid username or password!')->withInput();
	}

	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/login');
	}

	public function getLock()
	{
		if (Auth::check())
		{
			$curuser = Auth::user();
			$user = array(
				'name' => $curuser->email,
				'email' => $curuser->email,
				'avatar' => 'avatar5.png'
			);
			$user = (object) $user;

			Auth::logout();
			return View::make('auth.lock', compact('user'));
		}
		return Redirect::to('/logout');
	}

}