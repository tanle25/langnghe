<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Tên cơ sở</th>
			<th class="text-center">Ảnh đại diện</th>
			<th class="text-center">Tên đăng nhập</th>
			<th class="text-center">Số điện thoại</th>
			<th class="text-center">Email</th>
			<th class="text-center">Địa chỉ</th>
			<th class="text-center">Ảnh giấy tờ 1</th>
			<th class="text-center">Ảnh giấy tờ 2</th>
			<th class="text-center">Trạng Thái</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{$obj->tencs}}</td>
			<td class="text-center"><img src="{{$obj->getThumb($obj->image)}}" style="max-width: 200px;"></td>
			<td class="text-center">{{$obj->username}}</td>
			<td class="text-center">{{$obj->dt}}</td>
			<td class="text-center">{{$obj->email}}</td>
			<td class="text-center">{{$obj->xa_model != null ? $obj->xa_model->name : ''}} - {{$obj->xom}}</td>
			<td class="text-center"><img src="{{$obj->getThumb($obj->image_1)}}" style="max-width: 200px;"></td>
			<td class="text-center"><img src="{{$obj->getThumb($obj->image_2)}}" style="max-width: 200px;"></td>
			<td class="text-center">
				@if ($obj->status == 1)
				<span class="label label-success">Đang hoạt động</span></a>
				@elseif ($obj->status == 2)
				<span class="label label-warning">Đang chờ duyệt</span></a>
				@else
				<span class="label label-danger">Ngừng hoạt động</span></a>
				@endif
			</td>
			<td class="text-center">
				<a href="{{route('shop.edit', ['id'=>$obj->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<a 	class="btn btn-danger btn-circle btn-sm delete-button" 
					data-action ="{{ route('shop.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>