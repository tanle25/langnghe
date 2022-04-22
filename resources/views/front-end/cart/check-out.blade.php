@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Thanh toán - Kết nối cung cầu nông sản Hoằng Hóa
@endsection

@section('content')
<content>
	<div class="wrap-page">
		<div class="register-bg">
			<div class="block-title-h1">
				<div class="container"><h1>Thanh toán</h1></div>
			</div>
			@php
                if(auth()->check()){
                    $qty = $carts->sum('amount');
                    $sum = 0;
                    foreach($carts as $cart){
                        if($cart->product != null){
                            $sum = $sum + ($cart->product->price * $cart->amount);
                        }
                    }
                }else{
                    $qty = \Cart::getTotalQuantity();
                    $sum = \Cart::getTotal();
                }
            @endphp
			<div class="container">
				<div class="row">
					<div class="page-checkout col-md-10 col-md-offset-1">
						<div class="checkout-address-selection__container">
							<div class="checkout-address-selection__section-header-text">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								Địa chỉ nhận hàng
								<a class="checkout-address-selection__change-btn" data-toggle="modal" data-target="#modal-info-order">Thay đổi</a>
							</div>
							<div class="checkout-address-selection__selected-address-summary">
								<div class="checkout-address-row__user-detail name_info">{{$user->name}} - {{$user->email}}</div>
								<div class="checkout-address-row__address-summary address-full">{{$user->addres}}</div>
							</div>

						</div>
						@if(count($errors) > 0)
						<div class="alert alert-danger">
						    @foreach($errors->all() as $err)
						    <strong>{{$err}}</strong><br>
						    @endforeach
						</div>
						@endif
						@if(session('error-user-check-out'))
						<div class="alert alert-danger">
						    <strong>{{session('error-user-check-out')}}</strong>
						</div>
						@endif
						@if(session('success-user-check-out'))
						<div class="alert alert-success">
						    <strong>{{session('success-user-check-out')}}</strong>
						</div>
						@endif
						<div class="checkout-product-ordered-list cart-page__content">
							<div class="checkout-product-ordered-list__headers">
								<div class="checkout-product-ordered-list__header">
									<div class="checkout-product-ordered-list__title">Sản phẩm</div>
								</div>
								<div class="checkout-product-ordered-list__header">Đơn giá</div>
								<div class="checkout-product-ordered-list__header">Số lượng</div>
								<div class="checkout-product-ordered-list__header">Đơn vị tính</div>
								<div class="checkout-product-ordered-list__header">Thành tiền</div>
							</div>
							  @include('front-end.cart.item-checkout')
						</div>
						<div class="cart-page-footer">
							<div class="ct-card luuy">
								<div class="cart-page-footer__gap" style="width: 100%"><i>Lưu ý</i></div>
								<ul>
									<li> - Để tránh các sai sót, rủi ro, quý khách cần kiểm tra kỹ các thông tin trước khi thanh toán </li>
								</ul>
							</div>
							<div class="clear"></div>
							<div class="ct-card">
								<div class="cart-page-footer__summary col-md-10">
									<div class="cart-page-footer__first-summary">
										<div class="cart-page-footer-summary__subtotal-text">Tổng tiền ({{$qty}} sản phẩm):</div>
										<div class="cart-page-footer-summary__subtotal-amount">{{number_format($sum, 0 ,'.' ,'.')}}&nbsp;₫</div>
									</div>
								</div>
								@if($qty > 0)
								<div class="cart-page-footer__checkout col-md-2">
									<form  class="form-horizontal" role="form" action="{{route('checkOut.post')}}" 
				                        enctype="multipart/form-data" method="POST">
				                        @csrf
				                        <input type="hidden" value="2" name="type_pay">
				                        <button type="submit" class="button-solid">Đặt hàng</button>
				                    </form>
								</div>
								@endif
							</div>    
						</div>
					</div>  
				</div>  
			</div>
		</div>  
	</div>  
</content>
@endsection

@section('js')
@endsection