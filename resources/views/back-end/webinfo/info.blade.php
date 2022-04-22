@extends('back-end.layouts.main')

@section('title')
{{$page_name}}
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
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					<strong>{{$err}}</strong><br>
					@endforeach
				</div>
				@endif
				@if(session('error-'.$flag))
				<div class="alert alert-danger">
					<strong>{{session('error-'.$flag)}}</strong>
				</div>
				@endif
				@if(session('success-'.$flag))
				<div class="alert alert-success">
					<strong>{{session('success-'.$flag)}}</strong>
				</div>
				@endif
				<form id="form" class="form-horizontal" role="form" action="{{$_route}}"
					enctype="multipart/form-data" method="POST">
					@csrf
					@include('back-end.webinfo.form.'.$_form)
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" type="reset">Khôi phục</button>
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
<script>
	$(document).ready(function() {
		settingIframe("#iframe-btn-0", "#thumb_0", "#preview_0");
		settingIframe("#iframe-btn-1", "#thumb_1", "#preview_1");
		settingIframe("#iframe-btn-2", "#thumb_2", "#preview_2");
		CKEDITOR.replace('mota' ,{
			filebrowserBrowseUrl : ckeditor_path,
			filebrowserUploadUrl : ckeditor_path,
			filebrowserImageBrowseUrl : ckeditor_path,
		});
	});
</script>
@endsection