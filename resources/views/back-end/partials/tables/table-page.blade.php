<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="text-center">Tên trang</th>
			<th class="text-center">Đường dẫn</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
        {{-- @dd($data) --}}
		@foreach($data as $obj)

        {{-- @dd($obj->id) --}}
		<tr>
			<td class="text-center">{{$obj->name}}</td>
			<td class="text-center">{{config('admin.base_url').$obj->slug}}</td>
			<td class="text-center">
				<a href="{{route('page.edit', $obj->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<a 	class="btn btn-danger btn-circle btn-sm delete-button"
					data-action ="{{ route('page.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
