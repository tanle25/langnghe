<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Ảnh</th>
			<th class="text-center">Title</th>
			<th class="text-center">Link</th>
			<th class="text-center">Trang</th>
			<th class="text-center">Trạng Thái</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center"><img src="{{$obj->image}}" style="max-width: 200px;"></td>
			<td class="text-center">{{$obj->title}}</td>
			<td class="text-center">{{$obj->link}}</td>
			<td class="text-center">
			@foreach($pages as $page)
				@if(in_array($page->id,$obj->array_page))
					<span class="label label-success">{{$page->name}}</span></hr>
				@endif
			@endforeach
			</td>
			<td class="text-center">
				@if ($obj->status == 1)
				<span class="label label-success">Đang sử dụng</span></a>
				@else
				<span class="label label-danger">Ngừng sử dụng</span></a>
				@endif
			</td>
			<td class="text-center">
				<a href="{{route('icon.edit', ['id'=>$obj->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<a 	class="btn btn-danger btn-circle btn-sm delete-button" 
					data-action ="{{ route('icon.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>