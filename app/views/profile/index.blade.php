@section('panel')
	<h1>{{ $title }}</h1>
@stop

@section('content')
{{ Form::model($Userinformation, array('route' => array('profile.update', $Userinformation->id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT')) }}
	<div class="form-group">
		{{ Form::label('firstname', 'First Name: ', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-9">
			{{ Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('middlename', 'Middle Name: ', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-9">
			{{ Form::text('middlename', null, array('class' => 'form-control', 'placeholder' => 'Middle Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('lastname', 'Last Name: ', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-9">
			{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('is_male', 'Gender: ', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-9">
			{{ Form::select('is_male', array('1' => 'Male', '0' => 'Female'), null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-9">
			<input type="submit" value="Update" class="btn btn-default btn-flat">
		</div>
	</div>
{{ Form::close() }}
@stop