<?php

class TimesheetController extends \BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function index()
	{
		$record = array(
			'employeeno' => Auth::user()->employeeinformation->employeeid,
			'fullname' => Auth::user()->userinformation->firstname . " " . Auth::user()->userinformation->lastname,
			'department' => Auth::user()->employeeinformation->department->name,
			'dailyTimeRecords' => isset(Auth::user()->employeeinformation) && 
								(Auth::user()->employeeinformation->rid != 0 || Auth::user()->employeeinformation->rid != "") 
								? DailyTimeRecord::where('rid', Auth::user()->employeeinformation->rid)->where('rdate', date("Y-m-d"))->distinct()->get() 
								: []
		);

		$record = (object) $record;

		// return DB::getQueryLog();
		$this->layout->content = View::make('timesheet.index', array('title' => 'Daily Time Record'), compact('record'));
	}

	public function store()
	{
		$dtrto = Input::get('dtrto');
		$dtrfrom = Input::get('dtrfrom');

		if ($dtrfrom != "" && $dtrto != "")
		{
			$record = array(
				'employeeno' => Auth::user()->employeeinformation->employeeid,
				'fullname' => Auth::user()->userinformation->firstname . " " . Auth::user()->userinformation->lastname,
				'department' => Auth::user()->employeeinformation->department->name,
				'dailyTimeRecords' => isset(Auth::user()->employeeinformation) && 
									(Auth::user()->employeeinformation->rid != 0 || Auth::user()->employeeinformation->rid != "") 
									? DailyTimeRecord::where('rid', Auth::user()->employeeinformation->rid)
											->where('rdate', '>=', $dtrfrom)
											->where('rdate', '<=', $dtrto)->distinct()->get() 
									: []
			);

			$record = (object) $record;

			// return DB::getQueryLog();
			$this->layout->content = View::make('timesheet.index', array('title' => 'Daily Time Record'), compact('record'));
		}
		else
		{
			return Redirect::to('/timesheet')->with('message', 'warning::Date from and Date to are required!');
		}
	}

}