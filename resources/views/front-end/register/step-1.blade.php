@extends('front-end.layouts.main')

@section('css')

@endsection

@section('title')
Đăng ký thành viên - Kết nối cung cầu nông sản Hoằng Hóa
@endsection

@section('content')
<div class="wrap-page">
	<div class="register-bg">
		<div class="container">
			<div class="col-md-offset-2 col-md-8">
				<div class="login register">
					<div class="login-other">
						<span>Bạn đã là thành viên? <a class="btn-register" href="{{route('login')}}">Đăng nhập</a> tại đây</span>
					</div>
					<div class="row">
						
						<div class="col-md-8">
							<div class="right-form-register">
								<div class="login-title row">
									<h3>Đăng ký thành viên</h3>
								</div>
								@if(session('error-user-register'))
								<div class="alert alert-danger">
									<strong>{{session('error-user-register')}}</strong>
								</div>
								@endif
								<form id="form_register" class="form-horizontal" role="form" method="post" action="{{route('register.post')}}">
									@csrf
									<div class="mod-regis-cs">
										<div class="form-group">
											<label class="col-sm-4 control-label">Email</label>
											<div class="col-sm-8">
												<input id="email" type="email" placeholder="Nhập email của bạn" class="input-lg-1 form-control" name="email" value="" required="">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-4 col-sm-6" style="margin-top: 20px;">
												<button type="submit" class="btn-lg next-btn-primary">Tiếp tục</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
@endsection