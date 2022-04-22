@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề(*)</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="Tên thương hiệu đồng hành" required>
    </div>
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Ảnh</label>
    <div class="col-sm-8">
        <input type="file" name="image">
        @if(isset($obj))
        <img src="{{asset($obj->url)}}" width="300" style="margin-top: 15px">
        @else
        <img src="" width="300" style="display: none; margin-top: 15px">
        @endif
    </div>
</div>

