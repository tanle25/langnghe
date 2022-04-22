<div class="panel-body">
    <fieldset class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Đơn vị</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="unit" id="unit" 
                value="{{isset($obj) ? $obj->unit : old('unit')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giá gốc</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="price" id="price" 
                value="{{isset($obj) ? $obj->price : old('price')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giá khuyến mãi</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="sale_off" id="sale_off" 
                value="{{isset($obj) ? $obj->sale_off : old('sale_off')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Số lượng</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="amount" id="amount" 
                value="{{isset($obj) ? $obj->amount : old('amount')}}">
            </div>
        </div>
    </fieldset>
</div>