<div class="main-post col-md-8">
	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label class="control-label">Tiêu đề bài viết(*)</label>
		<div class="inner">
			<input type="text" class="form-control" name="name" id="name"
			value="{{isset($obj) ? $obj->name : old('name')}}" placeholder="Nhập tiêu đề" required>
			<input type="hidden" name="_id" id="_id" value="{{isset($obj) ? $obj->id : ''}}">
		</div>
	</div>
	<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
		<label class="control-label">Đường dẫn</label>
		<div class="inner">
			<input type="text" class="form-control" name="slug" id="slug"
			value="{{isset($obj) ? $obj->slug : old('slug')}}" placeholder="Đường dẫn">
		</div>
	</div>
	<div class="box box-primary">
		<div class="form-group {{ $errors->has('des_s') ? 'has-error' : '' }}">
			<label class="control-label">Miêu tả ngắn(*)</label>
			<div>
				<textarea rows="5" placeholder="" class="form-control" name="des_s">{{isset($obj) ? $obj->des_s : ''}}</textarea>
			</div>
		</div>
		<div class="form-group {{ $errors->has('des_s') ? 'has-error' : '' }}">
			<label class="control-label">Nội dung</label>
			<div>
				<textarea rows="10" placeholder="" class="form-control" name="des_f">{!! isset($obj) ? $obj->des_f : '' !!}</textarea>
			</div>
		</div>
	</div>
	<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
		<label class="control-label">Link</label>
		<div class="inner">
			<input type="text" class="form-control" name="link" id="link"
			value="{{isset($obj) ? $obj->link : old('link')}}" placeholder="Nhập link bài viết nếu dẫn tới trang khác">
		</div>
	</div>
</div>
<div class="sidebar-post col-md-4">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
				<label class="control-label">Ảnh đại diện(*)</label>
				<div class="thumb">
					<input type="file" name="image">
					@if(isset($obj))
					<img src="{{asset($obj->image)}}" width="300" style="margin-top: 15px">
					@else
					<img src="" width="300" style="display: none; margin-top: 15px">
					@endif
				</div>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
	<div class="form-group">
		<label class="control-label">Chuyên mục(*)</label>
		<div class="inner">
			@if(!isset($obj))
			<select class="form-control m-b" name="cat_id" id="cat_id" required>
				<option label=""></option>
				@foreach($cats as $p)
				<option value="{{$p->id}}" {{old('cat_id') == $p->id ? "selected" : ""}}>{{$p->name}}</option>
				@endforeach
			</select>
			@else
			<select class="form-control m-b" name="cat_id" id="cat_id" required>
				<option label=""></option>
				@foreach($cats as $p)
				<option value="{{$p->id}}" {{$obj->cat_id == $p->id ? "selected" : ""}}>{{$p->name}}</option>
				@endforeach
			</select>
			@endif
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">Trạng thái (*)</label>
		<div class="inner">
			@if(!isset($obj))
			<select class="form-control m-b" name="status">
				<option value="1" {{old('status') == "1" ? "selected" : ""}}>Sử dụng</option>
				<option value="0" {{old('status') == "0" ? "selected" : ""}}>Chưa sử dụng</option>
			</select>
			@else
			<select class="form-control m-b" name="status">
				<option value="1" {{$obj->status == "1" ? "selected" : ""}}>Sử dụng</option>
				<option value="0" {{$obj->status == "0" ? "selected" : ""}}>Chưa sử dụng</option>
			</select>
			@endif
		</div>
	</div>
</div>

