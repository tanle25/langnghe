@if(count($errors) > 0)
<div class="alert alert-danger">
	@foreach($errors->all() as $err)
	<strong>{{$err}}</strong><br>
	@endforeach
</div>
@endif
@if(session('error-'.$name_session))
<div class="alert alert-danger">
	<strong>{{session('error-'.$name_session)}}</strong>
</div>
@endif
@if(session('success-'.$name_session))
<div class="alert alert-success">
	<strong>{{session('success-'.$name_session)}}</strong>
</div>
@endif