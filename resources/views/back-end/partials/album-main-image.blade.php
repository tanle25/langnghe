@if(isset($files))
<div class="inner">
	@if(!isset($album))
	<select class="form-control m-b" id="image" name="image" required>
		@foreach($files as $key=>$value)
		<option value="{{$key}}" {{old('image') == $key ? "selected" : ""}}>{{$value}}</option>
		@endforeach
	</select> 
	@else
	<select class="form-control m-b" id="image" name="image" required>
		@foreach($files as $key=>$value)
		<option value="{{$key}}" {{$album->image == $key ? "selected" : ""}}>{{$value}}</option>
		@endforeach
	</select>
	@endif                                       
</div>
@endif