@extends('front-end.layouts.main')

@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('front-end/css/magiczoomplus.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front-end/css/chitietsp.css')}}">
@endsection

@section('title')
{{$product->name}}
@endsection

@section('content')
<div class="wrap-page">
	<div class="wrap-breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
				@if($product->type_product != null)
				<li><a href="#" title="Sản phẩm">{{$product->type_product->name}}</a></li>
				@endif
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="zoom-section ">
			<h1 class="title block-mobile">{{$product->name}}</h1>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 images-product-detail">
					<div class="zoom-img-product">
						<div class="col-md-3 col-sm-3 col-xs-3 image-left"> 
							<div class="images-thumbs-post gallery-thumbs">
							    <div class="swiper-wrapper"> 
							      @foreach($product->array_image as $key=>$value)
							        <div class="swiper-slide">
							        	<img width="80" height="80" class="zoom-tiny-image" src="{{get_image_product($product->product_code.'/'.$value)}}">
							        </div>
									@endforeach
							    </div>
							  </div>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-9 image-right">
							<div class="zoom-small-image">
									<div class="gallery-container gallery-top">
										<div class="swiper-wrapper">
											@foreach($product->array_image as $key=>$value)
										        <div class="swiper-slide">
										        	<a href="{{get_image_product($product->product_code.'/'.$value)}}" data-fancybox="images-sp">
										        		<img class="zoom-tiny-image" src="{{get_image_product($product->product_code.'/'.$value)}}">
										        	</a>
										        </div>
											@endforeach
										</div>
										<!-- Add Arrows -->
										<div class="button-nexts"></div>
										<div class="button-prevs"></div>
									</div>
							</div>
						</div>

					</div>
					<div class="clearfix"></div>
					<!-- <div class="pro-share">
						<div class="row">
							<div class="col-md-5 item-col-product">
								<div class="share-social">
									<span>Chia sẻ tới:</span>
									<a class="social-button"
									href="https://www.facebook.com/sharer/sharer.php?u=https://www.nongsanantoanthanhhoa.vn/san-pham/bach-tuoc-nhat"
									data-size="large"><i class="fa fa-facebook-official"></i></a>
									<a class="twitter-share-button social-button"
									href="https://twitter.com/intent/tweet?url=https://www.nongsanantoanthanhhoa.vn/san-pham/bach-tuoc-nhat"
									data-size="large"><i class="fa fa-twitter"></i> </a>
									<div class="zalo-share-button social-button" data-href="https://www.nongsanantoanthanhhoa.vn/san-pham/bach-tuoc-nhat" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false>
									</div>
								</div>
							</div>
							<div class="col-md-3 item-col-product">
								<span class="like-product">
									<svg width="24" height="20" class="svg-like">
										<path d="M19.469 1.262c-5.284-1.53-7.47 4.142-7.47 4.142S9.815-.269 4.532 1.262C-1.937 3.138.44 13.832 12 19.333c11.559-5.501 13.938-16.195 7.469-18.07z" stroke="#FF424F" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round"></path>
									</svg>
								</span>
								<span>Đã thích</span><span class="totalLike">(4) </span>
							</div>
							<div class="col-md-4 item-col-product">
								<button class="button-report-product" data-toggle="modal" data-target="#modal-vipham"><i class="fa fa-flag-checkered"></i> Phản ánh vi phạm</button>
							</div>
						</div>
					</div> -->
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 infomation-product-detail">
					<div class="zoom-desc">
						<div class="scroll-detail">
							<h1 class="title none-mobile">{{$product->name}}
								<i class="fa fa-check-circle fa-check-circle-sp" data-toggle="tooltip" data-placement="bottom" data-original-title="Đã có tem truy xuất nguồn gốc sản phẩm"></i>
							</h1>
							<div class="pdp-review-summary">
								<div class="container-star">
									<input type="range" value="{{$product->getTotalRate()}}" step="1" id="rate_product_values" data-rateit-readonly="true" style="display: none">
									<div class="rateit" data-rateit-backingfld="#rate_product_values" data-rateit-resetable="false"  data-rateit-ispreset="true"
										data-rateit-min="0" data-rateit-max="5" data-rateit-readonly="true">
									</div>
								</div>
								<a class="pdp-link">{{count($product->rates)}} đánh giá</a>
								<div class="pdp-review-summary__divider"></div>
								<a class="pdp-link">{{$product->ask()->count()}} câu hỏi</a>
								<div class="pdp-review-summary__divider"></div>
								<span class="pdp-link">{{$product->views}} lượt xem</span>
							</div>
							<div class="flex v-center">
								@if($product->sale_off)
								<span class="price-old"> {{number_format($product->price, 0 ,'.' ,'.')}} ₫</span>
								<span class="price-detail">
									{{number_format($product->sale_off, 0 ,'.' ,'.')}} ₫
								</span>
								@else
									@if($product->price > 0)
									{{number_format($product->price, 0 ,'.' ,'.')}} ₫
									@else
									Liên hệ
									@endif
								@endif
							</div>
							<div class="group-size-sx">
								<div class="row-sx nsx">
									<label class="label-sx">Nhà cung cấp:</label>
									{{$product->shop != null ? $product->shop->tencs : ''}}
								</div>
								<div class="row-sx vsx">
									<label class="label-sx">Địa chỉ:</label>
									{{$product->shop != null ? $product->shop->xom : ''}}
								</div>
								@if($product->type == 1 )
								<div class="row-sx pp">
									<label class="label-sx" >Trạng thái:</label>
									<span style="">@if($product->amount > 0)
										Còn hàng
										@else
										Hết hàng
									@endif</span>
								</div>
								<div class="row-sx pp">
									<label class="label-sx" >Đơn vị tính:</label>
									<span style="">{{$product->unit}}</span>
								</div>
								@endif
							</div>
							<br/>
							@if($product->type == 1 )
							<div class="group-size size">
								<div class="">
									<label class="label-sx">Số lượng:</label>
									<span>
										<input type="number" name="quantity" value="1" size="2" id="qty" class="input-text qty" maxlength="12">
										<button class="reduced items-count tru" type="button">
											<i class="icon-minus"> - </i>
										</button>
										<button class="increase items-count cong" type="button">
											<span> + </span>
										</button>
									</span>
								</div>
							</div>
							<div class="row button-array">
								<div class="col-md-4 col-sm-5 padding-right-5 add">
									<button type="button" class="btn-add-cart buy-now btn" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i>Cho vào giỏ</button>
								</div>

								<div class="col-md-4 col-sm-4 padding-right-5 action">
									<button type="button"  class="btn-add-order buy-now btn send-request" data-id="{{$product->id}}">Đặt Hàng</button>
								</div>
							</div>
							@else
							<div class="row button-array">
								<div class="col-md-4 col-sm-4 padding-right-5 action">
									<button type="button"  class="btn-add-order buy-now btn send-request" data-id="{{$product->id}}">Gửi liên hệ</button>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		@if($product->shop != null)
		@include('front-end.products.shop',['shop'=>$product->shop])
		@endif
	</div>
	@endsection

	@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			var quantity = $('#qty').val();
			var url_add_cart = $('#base_url').val() + 'add-cart/ajax';
			$('.tru').click(function(){
				quantity = Math.round($('#qty').val());
				if(quantity > 0) $('#qty').val(quantity - 1);
			});
			$('.cong').click(function(){
				quantity = Math.round($('#qty').val());
				$('#qty').val(quantity + 1);
			});
			$('#qty').change(function(){
				quantity = Math.round($('#qty').val());
				if(quantity < 0) quantity = 0;
				$('#qty').val(quantity);
			});
			$('.btn-add-cart').click(function(){
				id = $(this).data('id');
				quantity = Math.round($('#qty').val());
				$.get(url_add_cart, { product_id: id, num: quantity}, function (data) {
					$('.cart-count').empty().html(data['count']);
				});
			});
			$('#modal-rate').on('hidden.bs.modal', function (e) {
				$('#txtNoteRating').val('');
			})
		});
		function rateProduct(){
			rate_val = $('#rate_product').val();
			product_id = {{$product->id}};
			content_rate = $('#txtNoteRating').val();
			if(rate_val && content_rate !=''){
				$.ajax({
					url: $('#base_url').val() + 'product/danh-gia',
					method: "POST",
					data: {
						product_id: product_id,
						rate_val: rate_val,
						content_rate: content_rate,
						"_token": "{{ csrf_token() }}",
					},
					success: function(json){
						if(json.status){
							$('#modal-rate').modal('hide');
							html = $('.mod-reviews').html();
							html+= json.html;
							$('.mod-reviews').html(html);
						}
						alert(json.msg);
					},
					error: function (request, status, error) {
						if(request.status == 401){
							alert('Bạn chưa đăng nhập');
						}
					}
				})
			}
			if(!rate_val){
				alert('Vui lòng chọn số sao');
			}
			if(content_rate==''){
				alert('Vui lòng nhập nội dung đánh giá');
			}
		}
	</script>
	@endsection