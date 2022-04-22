<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Loại tin</th>
			<th class="text-center">Tiêu đề</th>
			<th class="text-center">Nội dung</th>
			<th class="text-center">Huyện</th>
			<th class="text-center">Thời hạn</th>
			<th class="text-center">Người đăng</th>
			<th class="text-center">Trạng Thái</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">
				@if ($obj->type == 1)
				<span class="label label-success">Cần mua</span></a>
				@elseif ($obj->type == 2)
				<span class="label label-danger">Cần bán</span></a>
					@elseif ($obj->type == 3)
				<span class="label label-warning">Tìm đối tác</span></a>
				@endif
			</td>
			<td class="text-center">{{$obj->name}}</td>
			<td class="text-center">{{$obj->content}}</td>
			<td class="text-center">{{ $obj->huyen != null ? $obj->huyen->name : '' }}</td>
			<td class="text-center">{{$obj->end_date}}</td>
			<td class="text-center">{{ $obj->user != null ? $obj->user->name : '' }}</td>
			<td class="text-center">
				@if ($obj->status == 1)
				<span class="label label-success">Đang sử dụng</span></a>
				@elseif ($obj->status == 0)
				<span class="label label-danger">Ngừng sử dụng</span></a>
				@elseif ($obj->status == 2)
				<span class="label label-warning">Chờ duyệt</span></a>
				@endif
			</td>
			<td class="text-center">
				@if($obj->status != 1)
					<a href="{{route('thread.active', ['id'=>$obj->id])}}" class="btn btn-successs btn-circle"><i class="fa fa-check"></i></a>
				@endif
				@if($obj->status != 0)
					<a href="{{route('thread.deactive', ['id'=>$obj->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				@endif
				<a 	class="btn btn-danger btn-circle btn-sm delete-button"
					data-action ="{{ route('thread.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>