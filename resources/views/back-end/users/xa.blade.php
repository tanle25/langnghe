<label class="col-sm-2 control-label">Xã</label>
<div class="col-md-5">
    <select class="form-control m-b" name="xa" id="xa" >
        <option label=""></option>
        @foreach($data as $xa)
        <option value="{{$xa->id}}" {{isset($user) ? ($user->xa == $xa->id ? 'selected' : '') :
        (old('xa_id') == $xa->id ? 'selected' : '')}}>
        {{$xa->name}}
    	</option>
    	@endforeach
	</select>
</div>
