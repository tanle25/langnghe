
<!DOCTYPE html>
<html lang="vi">
@include('front-end.partials.head')
@yield('css')
<body id="body_content">
	@include('front-end.partials.header')
	<div class="container">
	@if(session('error'))
	<div class="alert alert-danger">
		<strong>{{session('error')}}</strong>
	</div>
	@endif
	@if(session('success'))
	<div class="alert alert-success">
		<strong>{{session('success')}}</strong>
	</div>
	@endif
	</div>
	<!-- end-header -->
	@yield('content')
	@include('front-end.modals.contact-home')
	@include('front-end.partials.footer')
	
	@include('front-end.partials.js')
	@yield('js') 
</body>

</html>
