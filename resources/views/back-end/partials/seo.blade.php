</hr>
@php
if(!isset($type_form)){
$cl1 = 'col-sm-3';
$cl2 = 'col-sm-8';
}else{
$cl1 = '';
$cl2 = 'inner';
}
@endphp
@if(isset($obj))
<div class="form-group {{ $errors->has('seo_title') ? 'has-error' : '' }}">
	<label class="{{$cl1}} control-label">Meta Tag Title </label>
	<div class="{{$cl2}}">
		<input type="text" class="form-control" name="seo_title" id="seo_title" 
		value="{{$obj->seo() != null ? $obj->seo()->seo_title : old('seo_title')}}">
	</div>
</div>
<div class="form-group {{ $errors->has('seo_des') ? 'has-error' : '' }}">
	<label class="{{$cl1}} control-label">Meta Tag Description </label>
	<div class="{{$cl2}}">
		<input type="text" class="form-control" name="seo_des" id="seo_des" 
		value="{{$obj->seo() != null ? $obj->seo()->seo_des : old('seo_des')}}">
	</div>
</div>
<div class="form-group {{ $errors->has('seo_key') ? 'has-error' : '' }}">
	<label class="{{$cl1}} control-label">Meta Tag Keyword</label>
	<div class="{{$cl2}}">
		<input type="text" class="form-control" name="seo_key" id="seo_key" 
		value="{{$obj->seo() != null ? $obj->seo()->seo_key : old('seo_key')}}">
	</div>
</div>
@else
<div class="form-group {{ $errors->has('seo_title') ? 'has-error' : '' }}">
	<label class="{{$cl1}} control-label">Meta Tag Title </label>
	<div class="{{$cl2}}">
		<input type="text" class="form-control" name="seo_title" id="seo_title" 
		value="{{old('seo_title')}}">
	</div>
</div>
<div class="form-group {{ $errors->has('seo_des') ? 'has-error' : '' }}">
	<label class="{{$cl1}} control-label">Meta Tag Description </label>
	<div class="{{$cl2}}">
		<input type="text" class="form-control" name="seo_des" id="seo_des" 
		value="{{old('seo_des')}}">
	</div>
</div>
<div class="form-group {{ $errors->has('seo_key') ? 'has-error' : '' }}">
	<label class="{{$cl1}} control-label">Meta Tag Keyword</label>
	<div class="{{$cl2}}">
		<input type="text" class="form-control" name="seo_key" id="seo_key" 
		value="{{old('seo_key')}}">
	</div>
</div>
@endif