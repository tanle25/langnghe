@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Thuộc tính (*) </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="code" id="code" value="{{isset($obj) ? $obj->code : ''}}" placeholder="phone" required>
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Tên thuộc tính</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="Hotline">
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
            <input id="thumb_0" class="form-control" type="text" name="image" value="{{$obj->image}}">     
            @else
            <input id="thumb_0" class="form-control" type="text" name="image">
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
    <div class="col-sm-4">
        <input type="text" class="form-control" name="link" id="link" 
        value="{{isset($obj) ? $obj->link : old('link')}}">
    </div>
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Nội dung</label>
    <div class="col-sm-4">
        <textarea rows="5" placeholder="0999.9999" class="form-control" name="content">{{isset($obj) ? $obj->content : ''}}</textarea>
    </div>
</div>
