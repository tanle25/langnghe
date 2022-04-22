<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Họ và tên</th>
			<th class="text-center">Email</th>
			<th class="text-center">Số điện thoại</th>
			<th class="text-center">Tiêu đề</th>
			<th class="text-center">Nội dung</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{$obj->name}}</td>
			<td class="text-center">{{ $obj->email }}</td>
			<td class="text-center">{{ $obj->phone }}</td>
			<td class="text-center">{{ $obj->title }}</td>
			<td class="text-center">{{ $obj->content }}</td>
			<td class="text-center">
				<a 	class="btn btn-danger btn-circle btn-sm delete-button" 
					data-action ="{{ route('contact.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>