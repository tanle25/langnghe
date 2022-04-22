<div class="form-group required">
	<label for="title" class="control-label col-lg-3 col-sm-4">Tên sản phẩm, hàng hóa<sup>*</sup>
	</label>
	<div class="col-lg-9 col-sm-8">
		<input class="title form-control" required id="name" type="text" name="name" value="{{isset($obj) ? $obj->name : ''}}" required>
	</div>
</div>
<div class="form-group required  ">
	<label for="product_category_id" class="control-label col-lg-3 col-sm-4">Loại sản phẩm
		<sup>*</sup>
	</label>
	<div class="col-lg-9 col-sm-8 ">
		<select class="form-control col-lg-12" id="product_category_id"
		name="type_product_id" required>
		<option class="" label="" path="" ></option>
		@foreach($types as $type)
		<option class="a" level=0 value="{{$type->id}}" path="{{$type->name}}" {{isset($obj) ? ($obj->type_product_id == $type->id ? 'selected' : '') : ''}}>{{$type->name}}</option>
		@foreach($type->child as $child)
		<option class="a" level=1 value="{{$child->id}}" path="{{$type->name}}/{{$child->name}}" {{isset($obj) ? ($obj->type_product_id == $child->id ? 'selected' : '') : ''}}>&nbsp;  &nbsp;{{$child->name}}</option>
		@endforeach
		;
		@endforeach
		</select>
	</div>
</div>
<div class="form-group required">
	<label for="content" class="control-label col-lg-3 col-sm-4">Giá sản phẩm<sup>*</sup>
	</label>
	<div class="col-lg-9 col-sm-8">
		<input class="form-control" value="{{isset($obj) ? $obj->content : ''}}" required id="content" type="text" name="content" required>
	</div>
</div>
<div class="form-group required">
	<label for="phone" class="control-label col-lg-3 col-sm-4">Số điện thoại<sup>*</sup>
	</label>
	<div class="col-lg-9 col-sm-8">
		<input class="form-control" value="{{isset($obj) ? $obj->phone : ''}}" id="phone" type="text" name="phone" required>
	</div>
</div>
<div class="form-group">
	<label for="address" class="control-label col-lg-3 col-sm-4">Địa chỉ</sup>
	</label>
	<div class="col-lg-9 col-sm-8"> 
		<input class="form-control" value="{{isset($obj) ? $obj->address : ''}}" id="address" type="text" name="address" required>
	</div>
</div>
<div class="form-group required">
	<label for="region_id" class="control-label col-lg-3 col-sm-4 region-label">Khu vực giao
		hàng <sup>*</sup>
	</label>
	<div class="col-lg-9 col-sm-8">
		<select class="form-control col-lg-12" id="region_id"
		name="xa" required>
		<option label=""></option>
		@foreach($xas as $xa)
		<option value="{{$xa->id}}" {{isset($obj) ? ($obj->region_id == $xa->id ? 'selected' : '') : ''}}>{{$xa->name}}</option>
		@endforeach
		<option value="0" {{isset($obj) ? ($obj->region_id == 0  ? 'selected' : '') : ''}}>Khác</option>
	</select>
</div>
</div>
<div class="form-group required">
	<label for="end_date"  class="control-label col-lg-3 col-sm-4">Thời hạn đăng tin <sup>*</sup>
	</label>
	<div class="col-lg-9 col-sm-8">
		<div class="">
			<input class="form-control pull-right date-picker" value="{{isset($obj) ? $obj->end_date : ''}}" required id="end_date" type="text" name="end_date">
		</div>
	</div>
</div>