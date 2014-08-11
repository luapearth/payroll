@section('panel')
	<h1>{{ $title }}</h1>
@stop

@section('content')
<div class="container">
	<div>
		<a href="{{ URL::route('departments.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add</a>
	</div>
	<table class="table table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Department</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ( $departments as $dept )
			<tr>
				<td>{{ $dept->name }}</td>
				<td class="col-md-2 col-sm-3">
					<a href="{{ URL::route('departments.edit', array('id' => $dept->id)) }}" class="btn btn-default btn-sm btn-flat"><i class="fa fa-edit"></i> Edit</a> 
					{{ Form::open(array('route' => array('departments.destroy', $dept->id), 'method' => 'delete', 'style' => 'display:inline-block;')) }}
					<button type="submit" href="{{ URL::route('departments.destroy', array('id' => $dept->id)) }}" class="btn btn-danger btn-sm btn-flat destroy-dept"><i class="fa fa-trash-o"></i> Delete</button></td>
					{{ Form::close() }}
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop

@section('scripts')
<script>
$(function() {
	$('.destroy-dept').click(function(e) {
		e.preventDefault();
		if (confirm('Do you really want to delete this record?')) {
			$(this).parent().submit();
		}
	});
});
</script>
@stop