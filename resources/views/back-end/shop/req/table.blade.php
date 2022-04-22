<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Ngày gửi</th>
			<th class="text-center">Sản phẩm</th>
			<th class="text-center">Tên liên hệ</th>
			<th class="text-center">Số điện thoại</th>
			<th class="text-center">Email</th>
			<th class="text-center">Địa chỉ</th>
			<th class="text-center">Nội dung</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		@if($obj->name != "" && $obj->product != null)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{$obj->created_at}}</td>
			<td class="text-center">{{$obj->product->name}}</td>
			<td class="text-center">{{$obj->name}}</td>
			<td class="text-center">{{$obj->phone}}</td>
			<td class="text-center">{{$obj->email}}</td>
			<td class="text-center">{{$obj->address}}</td>
			<td class="text-center">{!! $obj->content !!}</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>