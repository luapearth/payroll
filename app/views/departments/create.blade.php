@section('panel')
	<h1>{{ $title }}</h1>
@stop

@section('content')
<div class="container">
	@if ( Session::get('message') !== null )
	<div class="row">
	<div class="col-sm-offset-5 col-sm-6">
		<div class="alert alert-{{ explode('::', Session::get('message'))[0] }} alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  {{ explode('::', Session::get('message'))[1] }}
		</div>
	</div>
	</div>
	@endif
	{{ Form::open(array('route' => 'departments.store', 'role' => 'form', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-9">
				{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Programming', 'autofocus' => 'autofocus')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-9">
				{{ Form::submit('Add', array('class' => 'btn btn-default btn-flat')) }}
			</div>
		</div>
	{{ Form::close() }}
</div>
@stop