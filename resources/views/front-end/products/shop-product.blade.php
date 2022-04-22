<div class="">
	<div class='sp-ban-chay'>
		<div class="title-bc"><a>Sản phẩm khác của cơ sở</a></div>
		<div class="list-sp-lien-quan row">
			@foreach($products as $product)
			<div class="col-md-1-5 col-sm-4 col-xs-6 thumb-product-list-item">
				<div class="thumb-product item">
					@if($product->main_image != null)
					<div class="img">
						<a href="{{route('product.detail',['slug'=>$product->slug])}}" title="{{$product->name}}">
							<img src="{{get_image_product($product->product_code.'/'.$product->main_image)}}" alt="{{$product->name}}">
						</a>
					</div>
					@endif
					<div class="wrap-info">
						<div style="">
							<h3><a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h3>
						</div>
						@if($product->price > 0)
						@if(!isset($product->sale_off) || $product->sale_off <= 0 || $product->sale_off == $product->price)
						<span class="discount">{{number_format($product->price, 0 ,'.' ,'.')}} ₫</span>
						@else
						<span class="discount">{{number_format($product->sale_off, 0 ,'.' ,'.')}} ₫</span>
						<span class="true-price">{{number_format($product->price, 0 ,'.' ,'.')}} ₫</span>
						@endif
						@else
						<p class="discount">Giá: Liên hệ</p>
						@endif
					</div>
					<div class="container-star">
						<input type="range" value="{{$product->getTotalRate()}}" step="1" id="rate_product_values_{{$product->id}}" data-rateit-readonly="true" style="display: none">
						<div class="rateit" data-rateit-backingfld="#rate_product_values_{{$product->id}}" data-rateit-resetable="false"  data-rateit-ispreset="true"
							data-rateit-min="0" data-rateit-max="5" data-rateit-readonly="true">
						</div>
						@if($product->price > 0)
						<span class="shopping-cart-index">
							<a href="javascript:void(0)" data-id="{{$product->id}}" class="add-cart"> 
								<i class="fa fa-cart-plus "></i>
							</a>
						</span>
						@else
						<button type="button" class="send-request" data-id="{{$product->id}}">Gửi yêu cầu</button>
						@endif
					</div>
					@if($product->shop != null)
			        <div class="shop-info-index">
			            <div class="shop-info-index-avatar">
			                <img class="image-avatar-index" src="
			                {{$product->shop->getThumb($product->shop->image)}}">
			            </div>
			            <span class="shop-info-index-text">
			                <a href="{{route('shop.chitiet',['username'=>$product->shop->username])}}" title="{{$product->shop->tencs}}" >{{$product->shop->tencs}}</a>
			            </span>
			        </div>
			        @endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="sp-lien-quan">
		<div class="title-bc"><a>Sản phẩm liên quan</a></div>
		<div class="list-sp-lien-quan row">
			@foreach($products_2 as $product)
			<div class="col-md-1-5 col-sm-4 col-xs-6 thumb-product-list-item">
				<div class="thumb-product item">
					@if($product->main_image != null)
					<div class="img">
						<a href="{{route('product.detail',['slug'=>$product->slug])}}" title="{{$product->name}}">
							<img src="{{get_image_product($product->product_code.'/'.$product->main_image)}}" alt="{{$product->name}}">
						</a>
					</div>
					@endif
					<div class="wrap-info">
						<div style="">
							<h3><a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h3>
						</div>
						@if($product->price > 0)
						<p class="discount">{{number_format($product->price, 0 ,'.' ,'.')}} ₫</p>
						@else
						<p class="discount">Giá: Liên hệ</p>
						@endif
					</div>
					<div class="container-star">
						<input type="range" value="{{$product->getTotalRate()}}" step="1" id="rate_product_values_{{$product->id}}" data-rateit-readonly="true" style="display: none">
						<div class="rateit" data-rateit-backingfld="#rate_product_values_{{$product->id}}" data-rateit-resetable="false"  data-rateit-ispreset="true"
							data-rateit-min="0" data-rateit-max="5" data-rateit-readonly="true">
						</div>
						@if($product->price > 0)
						<span class="shopping-cart-index">
							<a href="javascript:void(0)" data-id="{{$product->id}}" class="add-cart"> 
								<i class="fa fa-cart-plus "></i>
							</a>
						</span>
						@else
						<button type="button" class="send-request" data-id="{{$product->id}}">Gửi yêu cầu</button>
						@endif
					</div>
					@if($product->shop != null)
			        <div class="shop-info-index">
			            <div class="shop-info-index-avatar">
			                <img class="image-avatar-index" src="
			                {{$product->shop->getThumb($product->shop->image)}}">
			            </div>

			            <span class="shop-info-index-text">
			                <a href="{{route('shop.chitiet',['username'=>$product->shop->username])}}" title="{{$product->shop->tencs}}" >{{$product->shop->tencs}}</a>
			            </span>
			        </div>
			        @endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>