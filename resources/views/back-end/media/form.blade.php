@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="title" id="title" value="{{isset($obj) ? $obj->title : ''}}" placeholder="">
    </div>
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Ảnh</label>
    <div class="col-sm-4">
        <div class="input-group">
            <span class="input-group-btn">
                <a href="{{env('URL_FILEMANAGE_0', '')}}"
                class="btn btn-primary red iframe-btn" id="iframe-btn-0"><i
                class="fa fa-picture-o"></i>Chọn</a>
            </span>
            @if(isset($obj))    
            <input id="thumb_0" class="form-control" type="text" name="image" value="{{$obj->image}}" required>     
            @else
            <input id="thumb_0" class="form-control" type="text" name="image" required>
            @endif
        </div>

        <div id="preview_0">
            @if(isset($obj))
            <img src="{{$obj->image}}" style="max-width: 250px;">       
            @else
            @endif
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Loại media(*)</label>
    <div class="col-md-4">
        <select class="form-control m-b" name="type" id="type">
            <option value="1" {{isset($obj) ? ($obj->status == 1 ? 'selected' : '') : 
                (old('status') == 1 ? 'selected' : '')}}>
                Ảnh
            </option>
            <option value="2" {{isset($obj) ? ($obj->status == 2 ? 'selected' : '') : 
                (old('status') == 2 ? 'selected' : '')}}>
                Video
            </option>
            <option value="3" {{isset($obj) ? ($obj->status == 2 ? 'selected' : '') : 
                (old('status') == 2 ? 'selected' : '')}}>
                Slider
            </option>
            <option value="4" {{isset($obj) ? ($obj->status == 4 ? 'selected' : '') : 
                (old('status') == 4 ? 'selected' : '')}}>
                Khác
            </option>                                         
        </select>                                         
    </div>
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Link</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="link" id="link" 
        value="{{isset($obj) ? $obj->link : old('link')}}">
    </div>
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Nội dung</label>
    <div class="col-sm-4">
        <textarea rows="5" placeholder="" class="form-control" name="content">{{isset($obj) ? $obj->content : ''}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Page</label>
    <div class="col-sm-4">
        <select data-placeholder="Chọn trang hiển thị" name=page[] 
        class="form-control chosen-select" multiple tabindex="4">
            @foreach($pages as $page)
                <option value="{{$page->id}}" 
                    {{isset($obj) ? (in_array($page->id, $obj->array_page) ? 'selected' : '') : ''}}>
                    {{$page->name}}
                </option>
            @endforeach
        </select>
    </div>
</div>
