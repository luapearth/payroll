@section('content')
<div class="container">
	{{ Form::model( $department, array('route' => array('departments.update', $department->id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT' )) }}
		<div class="form-group">
			{{ Form::label('name', 'Name: ', array('class' => 'col-sm-2 label-control')) }}
			<div class="col-sm-9">
				{{ Form::text('name', null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-9">
				{{ Form::submit('Update', array('class' => 'btn btn-default btn-sm btn-flat')) }}
			</div>
		</div>
	{{ Form::close() }}
</div>
@stop