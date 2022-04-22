@extends('back-end.layouts.main')

@section('title')
Tạo mới album
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
				<form id="form" class="form-horizontal" role="form" action="{{route('album.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
					@include('back-end.album.form')
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
<script src="{{asset('backend/js/plugins/chosen/chosen.jquery.js')}}"></script>
<script>
	var get_image = $('#admin_path').val() + "get-image/autocomplete";
	var ckeditor_path = $("#ckeditor_path").val();
	var id_album = $('_id').val();

	$(document).ready(function() {
		settingIframe("#iframe-btn-0", "#thumb_0", "#preview_0");
		CKEDITOR.replace('content' ,{
			filebrowserBrowseUrl : ckeditor_path,
			filebrowserUploadUrl : ckeditor_path,
			filebrowserImageBrowseUrl : ckeditor_path,
		});
		$('.chosen-select').chosen({width: "100%"});
		getImage();
	});
	function getImage(){
		slug = $('#slug').val();
		if(slug != '' ) {	
			$.get(get_image, { query: slug, album: id_album}, function (data) {
				$('#choosen-image').empty().html(data);
				img = $('#image').val();
				if(img != null && img != '')
				{
					var html = '<div class="img_preview" style="margin-bottom: 20px;width:100%"><img style="max-height:200px; width:100%; object-fit:cover" src="' + img + '"/></div>';
		          	$('#preview').html(html);	
				}else{
					$('#preview').empty();	
				}
				
		  	});
		}else{
			$('#choosen-image').empty();
			$('#preview').empty();
		}
	}
	
	function creatSlug(_str, _element) {
	    var url_ =  $("#url_hostname").val() + "create-slug";
	    $.get(url_, { str: _str, }, function (data) {
	          _element.val(data.slug);
	          getImage();
	    });
	}
	$('#name').on('change',function(){
		creatSlug($(this).val(), $("#slug"));
	});

	$('#slug').on('input',function(){
		getImage();
	});
	
	$("#choosen-image" ).delegate( "#image", "change", function() {
	  	img = $(this).val();
		var html = '<div class="img_preview" style="margin-bottom: 20px;width:100%"><img style="max-height:200px; width:100%; object-fit:cover" src="' + img + '"/></div>';
          $('#preview').html(html);
	});
</script>
@endsection