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
			'dailyTimeRecords' => DailyTimeRecord::where('rid', Auth::user()->employeeinformation->rid)->distinct()->get()
		);

		$record = (object) $record;

		// return DB::getQueryLog();
		$this->layout->content = View::make('timesheet.index', array('title' => 'Daily Time Record'), compact('record'));
	}

}