@extends('back-end.layouts.main')

@section('title')
Tạo mới quản trị viên
@endsection

@section('css')
<link href="{{asset('css/bootstrap-multiselect.css')}}" rel="stylesheet">
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
				<form id="form" class="form-horizontal" role="form" action="{{route('staff.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
					@include('back-end.staff.form')
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" type="reset">Làm mới</button>
							<button class="btn btn-primary" type="submit">Tạo mới</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>
@endsection
@section('js')
<script src="{{asset('js/bootstrap-multiselect.js')}}"></script>
<script>
	$(document).ready(function() {
		$('#au_user').multiselect();
	});
</script>	
@endsection