<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Mã đơn hàng</th>
			<th class="text-center">Tên liên hệ</th>
			<th class="text-center">Số điện thoại</th>
			<th class="text-center">Email</th>
			<th class="text-center">Địa chỉ</th>
			<th class="text-center">Số tiền</th>
			<th class="text-center">Hành động</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		@if($obj->name != "")
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">
				<a href="{{route('detail_checkout', $obj->code)}}">{{$obj->code}}</a>
			</td>
			<td class="text-center">
				{{$obj->name}}</a>
			</td>
			<td class="text-center">{{$obj->phone}}</td>
			<td class="text-center">{{$obj->email}}</td>
			<td class="text-center">{{$obj->address}}</td>
			<td class="text-center">{{number_format($obj->getTotal(), 0 ,'.' ,'.').' ₫'}}</td>
			{{-- <td class="text-center">
				@if ($obj->status == 0)
				<span class="label label-warning">Đang chờ duyệt</span></a>
				@elseif ($obj->status == 1)
				<span class="label label-warning">Đang vận chuyển</span></a>
				@elseif ($obj->status == 2)
				<span class="label label-success">Đã giao hàng</span></a>
				@elseif ($obj->status == 3)
				<span class="label label-danger">Hoàn trả</span></a>
				@elseif ($obj->status == 4)
				<span class="label label-danger">Từ chối</span></a>
				@endif
			</td> --}}
			<td class="text-center">
				<a href="{{route('edit_checkout', $obj->code)}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<!-- <a 	class="btn btn-danger btn-circle btn-sm delete-button" 
					data-action ="{{ route('admin-product.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a> -->
			</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>