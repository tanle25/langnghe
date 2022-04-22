<div class="main-post col-md-8">
	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label class="control-label">Tên bộ sưu tập(*)</label>
		<div class="inner">
			<input type="text" class="form-control" name="name" id="name" 
			value="{{isset($obj) ? $obj->name : old('name')}}" placeholder="Nhập tiêu đề" required>
			<input type="hidden" name="_id" id="_id" value="{{isset($obj) ? $obj->id : ''}}">
		</div>
	</div>
	<div class="form-group lb-slug {{ $errors->has('slug') ? 'has-error' : '' }}">
		<label class="control-label">Đường dẫn tĩnh(*)</label>
		<div class="inner">
			<input type="text" class="form-control slug" name="slug" id="slug" value="{{isset($obj) ? $obj->slug : old('slug')}}">
		</div>
	</div>
	<div class="box box-primary">
		<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
			<label class="control-label">Nội dung(*)</label>
			<div class="noi-dung">
				<textarea name="content" id="content" class="form-control my-editor" rows="40" required>
					{{isset($obj) ? $obj->content : old('content')}}
				</textarea>
			</div>
		</div>
	</div>
	<div class="box box-primary">
		@include('back-end.partials.seo')
	</div>
</div>
<div class="sidebar-post col-md-4">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
				<label class="control-label">Ảnh đại diện(*)</label>
				<span id="choosen-image">
				
				</span>		
			</div> 
			<div class="form-group">
				<div id="preview">
					@if(isset($obj))
					<div class="img_preview" style="margin-bottom: 20px;width:100%"><img style="max-height:200px; width:100%; object-fit:cover" src="{{$obj->image}}"/></div>';
					@endif
				</div>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
	<div class="form-group">
		<label class="control-label">Thời gian</label>
		<div class="inner">
			<input type="text" class="form-control" name="time" id="time" value="{{isset($obj) ? $obj->time : old('time')}}">                        
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">Ngày tháng</label>
		<div class="inner">
			<input type="text" class="form-control" name="date" id="date" value="{{isset($obj) ? $obj->date : old('time')}}">                        
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
	<div class="form-group">
	    <label class="control-label">Thẻ Tags</label>
	    <select data-placeholder="Chọn thẻ tag gắn với bài viết" name=tags[] 
	        class="form-control chosen-select" multiple tabindex="4">
	            @foreach($tags as $key=>$value)
	                <option value="{{$value}}" 
	                    {{isset($obj) ? (in_array($value, $obj->array_tag) ? 'selected' : '') : ''}}>
	                    {{$value}}
	                </option>
	            @endforeach
	    </select>
	</div>
</div>

