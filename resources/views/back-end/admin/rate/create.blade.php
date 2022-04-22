@extends('back-end.layouts.main')

@section('title')
Thêm Đánh giá
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				{{-- Header table --}}
				<div class="ibox-title">
					<div class="row">
						<div class="col-md-12">
							<h5>Thêm đánh giá mới</h5>
						</div>
					</div>
				</div>
				{{-- END Header table --}}
				<div class="ibox-content">					
					@include('back-end.partials.alert-msg')
					<div class="row">
                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">Chọn user(*)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="Nhập tiêu đề" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">Chọn sản phấm(*)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="Nhập tiêu đề" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">Chọn số sao đánh giá(*)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="Nhập tiêu đề" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">Nội dung đánh giá(*)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="Nhập tiêu đề" required="">
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('back-end.partials.modals.delete')
{{-- END Main content --}}
@stop