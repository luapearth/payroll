<?php

class DepartmentsController extends \BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function index()
	{
		$departments = Department::orderBy('name', 'asc')->get();
		$this->layout->content = View::make('departments.index', compact('departments'));
	}

	public function create()
	{
		$this->layout->content = View::make('departments.create');
	}

	public function store()
	{
		if ( Input::get('name') == "" )
		{
			return Redirect::to('departments/create')->with('message', 'warning::Please fill out the department name!');
		}

		$dept = Department::create(array(
			'name' => trim(strtoupper(Input::get('name')))
		));

		if ($dept) return Redirect::to('/departments');

		return Redirect::to('departments/create')->with('message', 'warning::Something went wrong please try again :(');
	}

	public function edit($id)
	{
		$department = Department::find($id);
		$this->layout->content = View::make('departments.edit', compact('department'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$department = Department::find($id);
		if (Input::get('name') != "")
		{
			$department->name = Input::get('name');
			$department->save();	
		}

		return Redirect::to('departments');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$department = Department::find($id);
		$department->delete();

		return Redirect::to('departments');
	}

}