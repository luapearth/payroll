@section('content')
<div class="container">
	@if ( Session::get('message') !== null )
	<div class="row">
	<div class="col-sm-offset-5 col-sm-7">
		<div class="alert alert-{{ explode('::', Session::get('message'))[0] }} alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  {{ explode('::', Session::get('message'))[1] }}
		</div>
	</div>
	</div>
	@endif
	{{ Form::open(array('route' => 'timesheet.index', 'enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('dtrfrom', 'Date from:', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
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
			<div class="col-sm-10">
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
			<div class="col-sm-10">
				{{ Form::file('dtr', array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Upload', array('class' => 'btn btn-default')) }}
			</div>
		</div>
	{{ Form::close() }}
</div>

<div class="container">
	@if ( isset($dtrfromto) )
	<table class="table table-striped table-hover table-condensed">
		<thead>
			<tr>
				<th>Registration ID</th>
				<th>Date Time</th>
				<th>Type</th>
			</tr>
		</thead>
		<tbody>
		@foreach ( $dtrfromto as $value )
			<tr>
				<td>{{ $value->rid }}</td>
				<td>{{ $value->rdatetime }}</td>
				<td>{{ $value->rtype }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	@endif
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