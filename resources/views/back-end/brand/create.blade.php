@extends('back-end.layouts.main')

@section('title')
Tạo mới Thương hiệu đồng hành
@endsection

@section('css')
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
				@include('back-end.partials.alert-msg')
				<form id="form" class="form-horizontal" role="form" action="{{route('brand_create')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
					@include('back-end.brand.form')
					<div class="form-group">
						@include('back-end.partials.status')
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
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function(e) {
					$(input).parent().parent().find('img').attr('src', e.target.result).css('display', 'block');
				}
				
				reader.readAsDataURL(input.files[0]); // convert to base64 string
			}
		}
		$(document).ready(function(){
			$("input[type='file']").change(function() {
				readURL(this);
			});
		});
	</script>
@endsection