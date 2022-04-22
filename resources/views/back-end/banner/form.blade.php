@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="title" id="title" value="{{isset($obj) ? $obj->title : ''}}" placeholder="">
    </div>
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Ảnh(*)</label>
    <div class="col-sm-8">
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
<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Link</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="link" id="link" 
        value="{{isset($obj) ? $obj->link : old('link')}}">
    </div>
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Nội dung</label>
    <div class="col-sm-8">
        <textarea rows="5" placeholder="" class="form-control" name="content">{{isset($obj) ? $obj->content : ''}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Trang hiển thị (*)</label>
    <div class="col-sm-8">
        <select name="page_id" class="form-control" required>
            @foreach($pages as $page)
                <option value="{{$page->id}}" 
                    {{isset($obj) && $obj->page_id == $page->id ? 'selected' : ''}}>
                    {{$page->name}}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Vị trí hiển thị (*)</label>
    <div class="col-sm-8">
        <select name="vitri" class="form-control" required>
            @foreach(config('common.banner_vitri') as $key=>$value)
                <option value="{{$key}}" 
                    {{isset($obj) && $obj->page_id == $key  ? 'selected' : ''}}>
                    {{$value}}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group {{ $errors->has('pos') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Thứ tự</label>
    <div class="col-sm-8">
        <input type="number" class="form-control" name="pos" id="pos" 
        value="{{isset($obj) ? $obj->pos : old('pos')}}">
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Trạng thái(*)</label>
    <div class="col-md-8">
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