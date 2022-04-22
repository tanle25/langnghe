<div class="panel-body">
    <fieldset class="form-horizontal">
        <div class="form-group" >
            <label class="col-sm-2 control-label">Huyện</label>
            <div class="col-md-5">
                <select class="form-control m-b" name="huyen" id="huyen" >
                    <option label=""></option>
                    @foreach($huyens as $huyen)
                    <option value="{{$huyen->id}}" {{isset($user) ? ($user->huyen == $huyen->id ? 'selected' : '') :
                    (old('huyen') == $huyen->id ? 'selected' : '')}}>
                    {{$huyen->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
         <div class="form-group xa-content">
            @include('back-end.users.xa',['data'=>isset($data) ? $data : null])
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Ngõ/Xóm</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="xom" id="xom" 
                value="{{isset($obj) ? $obj->xom : old('xom')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Điểm tích lũy</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="point" id="point" 
                value="{{isset($point) ? $obj->point : old('point')}}">
            </div>
        </div>
    </fieldset>
</div>