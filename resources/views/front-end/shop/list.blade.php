@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Cơ sở SXKD - Hệ sinh thái nông nghiệp- làng nghề ARG GIS nông sản Hoằng Hóa
@endsection

@section('content')
<content>
    <div class="wrap-page">
        <div class="block-title-h1" style="background-image: url({{asset('front-end/images/kt-banner.jpg')}})">
            <div class="container"></div>
        </div>
        <div class="wrap-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                    <li><a href="{{route('shop.list')}}">Cơ sở sản xuất kinh doanh</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="">
                @include('front-end.partials.menu-cat')
                <div class="col-md-4-5 cssxkd-wrap">
                    <div class="toolbar">
                        <div class="sortsoffer">Danh sách Cơ sở sản xuất, kinh doanh</div>
                    </div>
                    <div class="cs-grid">
                        <div class="cs-layout cs-list">
                            @foreach($shops as $shop)
                            <div class="media">
                                <a href="{{route('shop.chitiet',['username'=>$shop->username])}}" class="item-img pull-left">
                                    <img class="" title="" alt="" src="{{$shop->getThumb($shop->image)}}">
                                </a>
                                <div class="item-info">
                                    <div class="item-title"><a href="{{route('shop.chitiet',['username'=>$shop->username])}}">{{$shop->tencs}}</a>
                                        <i class="fa fa-check-circle" title="Đã kiểm duyệt"></i>
                                    </div>
                                    <div class="item-content">  
                                        <p>
                                            <b>Sản phẩm cung cấp:</b>
                                            @foreach($shop->products()->get() as $product)
                                            <a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}; </a>
                                            @endforeach
                                            <p><b>Địa chỉ: </b>{{$shop->xom}}</p>
                                    </div>
                                    <div id="newbie_review" class="review_total">
                                        <span>
                                            @for($i = 1; $i < $shop->avg_rate; $i++)
                                            <div class="rating-symbol" >
                                                <div class="rating-symbol-background fa fa-star-o fa-2x"></div>
                                                <div class="rating-symbol-foreground"><span class="fa fa-star fa-2x"></span>
                                                </div>
                                            </div>
                                            @endfor
                                        </span>
                                        <div class="num_total">( {{$shop->rate()->count()}} người đánh giá )</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            <!-- Pagination -->
                        {{$shops->links()}}
                        <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</content>
@endsection

@section('js')
<script src="{{asset('front-end/js/menu_dmsp.js')}}"></script>
@endsection