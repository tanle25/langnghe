<div class="panel-body">
    <fieldset class="form-horizontal">
        <div class="form-group">
            <label class="col-md-2 control-label">Giới thiệu </label>
            <div class="col-md-8">
                <textarea name="des" id="des" class="form-control my-editor" rows="20">
                    {{isset($obj) ? $obj->des : old('des')}}
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Mã vạch</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="ma_vach" id="ma_vach" 
                value="{{isset($obj) ? $obj->ma_vach : old('ma_vach')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Mã truy xuất nguồn gốc</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="ma_truy_xuat" id="ma_truy_xuat" 
                value="{{isset($obj) ? $obj->ma_truy_xuat : old('ma_truy_xuat')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Sản lượng</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="san_luong" id="san_luong" 
                value="{{isset($obj) ? $obj->san_luong : old('san_luong')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Quy cách đóng gói</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="dong_goi" id="dong_goi" 
                value="{{isset($obj) ? $obj->dong_goi : old('dong_goi')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Cách bảo quản</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="bao_quan" id="bao_quan" 
                value="{{isset($obj) ? $obj->bao_quan : old('bao_quan')}}">
            </div>
        </div>
    </fieldset>
</div>