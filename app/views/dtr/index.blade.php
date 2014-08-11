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
	{{ Form::open(array('route' => 'face.index', 'enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('dtrfrom', 'Date from:', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-9">
				<div class='input-group date' id='datetimepickerfrom' data-date-format="YYYY-MM-DD">
					{{ Form::text('dtrfrom', null, array('class' => 'form-control', 'placeholder' => 'YYYY-MM-DD')) }}
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
					</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('dtrto', 'Date to:', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-9">
				<div class='input-group date' id='datetimepickerto' data-date-format="YYYY-MM-DD">
					{{ Form::text('dtrto', null, array('class' => 'form-control', 'placeholder' => 'YYYY-MM-DD')) }}
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
					</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('dtr', 'Select DTR:', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-9">
				{{ Form::file('dtr', array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-9">
				{{ Form::submit('Upload', array('class' => 'btn btn-default btn-flat')) }}
			</div>
		</div>
	{{ Form::close() }}
</div>
@stop
@section('scripts')
<script>
	$(function() {
		$('#datetimepickerfrom').datetimepicker({
			pickTime: false
		});
		$('#datetimepickerto').datetimepicker({
			pickTime: false
		});
	});
</script>
@stop