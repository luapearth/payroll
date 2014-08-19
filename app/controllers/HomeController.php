<?php

class HomeController extends BaseController {
	protected $layout = "layouts.master";

	public function __construct()
	{
		// $this->beforeFilter('auth');
	}

	public function index()
	{
		// $this->layout->content = View::make('home.index');
		return View::make('home.index');
	}

	public function store()
	{
		if (Input::hasFile('webcam'))
		{
			$file = Input::file('webcam');
			$destinationPath = public_path() . "/uploads";
			$fileName = strtotime("now") . ".jpg";

			$file->move($destinationPath, $fileName);

			$lastLog = DailyTimeRecord::create(array(
				'employeeid'	=>		Input::get('userId'),
				'rdate'			=>		Input::get('transDate'),
				'rtime'			=>		Input::get('transTime'),
				'rtype'			=>		Input::get('transType'),
				'img_url'		=>		$fileName
			));

			return $lastLog;
		}

		return "Failed";
	}

}
