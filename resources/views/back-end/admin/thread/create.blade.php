@extends('back-end.layouts.main')

@section('title')
Tạo mới : Giấy tờ cơ sở kinh doanh
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
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
				@include('back-end.partials.alert-msg')
				<form id="form" class="form-horizontal" role="form" action="{{route('shop-doc.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
				@include('back-end.admin.shop-doc.form')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('js/slug.js')}}"></script>
<script type="text/javascript">
	$("#file-1").fileinput({
		theme: 'fa',
		uploadUrl: "/imageUpload.php",
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		overwriteInitial: false,
		maxFileSize:2000,
		maxFilesNum: 10,
		slugCallback: function (filename) {
			return filename.replace('(', '_').replace(']', '_');
		}
	});
</script>
<script>
	var ckeditor_path = $("#ckeditor_path").val();
	$(document).ready(function() {
		CKEDITOR.replace('des_s' ,{
			filebrowserBrowseUrl : ckeditor_path,
			filebrowserUploadUrl : ckeditor_path,
			filebrowserImageBrowseUrl : ckeditor_path,
		});
	});
</script>
@endsection