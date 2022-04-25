@extends('back-end.layouts.main')

@section('title')
Tạo mới bài viết
@endsection

@section('css')
<link href="{{asset('backend/css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
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
				<form id="form" class="form-horizontal" role="form" action="{{route('post.store')}}"
				enctype="multipart/form-data" method="POST">
				@csrf
					@include('back-end.post.form')
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
<script src="{{asset('js/slug.js')}}"></script>
<script src="{{asset('backend/js/plugins/chosen/chosen.jquery.js')}}"></script>
<script>
	var ckeditor_path = $("#ckeditor_path").val();
	$(document).ready(function() {
		var ckeditor_path = $("#ckeditor_path").val();
		CKEDITOR.replace('des_f' ,{
			filebrowserBrowseUrl : ckeditor_path,
			filebrowserUploadUrl : ckeditor_path,
			filebrowserImageBrowseUrl : ckeditor_path,
		});
		$("input[type='file']").change(function() {
			readURL(this);
		});
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$(input).parent().parent().find('img').attr('src', e.target.result).css('display', 'block');
			}
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}
</script>
@endsection
