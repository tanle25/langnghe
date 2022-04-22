<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label">Trạng thái(*)</label>
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