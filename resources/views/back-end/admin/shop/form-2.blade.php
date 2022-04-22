<div class="panel-body">
    <fieldset class="form-horizontal">
    	<input type="hidden" name="_id" value="{{isset($obj) ? $obj->id : ''}}">
        <div class="form-group {{ $errors->has('tencs') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Tên cơ sở SXKD (*) </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="tencs" id="tencs" 
                value="{{isset($obj) ? $obj->tencs : old('tencs')}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh đại diện (*)</label>
            @if(isset($obj))
            <div class="col-sm-2">
                <input type="file" name="image" value="{{isset($obj) ? $obj->image : ''}}">
            </div>
            <div class="col-sm-3">
                <img src="{{$obj->getThumb($obj->image)}}" style="max-width: 200px;">
            </div>
            @else
            <div class="col-md-5">
            <input type="file" name="image" required>
            </div>
            @endif
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Loại doanh nghiệp (*)</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="loaidn" id="loaidn" required>
                    <option label=""></option>
                    @foreach($loaidns as $key=>$value)
                         <option value="{{$key}}" {{isset($obj) ? 
                            ($obj->loaidn == $key ? 'selected' : '') : 
                            (old('loaidn') == $key ? 'selected' : '')}}>
                        {{$value}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Huyện (*)</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="huyen" id="huyen" required>
                    <option label=""></option>
                    @foreach($huyens as $huyen)
                         <option value="{{$huyen->id}}" {{isset($obj) ? 
                            ($obj->huyen == $huyen->id ? 'selected' : '') : 
                            (old('huyen') == $huyen->id ? 'selected' : '')}}>
                        {{$huyen->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Xã\Phường (*)</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="xa" id="xa" required>
                    <option label=""></option>
                    @foreach($xas as $tmp)
                         <option value="{{$tmp->id}}" {{isset($obj) ? 
                            ($obj->xa == $tmp->id ? 'selected' : '') : 
                            (old('xa') == $tmp->id ? 'selected' : '')}}>
                        {{$tmp->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Xóm\Thôn\SN\Đường</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="xom" id="xom" 
                value="{{isset($obj) ? $obj->xom : old('xom')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Điện thoại (*)</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="dt" id="dt" 
                value="{{isset($obj) ? $obj->dt : old('dt')}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ngành quản lý</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="nganhql" id="nganhql">
                    <option label=""></option>
                    @foreach($nganhqls as $key=>$value)
                         <option value="{{$key}}" {{isset($obj) ? 
                            ($obj->nganhql == $key ? 'selected' : '') : 
                            (old('nganhql') == $key ? 'selected' : '')}}>
                        {{$value}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Loại giấy tờ (*)</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="loaigiayto" id="loaigiayto" required>
                    <option label=""></option>
                    @foreach($loaigiaytos as $key=>$value)
                         <option value="{{$key}}" {{isset($obj) ? 
                            ($obj->loaigiayto == $key ? 'selected' : '') : 
                            (old('loaigiayto') == $key ? 'selected' : '')}}>
                        {{$value}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Số giấy (*)</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="sogiay" id="sogiay" 
                value="{{isset($obj) ? $obj->sogiay : old('sogiay')}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Cơ quan cấp phép (*)</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="coquancp" id="coquancp" 
                value="{{isset($obj) ? $obj->coquancp : old('coquancp')}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ngày cấp (*)</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="ngaycap" id="ngaycap" 
                value="{{isset($obj) ? $obj->ngaycap : old('ngaycap')}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh giấy tờ 1 (*)</label>
            @if(isset($obj))
            <div class="col-sm-2">
                <input type="file" name="image_1" value="{{isset($obj) ? $obj->image_1 : ''}}">
            </div>
            <div class="col-sm-3">
                <img src="{{$obj->getThumb($obj->image_1)}}" style="max-width: 200px;">
            </div>
            @else
            <div class="col-md-5">
            <input type="file" name="image_1" required>
            </div>
            @endif
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh giấy tờ 2</label>
            @if(isset($obj))
            <div class="col-sm-2">
                <input type="file" name="image_2" value="{{isset($obj) ? $obj->image_2 : ''}}">
            </div>
            <div class="col-sm-3">
                <img src="{{$obj->getThumb($obj->image_2)}}" style="max-width: 200px;">
            </div>
            @else
            <div class="col-md-5">
            <input type="file" name="image_2">
            </div>
            @endif
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Người đại diện</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nguoidaidien" id="nguoidaidien" 
                value="{{isset($obj) ? $obj->nguoidaidien : old('nguoidaidien')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Quy mô</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="quymo" id="quymo">
                    <option label=""></option>
                    @foreach($quymos as $key=>$value)
                         <option value="{{$key}}" {{isset($obj) ? 
                            ($obj->quymo == $key ? 'selected' : '') : 
                            (old('quymo') == $key ? 'selected' : '')}}>
                        {{$value}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </fieldset>
</div>