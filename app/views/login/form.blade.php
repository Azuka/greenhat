@section('page_title')
{{ Lang::get('app.login.title') }}
@stop

@section('content')
{{ Form::open(array('url' => 'login', 'role' => 'form')) }}

@if ($errors->any())
	<p class="alert alert-danger">
		@foreach ($errors->all() as $message)
			{{ $message }}<br>
		@endforeach
	</p>
@endif

<div class="form-group">
	<label class="control-label">{{ Lang::get('app.login.username') }}</label>
	{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'required', 'id'=> 'inputUsername')) }}
</div>
<div class="form-group">
	<label for="inputPassword" class="control-label">{{ Lang::get('app.login.password') }}</label>
	{{ Form::password('password', array('class' => 'form-control', 'required', 'id'=> 'inputPassword')) }}
</div>
<div class="form-group">
	<input type="submit" value="{{ Lang::get('app.login.button') }}">
</div>

{{ Form::token() }}
{{ Form::close() }}
@stop

@section('footer')
<script>
	$(function(){
		if (!$('#inputUsername').val())
		{
			$('#inputUsername').focus()
		}
		else
		{
			$('#inputPassword').focus()
		}
	});
</script>
@stop