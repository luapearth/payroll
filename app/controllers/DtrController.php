<?php

class DtrController extends \BaseController {

protected $layout = "layouts.master";

	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	
	public function index()
	{
		$this->layout->content = View::make('dtr.index', array('title' => 'DTR Upload'));
	}

	public function store()
	{
		$from = Input::get('dtrfrom');
		$to = Input::get('dtrto');
		if ($from == "" || $to == "") return Redirect::to('/face')->with('message', 'warning::Date from and to are required!')->withInput();

		if (Input::hasFile('dtr'))
		{
			$file = Input::file('dtr');
			$type = $file->getMimeType();
			$destinationPath = public_path() . "/dtr";
			$fileName = date('Y_m_d') . "_" . $file->getClientOriginalName();
			
			if ($type === 'text/plain')
			{

				// return $from . " - " . $to . " " . $fileName;
				$file->move($destinationPath, $fileName);

				DtrFile::create(array(
					'name' => $fileName
				));

				$dateRange = array(); // range container
				while (strtotime($from) <= strtotime($to)) {
					array_push($dateRange, $from);
					$from = date('Y-m-d', strtotime("+1 day", strtotime($from))); 
				}

				$file = fopen( public_path() . "/dtr" . "/" .$fileName, "r" );

				// $count = 0;
				// $data = array();
				$entry_type = "";
				while( !feof($file) ) {
					// ++$count;
					$line = fgets($file);
					$row = preg_split("/\s+/", $line);
					if ( isset($row[5]) && $row[5] == 0 ) {
						$entry_type = "In";
					} elseif (isset($row[5]) && $row[5] == 1) {
						$entry_type = "Out";
					} elseif (isset($row[5]) && $row[5] == 2) {
						$entry_type = "Break Out";
					} elseif (isset($row[5]) && $row[5] == 3) {
						$entry_type = "Break In";
					}
					if ( isset($row[5]) ) {
						if ( in_array($row[2], $dateRange) ) {
							DailyTimeRecord::create(array(
								'rid'				=>		$row[1],
								'rdate'			=>		$row[2],
								'rtime'			=>		$row[3],
								'rtype'			=>		$entry_type
							));
						}
						echo $row[1] . " " . $row[2] . " " . $row[4] . " " . $entry_type . "<br>";
					}
				}

				fclose($file);

				return Redirect::to('/face')->with('message', 'success::Upload complete!');
			}

			return Redirect::to('/face')->with('message', 'warning::Invalid file type.')->withInput();
		}

		return Redirect::to('/face')->with('message', 'warning::Please select dtr file.')->withInput();
	}

}