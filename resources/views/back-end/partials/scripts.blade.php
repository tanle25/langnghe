<!-- Mainly scripts -->
<script src="{{asset('backend/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script> -->
<script src="{{asset('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('backend/js/inspinia.js')}}"></script>
<script src="{{asset('backend/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('js/filemanage.js')}}"></script>

<script>
	$(document).ready(function () {
		$('.i-checks').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		});
        $('#lfm').filemanager('image',{prefix: 'admin/filemanager'});
	});
</script>
