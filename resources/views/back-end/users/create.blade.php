@extends('back-end.layouts.main')

@section('title')
Tạo mới người dùng
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
				<h5>Thông tin chi tiết</h5>
			</div>
			<div class="ibox-content">
				<form id="form" class="form-horizontal" role="form" action="{{route('user.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
					@include('back-end.users.form')
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" >Làm mới</button>
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
    var base_url = $('#base_url').val();
    var xa_url = base_url + 'search/xa';
	$(document).ready(function() {
		$('#au_user').multiselect();
		$('#huyen').change(function(){
	        huyen_id = $('#huyen').val();
	        user_id = $('#user_id').val()
	        $.get(xa_url, {huyen: huyen_id, user: user_id}, function (data) {
		        $('.xa-content').empty().html(data);
		    });
    	});
	});
</script>
@endsection