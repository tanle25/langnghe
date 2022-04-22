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
			<th class="text-center">Thông tin</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		@if($obj->name != "")
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{$obj->code}}</td>
			<td class="text-center">{{$obj->name}}</td>
			<td class="text-center">{{$obj->phone}}</td>
			<td class="text-center">{{$obj->email}}</td>
			<td class="text-center">{{$obj->address}}</td>
			<td class="text-center">{{number_format($obj->sum, 0 ,'.' ,'.').' ₫'}}</td>
			<td class="text-center">
				<a href="{{route('shop.checkout.detail', $obj->code)}}">Chi tiết</a>
			</td>
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
		</tr>
		@endif
		@endforeach
	</tbody>
</table>