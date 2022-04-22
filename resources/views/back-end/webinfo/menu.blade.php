@extends('back-end.layouts.main')

@section('title')
{{$page_name}}
@parent
@stop

@section('css')
<link href="{{asset('backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				{{-- Header table --}}
				<div class="ibox-title">
					<h5 style="display: inline">Bảng danh sách</h5>
				</div>
				{{-- END Header table --}}
				<div class="ibox-content">
					@include('back-end.partials.alert-msg')
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
                                    <th class="text-center">Tên Menu</th>
                                    <th class="text-center">Đường Dẫn Menu</th>
                                    <th class="text-center">Menu Cha</th>
                                    <th class="text-center">Ngày tạo</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menu as $menu)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$menu->id}}"></td>
                                    <td class="text-center">{{$menu->name}}</td>
                                    <td class="text-center">{{$menu->slug}}</td>
                                    <td class="text-center">{{isset($menu->parent_menu) ? $menu->getParentMenu->name : 'Không có'}}</td>
                                    <td class="text-center">{{date('d-m-Y', strtotime($menu->created_at))}}</td>
                                    <td class="text-center">
                                        <a href="{{route('menu_edit', $menu->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-circle btn-sm delete-button"data-action ="{{ route('menu_delete',$menu->id) }}" type="button">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('back-end.partials.modals.delete')
@include('back-end.partials.modals.mutile-update')
@stop
@section('js')
<!-- iCheck -->
<script src="{{asset('js/select-all.js')}}"></script>
<script src="{{asset('backend/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/delete-modal.js')}}"></script>
<script src="{{asset('js/mutile-update.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.dataTables-example').DataTable({
			pageLength: 10,
			responsive: true,
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [
			{extend: 'excel', title: 'ExampleFile'},
		]
	});
	});
</script>
@stop