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
			<div class="col-md-offset-2 col-md-9">
				<div class="login register" style="padding-bottom:30px;">
					<div class="row">
						<div class="col-md-4">
							<div class="left-form-register">
								<div class="mod-third-party-login-line-bottom">
									<span>Kết nối với tài khoản mạng xã hội</span>
								</div>
								<div class="mod-login-third ">
									<div class="mod-third-party-login">
										<div class="mod-third-party-login-bd row">
											<div class="col-sm-12">
												<a style="color: #fff;" href="redirect/facebook" class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-fb">Facebook</a>
											</div>
											<div class="col-sm-12">
												<a style="color: #fff;" href="redirect/google" class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-google">Google</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="right-form-register">
								<div class="login-title row">
									<h3>Đăng ký thành viên</h3>
								</div>
								<form id="form_register" class="form-horizontal" role="form" method="POST" action="{{route('step2.post')}}">
									@csrf
									<div class="row">
										@if(session('success-user-register'))
										<div class="col-md-12 alert alert-success text-center">
											{!! session('success-user-register') !!}
										</div>
										@endif
										@if(session('error-user-register'))
										<div class="col-md-12 alert alert-danger text-center">
											{!! session('error-user-register') !!}
										</div>
										@endif
									</div>
									<div class="mod-regis-cs">
										<input type="hidden" name="otp_id" id="otp_id" value="{{$otp}}">
										<input type="hidden" name="email" id="email" value="{{$email}}">
										<div class="form-group">
											<label for="" class="col-sm-4 control-label">Mã xác minh:</label>
											<div class="col-sm-5">
												<input id="verify_code" type="text" placeholder="Mã xác minh" class="input-mxm input-lg-1 form-control" name="verify_code" value="" required="" autofocus="">
											</div>
										</div>
										<div class="form-group">
											<label for="" class="col-sm-4 control-label">Họ tên:</label>
											<div class="col-sm-8">
												<input id="name" type="text" placeholder="Họ tên" class="input-lg-1 form-control" name="name" value="" required="" autofocus="">

											</div>
										</div>
										<div class="form-group">
											<label for="" class="col-sm-4 control-label">Mật khẩu:</label>
											<div class="col-sm-8">
												<input id="password" type="password" placeholder="Mật khẩu" class="input-lg-1 form-control" name="password" required="">

											</div>
										</div>

										<div class="form-group">
											<label for="" class="col-sm-4 control-label">Nhập lại mật khẩu:</label>
											<div class="col-sm-8">
												<input id="password-confirm" type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="password_confirmation" required="">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-4 col-sm-8">
												<div class="checkbox">
													<label> 
														<input id="checkbox" type="checkbox" name="checkbox" required> Tôi đồng ý với <a href="https://www.nongsanantoanthanhhoa.vn/about/dieu-khoan-tham-gia"> điều khoản sử dụng và chính sách của phần mềm</a>. 
													</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-4 col-sm-6">
												<button type="submit" class="btn-lg next-btn-primary">ĐĂNG KÝ</button>
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