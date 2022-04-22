@extends('back-end.layouts.main')

@section('title')
Danh sách: Chi tiết đơn hàng
@parent
@stop

@section('css')
<link href="{{asset('backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				{{-- Header table --}}
				<div class="ibox-title">
					<h5>Bảng danh sách sản phẩm</h5>
				</div>
				{{-- END Header table --}}
				<div class="ibox-content">					
					@include('back-end.partials.alert-msg')
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
                                    <th class="text-center">Mã sản phẩm</th>
                                    <th class="text-center">Tên Sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Đơn giá</th>
                                    <th class="text-center">Tổng tiền</th>
                                    <!-- <th class="text-center">Số tiền</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkout->products as $value)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$value->product->id}}"></td>
                                    <td class="text-center">{{$value->product->product_code}}</td>
                                    <td class="text-center">{{$value->product->name}}</a></td>
                                    <td class="text-center">{{$value->quantity}}</td>
                                    <td class="text-center">{{number_format($value->price, 0 ,'.' ,'.').' ₫'}}</td>
                                    <td class="text-center">{{number_format($value->price * $value->quantity, 0 ,'.' ,'.').' ₫'}}</td>
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
                                @endforeach
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- END Main content --}}
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