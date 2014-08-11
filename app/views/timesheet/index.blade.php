@section('panel')
	<h1>{{ $title }}</h1>
	@parent
@stop

@section('content')
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

{{ Form::open(array('route' => 'timesheet.index', 'enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'form-horizontal')) }}
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
		<div class="col-sm-offset-2 col-sm-9">
			{{ Form::submit('View', array('class' => 'btn btn-default btn-flat')) }}
		</div>
	</div>
{{ Form::close() }}
<table class="table table-condensed table-striped table-hover">
	<thead>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Log type</th>
		</tr>
	</thead>
	<tbody>
	<?php $cday = '2014-05-26'; $count = 0; $key = 0; $total = 0; ?>
	<?php while (strtotime($cday) <= strtotime('2014-06-10')) {?>
		@foreach ($record->dailyTimeRecords as $dtr)
		@if ($dtr->rdate == $cday)
		<?php ++$count; ?>
		<tr>
			<td>{{ $dtr->rdate }}</td>
			<td>{{ $dtr->rtime }}</td>
			<td>{{ $dtr->rtype }}</td>
		</tr>
		@endif
		@endforeach
		@if ($count > 0)
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		@endif
	<?php 
	$cday = date('Y-m-d', strtotime("+1 day", strtotime($cday))); 
	$count = 0;
	} ?>
	</tbody>
</table>
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