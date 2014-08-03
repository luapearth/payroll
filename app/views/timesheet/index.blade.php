@section('content')
{{ Form::open(array('route' => 'timesheet.index', 'enctype' => 'multipart/form-data')) }}
	{{ Form::file('dtr') }}
	{{ Form::submit('Upload') }}
{{ Form::close() }}
@stop