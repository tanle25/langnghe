@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label">Nội dung(*)</label>
    <div class="col-sm-4">
        <textarea rows="5" placeholder="" class="form-control" name="content" required>{{isset($obj) ? $obj->content : ''}}</textarea>
    </div>
</div>
