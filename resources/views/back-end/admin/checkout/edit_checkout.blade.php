@extends('back-end.layouts.main')

@section('title')
Thay đổi thônng tin: Đơn hàng
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

<style type="text/css">
	.main-section{

		margin:0 auto;

		padding: 20px;

		margin-top: 100px;

		background-color: #fff;

		box-shadow: 0px 0px 20px #c1c1c1;

	}

	.fileinput-remove,

	.fileinput-upload{

		display: none;

	}
</style>

@endsection

{{-- Page content --}}
@section('content')
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin chi tiết</h5>
			</div>
			<div class="ibox-content">
			<form class="form-horizontal" role="form" action="{{route('edit_checkout', $checkout->code)}}"
				enctype="multipart/form-data" method="POST">
				<!-- @method('PATCH') -->
				@csrf
                    <div class="form-group">
                        <label class="col-md-2 control-label">Mã đơn hàng</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="code" id="code" 
                            value="{{$checkout->code}}" required readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tên Khách Hàng (*) </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" id="name" 
                            value="{{$checkout->name}}" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-2 control-label">Số điện thoại (*) </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" id="phone" 
                            value="{{$checkout->phone}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email (*) </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" id="email" 
                            value="{{$checkout->email}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Địa chỉ (*) </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address" id="address" 
                            value="{{$checkout->address}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Trạng thái (*) </label>
                        <div class="col-md-8">
                            <select class="form-control" name="status">
                                <option value="" disabled>Chọn trạng thái</option>
                                @if($checkout->status == 1)
                                <option value="1" selected>Đang chờ duyệt</option>
                                @else
                                <option value="1">Đang chờ duyệt</option> 
                                @endif

                                @if($checkout->status == 2)
                                <option value="2" selected>Đang vận chuyển</option>
                                @else
                                <option value="2">Đang vận chuyển</option>
                                @endif

                                @if($checkout->status == 3)
                                <option value="3" selected>Đã giao hàng</option>
                                @else
                                <option value="3">Đã giao hàng</option>
                                @endif

                                @if($checkout->status == 4)
                                <option value="4" selected>Hoàn trả</option>
                                @else
                                <option value="4">Hoàn trả</option>
                                @endif

                                @if($checkout->status == 5)
                                <option value="5" selected>Từ chối</option>
                                @else
                                <option value="5">Từ chối</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" >Làm mới</button>
							<button class="btn btn-primary" type="submit">Cập nhật</button>
						</div>
					</div>
				</form>
			</div>
        </div>
        
        <div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Chi tiết giỏ hàng</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>TT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checkout->products as $index => $item)
                        <tr>
                            <td><strong>{{$index + 1}}</strong></td>
                            <td>{{$item->product->name}}</td>
                            <td style="width:100px"><img style="width:100%" src="{{get_image_product($item->product->product_code.'/'.$item->product->main_image)}}" alt="{{$item->product->name}}"></td>
                            <td>{{$item->quantity}}</td>
                            <td>{{number_format($item->price,0, '', '.')}} <sup>đ</sup></td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Tổng tiền</th>
                            <th colspan="2"></th>
                            <th>{{number_format($checkout->sum,0, '','.')}} <sup>đ</sup></th>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

	</div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>