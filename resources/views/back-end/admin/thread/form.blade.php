@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group  {{ $errors->has('shop_id') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Cơ sở SXKD(*)</label>
    <div class="col-sm-4">
        <select name=shop_id class="form-control" required>
            <option label=""></option>
            @foreach($shops as $shop)
            <option value="{{$shop->id}}" 
                {{isset($obj) ? 
                    (($obj->shop_id == $shop->id) ? 'selected' : '') 
                    : (old('shop_id') == $shop->id ? 'selected' : '')}}>
                {{$shop->tencs}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Tên loại giấy tờ (*)</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="Tiêu chuẩn ISO 22000" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Miêu tả ngắn (*)</label>
    <div class="col-sm-8">
        <textarea name="des_s" id="des_s" class="form-control my-editor" rows="40" required>
            {{isset($obj) ? $obj->des_s : old('des_s')}}
        </textarea>
    </div>
</div>
@if(isset($obj))
<div class="form-group">
    <label class="col-sm-2 control-label">Hình ảnh</label>
    <div class="col-sm-4">
        <div class="file-loading">
            <input id="file-1" type="file" name="image" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
        </div>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-sm-2 control-label">Hình ảnh</label>
    <div class="col-sm-4">
        <div class="file-loading">
            <input id="file-1" type="file" name="image" multiple class="file" data-overwrite-initial="false" data-min-file-count="2" required>
        </div>
    </div>
</div>
@endif
