<div class="product-page-seller-info v-center">
	<div class="product-page-seller-info__section-1">
		<div class="product-page-seller-info__header-wrapper">
			<a class="product-page-seller-info__header-portrait">
				<div class="avatar-tp">
					<img class="avatar__img" src="{{$shop->getThumb($shop->image)}}">
				</div>
			</a>
			<div class="product-page-seller-info__header-info">
				<a class="product-page-seller-info__name-status"
					href="{{route('shop.chitiet',['username'=>$shop->username])}}">
					<div class="product-page-seller-info__shop-name">{{$shop->tencs}}</div>
				</a>
				<div class="product-page-seller-info__buttons">
					<a class="product-page-seller-info__view-shop"
						href="{{route('shop.chitiet',['username'=>$shop->username])}}">
						<button class="btn btn-light btn--s btn--inline"><img
								src="{{asset('front-end/images/shop.png')}}" alt="Thăm gian hàng"> <span>Xem
								Shop</span></button></a>
				</div>
			</div>
		</div>
	</div>
	<div class="product-page-seller-info__section-2">
		<div class="product-page-seller-info__item ">
			<div class="product-page-seller-info__item__wrapper">
				<div class="product-page-seller-info__item__header">
					<span class="product-page-seller-info__item__primary-text">{{$shop->products()->count()}}</span>
				</div>
				<div class="product-page-seller-info__item__complement-text">Sản phẩm</div>
			</div>
		</div>
		<div class="product-page-seller-info__item">
			<div class="product-page-seller-info__item__wrapper">
				<div class="product-page-seller-info__item__header">
					<span class="product-page-seller-info__item__primary-text">{{$shop->getTotalRate()}}</span>
				</div>
				<div class="product-page-seller-info__item__complement-text">Đánh giá</div>
			</div>
			<div class="product-page-seller-info__item__separator"></div>
		</div>
		<div class="product-page-seller-info__item">
			<div class="product-page-seller-info__item__wrapper">
				<div class="product-page-seller-info__item__header">
					<span class="product-page-seller-info__item__primary-text">{{$shop->ask()->count()}}</span>
				</div>
				<div class="product-page-seller-info__item__complement-text">Lượt hỏi đáp</div>
			</div>
			<div class="product-page-seller-info__item__separator"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="wrap-detail">
		<div class="col-md-12 col-sm-12 col-xs-12 content-product-detail">
			<ul class="nav nav-tabs">
				<li class="col-100  active ">
					<a href="#tab0" data-toggle="tab">Giới thiệu</a>
				</li>
				<li class="col-100">
					<a href="#tab1" data-toggle="tab" aria-expanded="false">Thông tin chi tiết</a>
				</li>
				<li class="col-100">
					<a href="#tab2" data-toggle="tab" aria-expanded="false">Đánh giá sản phẩm</a>
				</li>
				<!-- <li class="col-100">
                        <a href="#tab3" data-toggle="tab" aria-expanded="false">Hỏi & Đáp</a>
                    </li> -->
				<li class="col-100">
					<a href="#tab4" data-toggle="tab" aria-expanded="false">Địa điểm</a>
				</li>
			</ul>
			<div class="wrap-content-product">
				<div class="tab-content">
					<div class="tab-pane  active " id="tab0">
						<div class="mod-title">
							<h2 class="pdp-mod-section-title outer-title">Giới thiệu {{$product->name}}</h2>
						</div>
						<div class="pdp-mod-detail">
							{!! $product->des !!}
						</div>
					</div>
					<div class="tab-pane" id="tab1">
						<div class="content pdp-mod-review">
							<div class="product-info">
								<div class="row">
									<div class="col-md-6 col-xs-12">
										<h4 class="col-md-12 col-xs-12">Thông tin sản phẩm</h4>
										<div class="row">
											<div class="col-md-5 col-xs-5">Tên sản phẩm</div>
											<div class="col-md-7 col-xs-7">{{$product->name}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Mã sản phẩm</div>
											<div class="col-md-7 col-xs-7">{{$product->product_code}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Đơn vị tính</div>
											<div class="col-md-7 col-xs-7">{{$product->unit}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Trạng thái</div>
											<div class="col-md-7 col-xs-7">
												{{$product->amount > 0 ? 'Còn hàng' : 'Hết hàng'}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Mã vạch</div>
											<div class="col-md-7 col-xs-7">{{$product->ma_vach}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Mã truy xuất nguồn gốc</div>
											<div class="col-md-7 col-xs-7">{{$product->ma_truy_xuat}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Sản lượng</div>
											<div class="col-md-7 col-xs-7">{{$product->san_luong}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Quy cách đóng gói</div>
											<div class="col-md-7 col-xs-7">{{$product->dong_goi}}</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Cách bảo quản</div>
											<div class="col-md-7 col-xs-7">{{$product->bao_quan}}</div>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<h4 class="col-md-12 col-xs-12">Thông tin Cơ sở kinh doanh</h4>
										<div class="row">
											<div class="col-md-5 col-xs-5">Tên cơ sở</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->tencs}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Địa chỉ</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->xom}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Điện thoại</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->phone}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Email</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->email}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Website</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->ưebsite}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Người đại diện</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->nguoidaidien}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Quy mô</div>
											<div class="col-md-7 col-xs-7">
												{{isset($quymos[$shop->quymo]) ? $quymos[$shop->quymo] : ''}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Trạng thái</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->status == 1 ? 'Đang hoạt động' : 'Tạm ngưng hoạt động'}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Địa điểm kinh doanh</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->tencs}}
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 col-xs-5">Số giấy phép đăng ký</div>
											<div class="col-md-7 col-xs-7">
												{{$shop->sogiay}}
											</div>
										</div>
										<h4 class="col-md-12 col-xs-12">Chứng nhận, xác nhận của cơ sở</h4>
										@foreach($shop->shop_docs as $doc)
										<div class="row">
											<div class="col-md-5 col-xs-5"><b>{{$doc->name}}</b><br>{{$doc->des_s}}

											</div>
											<div class="col-md-7 col-xs-7 ">
												<a href="{{get_image_shop_doc($doc->image)}}" class="fancybox">
													<img src="{{get_image_shop_doc($doc->image)}}">
												</a>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab2">
						<div class="content pdp-mod-review">
							<div class=" product-rating-overview">
								<div class="mod-title">
									<h2 class="pdp-mod-section-title outer-title">Đánh giá và nhận xét của: {{$product->name}}</h2>
								</div>
								<div class="mod-rating">
									<div class="summary">
										<div class="score"><span>{{$product->getTotalRate()}}</span> trên 5</div>
										<div class="average">
											<div class="container-star ">
												<input type="range" value="{{$product->getTotalRate()}}" step="1" id="rate_product_value" data-rateit-readonly="true">
												<div class="rateit" data-rateit-backingfld="#rate_product_value" data-rateit-resetable="false"  data-rateit-ispreset="true"
													data-rateit-min="0" data-rateit-max="5" data-rateit-readonly="true">
												</div>
											</div>
										</div>
										<div class="count">{{count($product->rates)}} đánh giá</div>
									</div>
									<div class="detail">
										<ul>
											@for($i=5; $i>=1; $i--)
											<li>
												<span>
													<span class="star-number">{{$i}}</span> SAO
												</span>
												<span class="progress-wrap">
													<div class="pdp-review-progress">
														<div class="bar bg"></div>
														<div class="bar fg"></div>
													</div>
												</span>
												<span class="percent">{{$product->getTotalRateByValue($i)}}</span>
											</li>
											@endfor
										</ul>
									</div>
									<div class="">
										<button type="button" class="btn btn-info btn-lg " data-toggle="modal"
											data-target="#modal-rate">ĐÁNH GIÁ SẢN PHẨM NÀY</button>
									</div>
								</div>
							</div>
							<div class="mod-reviews">
								@foreach($product->rates as $key => $value)
								<div class="item">
									<div class="top">
										<div class="container-star starCtn pull-left">
											<input type="range" value="{{$value->star}}" step="1" id="rate_product_{{$value->id}}" data-rateit-readonly="true">
											<div class="rateit" data-rateit-backingfld="#rate_product_{{$value->id}}" data-rateit-resetable="false"  data-rateit-ispreset="true"
												data-rateit-min="0" data-rateit-max="5" data-rateit-readonly="true">
											</div>
										</div>
										<span class="title left"></span>
										<span class="right">{{$value->created_at->format('d/m/Y')}}</span>
									</div>
									<div class="middle">
										<span>bởi {{$value->user->name}}
											<!-- <a href='{{url("")}}/user-activity/{{$value->user->email}}'>{{$value->user->name}}</a> -->
										</span>
									</div>
									<div class="content">{{$value->content}}</div>
									<div class="bottom"></div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab4">
						<div class="content pdp-mod-review">
							<div id="map">
								<div class="gm-style">
									{!! $shop->map !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-rate" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i> Đánh giá sản phẩm này </h4>
            </div>
            <div class="modal-body">
                <div class="box-body table-responsive">
                    <div class="box-body">
                        <div class="fs-dtrtcmtbox">
                            <p class="fs-dtrtcmti2">Bạn chấm sản phẩm này bao nhiêu sao?</p>
                            <div class="fs-dtrtbhov" id="rate-product">
                                <!-- <div class="fs-dtrtbig box-star ">
                                    <span class="fs-star">
                                        <div class="rating-symbol">
                                            <div data-id="1" class="rating-symbol-background fa fa-star-o fa-2x rating-star"></div>
                                        </div>
                                        <div class="rating-symbol">
                                            <div data-id="2" class="rating-symbol-background fa fa-star-o fa-2x rating-star"></div>
                                        </div>
                                        <div class="rating-symbol">
                                            <div data-id="3" class="rating-symbol-background fa fa-star-o fa-2x rating-star"></div>
                                        </div>
                                        <div class="rating-symbol">
                                            <div data-id="4" class="rating-symbol-background fa fa-star-o fa-2x rating-star"></div>
                                        </div>
                                        <div class="rating-symbol">
                                            <div data-id="5" class="rating-symbol-background fa fa-star-o fa-2x rating-star"></div>
                                        </div>
                                    </span>
                                    <input type="hidden" data-readonly="" value="5" class="rating rating-tooltip-manual" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x">
								</div> -->
								<input type="range" value="0" step="1" id="rate_product">
								<div class="rateit" data-rateit-backingfld="#rate_product" data-rateit-resetable="false"  data-rateit-ispreset="true"
									data-rateit-min="0" data-rateit-max="5">
								</div>
                            </div>
                            <textarea id="txtNoteRating" name="txtNoteRating" rows="3" maxlength="511" class="f-cmttarea fsformsc" placeholder="Vui lòng nhập nhận xét của bạn!"></textarea>
                            <div class="fs-dtrtbots clearfix">
                                <p>Một đánh giá có ích thường dài từ 100 ký tự trở lên</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Hủy</button>
                <button id="btn-delete" type="button" class="btn btn-primary" id="save-rate" onclick="rateProduct()"><i class="fa fa-check"></i>Gửi</button>
            </div>
        </div>
    </div>
</div>
@include('front-end.products.shop-product')
</div>