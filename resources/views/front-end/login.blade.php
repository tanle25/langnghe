@extends('front-end.layouts.main')

@section('css')

@endsection

@section('title')
Đăng nhập - Kết nối cung cầu nông sản Hoằng Hóa
@endsection

@section('content')
<div class="wrap-page">
	<div class="register-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="login register">
						<div class="login-other">
							<span>Bạn chưa là thành viên? <a class="btn-register" href="{{route('register')}}">Đăng ký</a> tại đây</span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="left-form-login">
									<div class="dn-tit">Đăng nhập</div>
								</div>
							</div>
							<div class="col-md-8">   
								<div class="right-form-login">
									<div class="login-title row">
										<div class=""><h3>Đăng nhập</h3></div>
									</div>
									<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        				@csrf
										<div class="mod-regis-cs">
											<div class="form-group">
												<label for="" class="col-sm-4 control-label">Email hoặc SĐT:</label>
												<div class="col-sm-8">
													<input id="username" type="text" class="input-lg-1 form-control @error('username') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="username" autofocus>
					                                @error('username')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-4 control-label">Mật khẩu:</label>
												<div class="col-sm-8">
													<input id="password" type="password" class="input-lg-1 form-control" name="password" required="" autofocus="">
												</div>
											</div>
											<div class="forgot-password">
												<a class="btn user-link" href="#">
													Quên mật khẩu?
												</a>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-4 col-sm-6">
													<button type="submit" class="btn-lg next-btn-primary">ĐĂNG NHẬP</button>
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
</div>
@endsection

@section('js')
@endsection