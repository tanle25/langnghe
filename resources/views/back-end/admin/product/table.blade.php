<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Cơ sở kinh doanh</th>
			<th class="text-center">Mã sản phẩm</th>
			<th class="text-center">Tên sản phẩm</th>
			<th class="text-center">Đường dẫn</th>
			<th class="text-center">Giá</th>
			<th class="text-center">Số lượng</th>
			<th class="text-center">Trạng Thái</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{$obj->shop != null ? $obj->shop->tencs : ''}}</td>
			<td class="text-center">{{$obj->product_code}}</td>
			<td class="text-center">{{ $obj->name }}</td>
			<td class="text-center">{{ $obj->slug }}</td>
			<td class="text-center">{{ $obj->price }}</td>
			<td class="text-center">{{ $obj->amount }}</td>
			<td class="text-center">
				@if ($obj->status == 1)
				<span class="label label-success">Đang bán</span></a>
				@else
				<span class="label label-danger">Ngừng bán</span></a>
				@endif
			</td>
			<td class="text-center">
				<a href="{{route('admin-product.edit', $obj->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<a 	class="btn btn-danger btn-circle btn-sm delete-button"
					data-action ="{{ route('admin-product.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
