@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề(*)</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="" required>
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
<div class="form-group">
    <label class="col-sm-2 control-label">Miêu tả ngắn</label>
    <div class="col-sm-8">
        <textarea name="des_s" id="des_s" class="form-control my-editor" rows="40" required>
            {{isset($obj) ? $obj->des_s : old('des_s')}}
        </textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Miêu tả chi tiết</label>
    <div class="col-sm-8">
        <textarea name="des_f" id="des_f" class="form-control my-editor" rows="40" required>
            {{isset($obj) ? $obj->des_f : old('des_f')}}
        </textarea>
    </div>
</div>
<div class="form-group  {{ $errors->has('page_id') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Trang hiển thị(*)</label>
    <div class="col-sm-4">
        <select name=page_id class="form-control" required>
            <option label=""></option>
            @foreach($pages as $page)
            <option value="{{$page->id}}" 
                {{isset($obj) ? 
                    (($obj->page_id == $page->id) ? 'selected' : '') 
                    : (old('page_id') == $page->id ? 'selected' : '')}}>
                {{$page->name}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group  {{ $errors->has('page_id') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Dạng hiển thị(*)</label>
    <div class="col-sm-4">
        <select name="type" class="form-control" required>
            <option label=""></option>
            @foreach(config('common.type_section') as $key=>$value)
            <option value="{{$key}}" 
                {{isset($obj) ? 
                    (($obj->type == $key) ? 'selected' : '') 
                    : (old('type') == $key ? 'selected' : '')}}>
                {{$value}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Vị trí</label>
    <div class="col-sm-4">
        <input type="number" class="form-control" name="pos" id="pos" value="{{isset($obj) ? $obj->pos : ''}}" 
        placeholder="1">
    </div>
</div>
