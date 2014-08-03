<?php

class TimesheetController extends \BaseController {

	protected $layout = "layouts.master";
	/**
	 * Display a listing of the resource.
	 * GET /timesheet
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('timesheet.index');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /timesheet
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Input::hasFile('dtr'))
		{
			$file = Input::file('dtr');
			$type = $file->getMimeType();
			$destinationPath = public_path() . "/dtr";
			$fileName = $file->getClientOriginalName();
			if ($type === 'text/plain')
			{
				$file->move($destinationPath, $fileName);
			}
			return Redirect::to('timesheet');
		}

		return Redirect::to('timesheet');
	}

}