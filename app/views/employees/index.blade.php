@section('panel')
	<h1>{{ $title }}</h1>
	@parent
@stop

@section('content')
	{{ Form::model($Empinfo, array('route' => array('employees.update', $Empinfo->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form')) }}
		<div class="form-group">
			{{ Form::label('employeeid', 'Employee ID: ', array('class' => 'control-label col-sm-2')) }}
			<div class="col-sm-9">
				{{ Form::text('employeeid', null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('sss', 'SSS / GSIS No.: ', array('class' => 'control-label col-sm-2')) }}
			<div class="col-sm-9">
				{{ Form::text('sss', null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('tin', 'TIN No.: ', array('class' => 'control-label col-sm-2')) }}
			<div class="col-sm-9">
				{{ Form::text('tin', null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('rid', 'Registration ID: ', array('class' => 'control-label col-sm-2')) }}
			<div class="col-sm-9">
				{{ Form::text('rid', null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('department_id', 'Employee ID: ', array('class' => 'control-label col-sm-2')) }}
			<div class="col-sm-9">
				{{ Form::select('department_id', Department::selectlist(), null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-9">
				{{ Form::submit('Update', array('class' => 'btn btn-default btn-flat')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop