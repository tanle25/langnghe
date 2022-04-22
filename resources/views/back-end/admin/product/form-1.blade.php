<div class="panel-body">
    <fieldset class="form-horizontal">
    	<input type="hidden" name="_id" value="{{isset($obj) ? $obj->id : ''}}">
        @if(isset($obj))
        <div class="form-group {{ $errors->has('product_code') ? 'has-error' : '' }}">
            <label class="col-md-2 control-label">Mã sản phẩm (*) </label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="product_code" id="product_code" 
                value="{{isset($obj) ? $obj->product_code : old('product_code')}}" readonly>
            </div>
        </div>
        @endif
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="col-md-2 control-label">Tên sản phẩm (*) </label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="name" id="name" 
                value="{{isset($obj) ? $obj->name : old('name')}}" required>
            </div>
        </div>
        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
            <label class="col-md-2 control-label">Đường dẫn (*) </label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="slug" id="slug" 
                value="{{isset($obj) ? $obj->slug : old('slug')}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Loại sản phẩm (*)</label>
            <div class="col-md-8">
                <select class="form-control m-b" name="type" id="type" required>
                    <option label=""></option>
                    @foreach(config('admin.types') as $key=>$value)
                         <option value="{{$key}}" {{isset($obj) ? ($obj->type == $key ? 'selected' : '') : 
                                    (old('type') == $key ? 'selected' : '')}}>
                        {{$value}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Danh mục sản phẩm (*)</label>
            <div class="col-md-8">
                <select class="form-control m-b" name="type_product_id" id="type_product_id" required>
                    <option label=""></option>
                    @foreach($type_products as $type)
                         <option value="{{$type->id}}" {{isset($obj) ? ($obj->type_product_id == $type->id ? 'selected' : '') : 
                                    (old('type_product_id') == $type->id ? 'selected' : '')}}>
                        {{$type->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Sản phẩm nổi bật</label>
            <div class="col-md-8">
                <select class="form-control m-b" name="type_product_id_2" id="type_product_id_2">
                    <option value="0" {{isset($obj) && $obj->type_product_id_2 == 0 ? 'selected' : ''}}>Không</option>
                    <option value="1" {{isset($obj) && $obj->type_product_id_2 == 1 ? 'selected' : ''}}>Có</option>
                </select>
            </div>
        </div>
        <div class="form-group {{ $errors->has('pos') ? 'has-error' : '' }}">
            <label class="col-md-2 control-label">Thứ tự</label>
            <div class="col-md-8">
                <input type="number" class="form-control" name="pos" id="pos" 
                value="{{isset($obj) ? $obj->pos : 999}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Cơ sở kinh doanh (*)</label>
            <div class="col-md-8">
                <select class="form-control m-b" name="shop_id" id="shop_id">
                    <option label=""></option>
                    @foreach($shops as $shop)
                        <option value="{{$shop->id}}" {{isset($obj) ? ($obj->shop_id == $shop->id ? 'selected' : '') : 
                                    (old('shop_id') == $shop->id ? 'selected' : '')}}>
                            {{$shop->tencs}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        @include('back-end.partials.status')
    </fieldset>
</div>