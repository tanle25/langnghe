
@if(isset($carts))
<a class="btn-post-cart" href="#">
	<i class="fa fa-cart-plus" aria-hidden="true"></i>
	<span class="cart-count">{{\Cart::count()}}</span>
</a>
<div class="cart-web-hover" >
	<div class="cart-sp">
		<div>
			<div class="v-center"><b>Giỏ hàng</b></div>
			<div class="product-items-cart">
				@foreach(Cart::content() as $tmp)
				<div class="cart-web-hover-item">
					<div class="cart-web-item-left"
						style="background-image: url({{get_image_product($tmp->options['code'].'/'.$tmp->options['image'])}});">
					</div>
					<div class="cart-web-item-right">
						<div class="v-center">
							<div class="cart-sp-name">{{$tmp->name}}</div>
							<div class="_2BMmIF"></div>
							<div class="cart-sp-name v-center">{{$tmp->qty}} sp</div>
							<div class="_2BMmIF"></div>
							<div class="cart-sp-price v-center">
								<div>
									<?php
										$price = $tmp->price;
										$amount = $tmp->qty;
										$total = $price*$amount;
										echo number_format($total, 0 ,'.' ,'.').' ₫';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="cart-web-item-footer">
				<button class="btn btn-warning btn-close close-small-cart" id="close-small-cart">Ẩn giỏ hàng</button>
				<div class="navbar__spacer"></div>
				@if(isset($amount))
				<button   class="btn btn-solid-primary btn--s btn--inline" onclick="window.location.href='{{route('getCart')}}'">Xem Giỏ hàng</button>
				@endif
			</div>
		</div>
	</div>
</div>
@else
<a class="btn-post-cart" href="#">
	<i class="fa fa-cart-plus" aria-hidden="true"></i>
	<span class="cart-count">{{$count}}</span>
</a>
@endif
