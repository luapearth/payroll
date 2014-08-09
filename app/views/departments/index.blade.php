@section('content')
<div class="container">
	<table class="table table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Department</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( $departments as $dept )
			<tr>
				<td>{{ $dept->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop