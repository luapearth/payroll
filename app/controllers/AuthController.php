<?php

class AuthController extends \BaseController {
	protected $layout = 'layouts.auth';

	public function index()
	{
		$this->layout->content = View::make('auth.index');
	}
	public function store()
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}