<div class="panel-body">
    <fieldset class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label">Giới thiệu </label>
            <div class="col-sm-5">
                <textarea name="mieuta" id="mieuta" class="form-control my-editor" rows="20">
                    {{isset($obj) ? $obj->mieuta : old('mieuta')}}
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Map </label>
            <div class="col-sm-5">
                <textarea name="map" id="map" class="form-control my-editor" rows="5">
                    {{isset($obj) ? $obj->map : old('map')}}
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Website</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="website" id="website" 
                value="{{isset($obj) ? $obj->website : old('website')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">FanPage</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="fanpage" id="fanpage" 
                value="{{isset($obj) ? $obj->fanpage : old('fanpage')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Doanh nghiệp nổi bật (*)</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="type" id="type">
                    <option value="0" {{isset($obj) && $obj->type == 0 ? 'selected' : ''}}>Không</option>
                    <option value="1" {{isset($obj) && $obj->type == 1 ? 'selected' : ''}}>Có</option>
                </select>
            </div>
        </div>
    </fieldset>
</div>