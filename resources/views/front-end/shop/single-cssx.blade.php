@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
{{$post->tencs}}
@endsection

@section('content')
<div class="contentMain">
    {{-- BANNER 1 --}}
    <div class="full-home-banners__main-banner">
        <img style="max-height: 200px" class="img-responsive" src="{{asset('front-end/images/banner-cs.jpg')}}" alt="{{$post->title}}">
    </div>
    <content>
        <div class="wrap-page">
            <div class="hrm-wrap-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="">{{$post->tencs}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="single-co-so-sx">
                <div class="container">
                    <div class="content-center">
                        <div class="row">
                            @include('front-end.partials.menu-cat')
                            <div class="col-md-4-5 cssxkd-wrap">
                                <div class="shop-page-wrapper">
                                    <div class="shop-page__info">
                                        <h1>{{$post->tencs}} <i class="fa fa-check-circle" title="Đã kiểm duyệt"></i></h1>
                                        <div class="row section-seller-overview-horizontal">
                                            <div class="col-md-5">
                                                <div class="section-seller-overview-horizontal__leading">
                                                    <div class="section-seller-overview-horizontal__leading-background" style="background-image: url({{$post->getImage($post->image)}});">
                                                    </div>
                                                    <div class="section-seller-overview-horizontal__leading-background-mask"></div>
                                                    <div class="section-seller-overview-horizontal__leading-content">
                                                        <div class="section-seller-overview-horizontal__seller-portrait">
                                                            <a class="section-seller-overview-horizontal__seller-portrait-link" href="#">
                                                                <div class="avatar-tp">
                                                                    <div class="avatar__placeholder"></div>
                                                                    <img class="avatar__img" src="{{$post->getThumb($post->image)}}">
                                                                </div>
                                                            </a>
                                                            <div class="section-seller-overview-horizontal__portrait-info">
                                                                <div class="section-seller-overview-horizontal__portrait-status">
                                                                    <div class="section-seller-overview-horizontal__active-time">Đang hoạt động</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="section-seller-overview-horizontal__buttons">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--  <div class="cssx-product">
                                                    <div class="like-cssx">
                                                        <span class="">
                                                            <svg width="24" height="20" class="svg-like">
                                                                <path d="M19.469 1.262c-5.284-1.53-7.47 4.142-7.47 4.142S9.815-.269 4.532 1.262C-1.937 3.138.44 13.832 12 19.333c11.559-5.501 13.938-16.195 7.469-18.07z" stroke="#FF424F" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round" style="fill: none;"></path>
                                                            </svg>
                                                        </span>
                                                        <span>Đã thích </span><span class="totalLike"> (15) </span>
                                                    </div>

                                                    <span></span>
                                                    
                                                </div> --}}
                                            </div>{{--  <!-- end col -->
                                            <div class="col-md-7">
                                                <div class="section-seller-overview-horizontal__seller-info-list pdp-mod-review">
                                                    <div class="section-seller-overview__item mod-rating mod-rating-cssx">
                                                        <div class="summary">
                                                            <div class="score">
                                                                <span>5</span> trên 5
                                                            </div>
                                                            <div class="average">
                                                                <div class="container-star" style="width:166.25px;height:30px">
                                                                    <span style="cursor: default;">
                                                                        <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                                            <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: hidden;"></div>
                                                                            <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; width: auto;">
                                                                                <span class="fa fa-star fa-2x"></span>
                                                                            </div>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="count">
                                                                <span>
                                                                    12 đánh giá
                                                                </span>
                                                                <span>|</span>
                                                                <span>
                                                                    356 lượt xem
                                                                </span>
                                                            </div>
                                                            <div class="count">
                                                                <img class="img-certifications-shops" src="https://www.nongsanantoanthanhhoa.vn/image/50/50/xpVOPBXCenJjEIJbmsIZzykWTCpxGUsPFHXx5aax.png" data-toggle="tooltip" data-placement="bottom" data-original-title="<b>Hệ thống quản lý an toàn thực phẩm ISO 22000 </b><hr style='margin:5px;'> Hệ thống quản l&amp;yacute; an to&amp;agrave;n thực phẩm ISO 22000">
                                                                <img class="img-certifications-shops" src="https://www.nongsanantoanthanhhoa.vn/image/50/50/yfxnZX9UxI7wEEts9vIZSksNlP7y2RLKQ17iLQIF.jpeg" data-toggle="tooltip" data-placement="bottom" data-original-title="<b>Giấy chứng nhận cơ sở đủ điều kiện ATTP </b><hr style='margin:5px;'> Giấy chứng nhận cơ sở đủ điều kiện ATTP do cơ quan quản l&amp;yacute; nh&amp;agrave; nước cấp">
                                                                <img class="img-certifications-shops" src="https://www.nongsanantoanthanhhoa.vn/image/50/50/Z04LuVoFXYFPLuDqdNDuw3zId7EAsYg2JinKgefK.png" data-toggle="tooltip" data-placement="bottom" data-original-title="<b>Khác </b><hr style='margin:5px;'> C&amp;aacute;c loại chứng nhận, x&amp;aacute;c nhận kh&amp;aacute;c">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="section-seller-overview__item mod-rating mod-rating-cssx">
                                                        <div class="detail">
                                                            <ul>
                                                                <li>
                                                                    <span>
                                                                        <span class="star-number">5</span> SAO
                                                                    </span>
                                                                    <span class="progress-wrap">
                                                                        <div class="pdp-review-progress">
                                                                            <div class="bar bg"></div>
                                                                            <div class="bar fg" style="width:100%"></div>
                                                                        </div>
                                                                    </span>
                                                                    <span class="percent">12</span>
                                                                </li>
                                                                <li>
                                                                    <span>
                                                                        <span class="star-number">4</span> SAO
                                                                    </span>
                                                                    <span class="progress-wrap">
                                                                        <div class="pdp-review-progress">
                                                                            <div class="bar bg"></div>
                                                                            <div class="bar fg" style="width:0%"></div>
                                                                        </div>
                                                                    </span>
                                                                    <span class="percent">0</span>
                                                                </li>
                                                                <li>
                                                                    <span>
                                                                        <span class="star-number">3</span> SAO
                                                                    </span>
                                                                    <span class="progress-wrap">
                                                                        <div class="pdp-review-progress">
                                                                            <div class="bar bg"></div>
                                                                            <div class="bar fg" style="width:0%"></div>
                                                                        </div>
                                                                    </span>
                                                                    <span class="percent">0</span>
                                                                </li>
                                                                <li>
                                                                    <span>
                                                                        <span class="star-number">2</span> SAO
                                                                    </span>
                                                                    <span class="progress-wrap">
                                                                        <div class="pdp-review-progress">
                                                                            <div class="bar bg"></div>
                                                                            <div class="bar fg" style="width:0%"></div>
                                                                        </div>
                                                                    </span>
                                                                    <span class="percent">0</span>
                                                                </li>
                                                                <li>
                                                                    <span>
                                                                        <span class="star-number">1</span> SAO
                                                                    </span>
                                                                    <span class="progress-wrap">
                                                                        <div class="pdp-review-progress">
                                                                            <div class="bar bg"></div>
                                                                            <div class="bar fg" style="width:0%"></div>
                                                                        </div>
                                                                    </span>
                                                                    <span class="percent">0</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col --> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-page-menu">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li class="col-100 active">
                                         <a href="#tab0" data-toggle="tab">Giới thiệu</a>
                                     </li>
                                     <li class="col-100">
                                         <a href="#tab1" data-toggle="tab" aria-expanded="false">Thông tin chi tiết</a>
                                     </li>
                                     <li class="col-100 ">
                                         <a href="#tab4" data-toggle="tab" aria-expanded="false">Sản phẩm</a>
                                     </li>{{-- 
                                     <li class="col-100">
                                         <a href="#tab2" data-toggle="tab" aria-expanded="false">Đánh giá</a>
                                     </li>
                                     <li class="col-100">
                                         <a href="#tab3" data-toggle="tab" aria-expanded="false">Hỏi &amp; Đáp</a>
                                     </li> --}}
                                     <li class="col-100">
                                         <a href="#tab5" data-toggle="tab" aria-expanded="false">Địa điểm</a>
                                     </li>
                                 </ul>
                                 <div class="wrap-content-shop-detail">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab0">
                                            <div class="pdp-mod-detail">
                                                <p>
                                                    Giới thiệu về {{$post->tencs}}:
                                                </p>
                                                <p>
                                                    {!! $post->mieuta !!}
                                                </p>
                                            </div>
                                        </div> <!-- end tab -->
                                        <div class="tab-pane" id="tab1">
                                            <div class="content pdp-mod-review">
                                                <div class="organization-info">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <h4 class="col-md-12 col-xs-12">Thông tin Cơ sở kinh doanh</h4>
                                                            <div style="clear:both; border: none"></div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Tên cơ sở</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    {{$post->tencs}}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Địa chỉ</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    {{$post->xom}}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Điện thoại</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    {{$post->dt}}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Email</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    {{$post->email}}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Website</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    {{$post->website}}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Người đại diện</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    {{$post->nguoidaidien}}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Quy mô</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    Doanh nghiệp vừa
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Trạng thái</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                    Đang hoạt động
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-xs-5">Địa điểm kinh doanh</div>
                                                                <div class="col-md-7 col-xs-7">
                                                                   <a target="_blank" style="color:#5aa32a;" href=""> {{$post->tencs}} </a>
                                                               </div>
                                                           </div>
                                                           <div class="row">
                                                            <div class="col-md-5 col-xs-5">Giấy phép đăng ký</div>
                                                            <div class="col-md-7 col-xs-7">
                                                                Số {{$post->sogiay}} - Ngày cấp {{$post->ngaycap}} - Đơn vị cấp: {{$post->coquancp}}.
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-5 col-xs-5">Quản lý về VSATTP bởi</div>
                                                            <div class="col-md-7 col-xs-7">
                                                             {{$post->coquancp}}
                                                         </div>
                                                     </div>

                                                     <h4 class="col-md-12 col-xs-12">Chứng nhận, xác nhận của cơ sở</h4>
                                                     @foreach($post->shop_docs as $doc)
                                                     <div class="row">
                                                       <div class="col-md-5 col-xs-5"><b>{{$doc->name}}</b>
                                                       </div>
                                                       <div class="col-md-7 col-xs-7 cert-image-product">

                                                          <a href="{{$doc->image}}" class="fancybox">
                                                             <img src="{{get_image_shop_doc($doc->image)}}">
                                                         </a>
                                                     </div>
                                                 </div>
                                                 @endforeach
                                                 
                                             </div>
                                             <div class="col-md-6 col-xs-12">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div> <!-- end tab -->
                             <div class="tab-pane" id="tab4">
                                 <div class="content pdp-mod-review">
                                     <div class="organization-product">
                                         <div class="wrap-product product-both">
                                             <div class="posts row is-flex">
                                                @foreach($post->products()->orderby('updated_at','desc')->get() as $product)
                                                <div class="col-sm-4 col-md-4 col-xs-6">
                                                    <div class="thumb-product item">
                                                        <div class="img-item">
                                                            @if($product->main_image != null)
                                                            <div class="img">
                                                                <a href="{{route('product.detail',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                                                    <img src="{{get_image_product($product->product_code.'/'.$product->main_image)}}" alt="{{$product->name}}">
                                                                </a>
                                                            </div>
                                                            @endif
                                                            <div class="cer-item">
                                                            </div>
                                                        </div>
                                                        <div class="wrap-info">
                                                            <h3><a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h3>
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
                                                        <div class="shop-info-index">
                                                            <div class="shop-info-index-avatar">
                                                                <img class="image-avatar-index" src="
                                                                {{$post->getThumb($post->image)}}">
                                                            </div>

                                                            <span class="shop-info-index-text">
                                                                <a href="{{route('shop.chitiet',['username'=>$post->username])}}" title="{{$product->shop->tencs}}" >{{$product->shop->tencs}}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end tab -->
                            <div class="tab-pane" id="tab2">
                             <div class="content pdp-mod-review">
                                 <div class="product-rating-overview">
                                     <div class="mod-title">
                                         <h2 class="pdp-mod-section-title outer-title">
                                             Đánh giá và nhận xét của: {{$post->tencs}}
                                         </h2>
                                     </div>
                                     <div class="mod-rating">
                                      <div class="summary">
                                        <div class="average">
                                            <div class="container-star " style="width:166.25px;height:30px">
                                                <span style="cursor: default;">
                                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                        <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: hidden;">

                                                        </div>
                                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; width: auto;">
                                                            <span class="fa fa-star fa-2x"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                        <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: hidden;"></div>
                                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; width: auto;">
                                                            <span class="fa fa-star fa-2x"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                        <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: hidden;"></div>
                                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; width: auto;">
                                                            <span class="fa fa-star fa-2x"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                        <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: hidden;"></div>
                                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; width: auto;">
                                                            <span class="fa fa-star fa-2x"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                        <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: hidden;"></div>
                                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; width: auto;"><span class="fa fa-star fa-2x"></span>
                                                        </div>
                                                    </div>
                                                </span>
                                                <input type="hidden" data-readonly="" value="5" class="rating rating-tooltip-manual" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x">
                                            </div>
                                        </div>
                                        <div class="count">12 đánh giá</div>
                                    </div>
                                    <div class="detail">
                                        <ul>
                                            <li>
                                                <span>
                                                    <span class="star-number">5</span> SAO
                                                </span>
                                                <span class="progress-wrap">
                                                    <div class="pdp-review-progress">
                                                        <div class="bar bg"></div>
                                                        <div class="bar fg" style="width:100%"></div>
                                                    </div>
                                                </span>
                                                <span class="percent">12</span>
                                            </li>
                                            <li>
                                                <span>
                                                    <span class="star-number">4</span> SAO
                                                </span>
                                                <span class="progress-wrap">
                                                    <div class="pdp-review-progress">
                                                        <div class="bar bg"></div>
                                                        <div class="bar fg" style="width:0%"></div>
                                                    </div>
                                                </span>
                                                <span class="percent">0</span>
                                            </li>
                                            <li>
                                                <span>
                                                    <span class="star-number">3</span> SAO
                                                </span>
                                                <span class="progress-wrap">
                                                    <div class="pdp-review-progress">
                                                        <div class="bar bg"></div>
                                                        <div class="bar fg" style="width:0%"></div>
                                                    </div>
                                                </span>
                                                <span class="percent">0</span>
                                            </li>
                                            <li>
                                                <span>
                                                    <span class="star-number">2</span> SAO
                                                </span>
                                                <span class="progress-wrap">
                                                    <div class="pdp-review-progress">
                                                        <div class="bar bg"></div>
                                                        <div class="bar fg" style="width:0%"></div>
                                                    </div>
                                                </span>
                                                <span class="percent">0</span>
                                            </li>
                                            <li>
                                                <span>
                                                    <span class="star-number">1</span> SAO
                                                </span>
                                                <span class="progress-wrap">
                                                    <div class="pdp-review-progress">
                                                        <div class="bar bg"></div>
                                                        <div class="bar fg" style="width:0%"></div>
                                                    </div>
                                                </span>
                                                <span class="percent">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <button type="button" class="next-btn next-btn-primary next-btn-medium btn-rate" data-toggle="modal" data-target="#myModal">ĐÁNH GIÁ CƠ SỞ NÀY</button>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title"><i class="fa fa-book"></i> Đánh giá cơ sở sản xuất </h4>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="box-body table-responsive">
                                                      <div class="box-body">
                                                          <div class="fs-dtrtcmtbox">
                                                              <p class="fs-dtrtcmti2">Bạn chấm cơ sở này bao nhiêu sao?</p>
                                                              <div class="fs-dtrtbhov">
                                                                  <div class="fs-dtrtbig box-star">
                                                                      <span style="cursor: default;">
                                                                        <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                                            <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: visible;"></div>

                                                                        </div> <!-- end 1 sao -->
                                                                        <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                                            <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: visible;"></div>

                                                                        </div> <!-- end 1 sao -->
                                                                        <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                                            <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: visible;"></div>

                                                                        </div> <!-- end 1 sao -->
                                                                        <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                                            <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: visible;"></div>

                                                                        </div> <!-- end 1 sao -->
                                                                        <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                                            <div class="rating-symbol-background fa fa-star-o fa-2x" style="visibility: visible;"></div>

                                                                        </div> <!-- end 1 sao -->
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <textarea id="txtNoteRating" name="txtNoteRating" rows="3" class="f-cmttarea fsformsc" placeholder="Vui lòng nhập nhận xét của bạn!"></textarea>
                                                            <div class="fs-dtrtbots clearfix"> 
                                                                <p>Một đánh giá có ích thường dài từ 100 ký tự trở lên</p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Hủy</button>
                                                <button id="btn-delete" type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"></i>Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end modal -->
                        </div>
                    </div>

                </div>
            </div> <!-- end tab -->
            <div class="tab-pane" id="tab3">
             <div class="content pdp-mod-review">
                 <div class=" product-rating-overview">
                     <div class="mod-title">
                        <h2 class="pdp-mod-section-title outer-title">Hỏi và Đáp của: {{$post->tencs}}</h2>
                    </div>
                    <div class="fs-dtrtcmtbox">
                     <textarea  name="txtNoteQA" rows="3" class="f-cmttarea fsformsc" placeholder="Vui lòng nhập câu hỏi của bạn!"></textarea>
                     <div class="clearfix"></div>
                     <div class="qa-btn-footer">
                         <button id="btn-delete" type="button" class="btn btn-success" >Gửi câu hỏi</button>
                     </div>
                 </div>
             </div>
         </div>
     </div> <!-- end tab -->
     <div class="tab-pane" id="tab5">
        <div class="content pdp-mod-review">
            {!!$post->map!!}
        </div>
    </div>
</div>
</div>
</div>
</div> <!-- end col -->
</div>
</div>
</div>
</div>
</div>
</div>
</content> <!-- end content -->
@endsection

@section('js')
<script src="{{asset('front-end/js/menu_dmsp.js')}}"></script>
@endsection