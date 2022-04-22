@extends('back-end.layouts.main')

@section('title')
Thay đổi thông tin quản trị viên
@endsection

@section('css')
@endsection

{{-- Page content --}}
@section('content')
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin</h5>
			</div>
			<div class="ibox-content">
			<form id="form" class="form-horizontal" role="form" action="{{route('staff.update',['id'=>$obj->id])}}" 
				enctype="multipart/form-data" method="POST">
				@method('PATCH')
				@csrf
					@include('back-end.staff.form')
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" type="reset">Làm mới</button>
							<button class="btn btn-primary" type="submit">Thay đổi</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
@endsection