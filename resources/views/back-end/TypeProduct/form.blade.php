@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label class="col-sm-2 control-label">Tên loại sản phẩm (*) </label>
	<div class="col-sm-4">
		<input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="Rau củ quả" required>
	</div>
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
	<label class="col-sm-2 control-label">Đường dẫn (*)</label>
	<div class="col-sm-4">
		<input type="text" class="form-control" name="slug" id="slug" value="{{isset($obj) ? $obj->slug : ''}}" placeholder="rau-cu-qua" required>
	</div>
</div>

<div class="form-group {{ $errors->has('pos') ? 'has-error' : '' }}">
	<label class="col-sm-2 control-label">Thứ tự ưu tiên</label>
	<div class="col-sm-4">
		<input type="text" class="form-control" name="pos" id="pos" value="{{isset($obj) ? $obj->pos : ''}}" placeholder="1">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Danh mục cha</label>
	<div class="col-sm-4">
		@if(!isset($obj))
		<select class="form-control m-b" name="parent_id" id="parent_id">
			<option label=""></option>
			@foreach($types as $p)
			<option value="{{$p->id}}" {{old('parent_id') == $p->id ? "selected" : ""}}>{{$p->name}}</option>
			@endforeach
		</select>
		@else
		<select class="form-control m-b" name="parent_id" id="parent_id">
			<option label=""></option>
			@foreach($types as $p)
			<option value="{{$p->id}}" {{$obj->parent_id == $p->id ? "selected" : ""}}>{{$p->name}}</option>
			@endforeach
		</select>
		@endif
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Loại danh mục</label>
	<div class="col-sm-4">
		@if(!isset($obj))
		<select class="form-control m-b" name="type" id="type" required>
			<option label=""></option>
			<option value="1" {{old('type') == 1 ? "selected" : ""}}>Có danh mục con</option>
			<option value="2" {{old('type') == 2 ? "selected" : ""}}>Không có danh mục con</option>
		</select>
		@else
		<select class="form-control m-b" name="type" id="type" required>
			<option label=""></option>
			<option value="1" {{$obj->type == 1 ? "selected" : ""}}>Có danh mục con</option>
			<option value="2" {{$obj->type == 2 ? "selected" : ""}}>Không có danh mục con</option>
		</select>
		@endif
	</div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
	<label class="col-sm-2 control-label">Trạng thái(*)</label>
	<div class="col-md-4">
		<select class="form-control m-b" name="status" id="status" required>
			<option value="1" {{isset($obj) ? ($obj->status == 1 ? 'selected' : '') : 
			(old('status') == 1 ? 'selected' : '')}}>
			Sử dụng
		</option>
		<option value="0" {{isset($obj) ? ($obj->status == 0 ? 'selected' : '') : 
		(old('status') == 0 ? 'selected' : '')}}>
		Tạm ngưng sử dụng
	</option>
</select>
</div>
</div>
