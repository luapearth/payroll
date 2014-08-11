@section('panel')
	<h1>{{ $title }}</h1>
	@parent
@stop

@section('content')
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
		<tr>
			<td>{{ $dtr->rdate }}</td>
			<td>{{ $dtr->rtime }}</td>
			<td>{{ $dtr->rtype }}</td>
		</tr>
		@endif
		@endforeach
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
	<?php 
	$cday = date('Y-m-d', strtotime("+1 day", strtotime($cday))); 
	} ?>
	</tbody>
</table>
@stop