<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Tên danh mục</th>
			<th class="text-center">Đường dẫn</th>
			<th class="text-center">Loại danh mục</th>
			<th class="text-center">Thứ tự ưu tiên</th>
			<th class="text-center">Trạng Thái</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
			<tr>
				<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
				<td>{!! "<b><i>".$obj->name."</b></i>" !!}</td>
				<td class="text-center">{{$obj->slug}}</td>
				<td class="text-center">
					@if ($obj->type == 1)
					<span class="label label-success">Có danh mục con</span></a>
					@else
					<span class="label label-danger">Không có danh mục con</span></a>
					@endif
				</td>
				<td class="text-center">{{$obj->pos}}</td>
				<td class="text-center">
					@if ($obj->status == 1)
					<span class="label label-success">Đang sử dụng</span></a>
					@else
					<span class="label label-danger">Ngừng sử dụng</span></a>
					@endif
				</td>
				<td class="text-center">
					<a href="{{route('type-product.edit', $obj->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
					<a 	class="btn btn-danger btn-circle btn-sm delete-button"
						data-action ="{{ route('type-product.destroy',$obj->id) }}" type="button">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@foreach($obj->child as $ch)
			<tr>
				<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$ch->id}}"></td>
				<td>{!! $obj->name." / <b><i>".$ch->name."</b></i>" !!}</td>
				<td class="text-center">{{$ch->slug}}</td>
				<td class="text-center">
					@if ($ch->type == 1)
					<span class="label label-success">Có danh mục con</span></a>
					@else
					<span class="label label-danger">Không có danh mục con</span></a>
					@endif
				</td>
				<td class="text-center">{{$ch->pos}}</td>
				<td class="text-center">
					@if ($ch->status == 1)
					<span class="label label-success">Đang sử dụng</span></a>
					@else
					<span class="label label-danger">Ngừng sử dụng</span></a>
					@endif
				</td>
				<td class="text-center">
					<a href="{{route('type-product.edit', ['id'=>$ch->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
					<a 	class="btn btn-danger btn-circle btn-sm delete-button"
						data-action ="{{ route('type-product.destroy',$ch->id) }}" type="button">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		@endforeach
	</tbody>
</table>
