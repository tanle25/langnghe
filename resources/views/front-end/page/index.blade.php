@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Trang chủ
@endsection

@section('content')
<div class="contentMain">
    {{-- BANNER 1 --}}
    <div class="container">
        <div class="full-home-banners row">
            <div class="full-home-banners__main-banner col-md-8 col-sm-12 col-xs-12">
                <div class="owl-carousel">
                    @foreach ($banners->where('vitri',1)->all() as $tmp)
                    <div class="item" >
                        <img class="img-responsive" src="{{ $tmp->image }}" alt="{{$tmp->title}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 hidden-sm hidden-xs banner-right">
                <div class="banner-right">
                    @foreach ($banners->where('vitri',5)->all() as $tmp)
                    <div class="img-right-item">
                        <a target="_blank" href="{{$tmp->link}}"><img src="{{$tmp->image}}" alt="{{$tmp->title}}" /></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- SẢN PHẨM NỔI BẬT --}}
    <div class="container">
        <div class="box-product2">
            <div class="box-header">
                THỦ CÔNG MỸ NGHỆ - ĐÁ ỐP LÁT
            </div>
            <div class="clearfix"></div>
            <div class="wrap-product">
                <div class="row is-flex">
                    @foreach($langnghe as $product)
                    @include('front-end.products.item-home',['product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-product2">
            <div class="box-header">
                SẢN PHẨM LÀNG NGHỀ OCOP
            </div>
            <div class="clearfix"></div>
            <div class="wrap-product">
                <div class="row is-flex">
                    @foreach($spocop as $product)
                    @include('front-end.products.item-home',['product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-product2">
            <div class="box-header">
                NÔNG SẢN - HẢI SẢN - GIA VỊ
            </div>
            <div class="clearfix"></div>
            <div class="wrap-product">
                <div class="row is-flex">
                    @foreach($nongsan as $product)
                    @include('front-end.products.item-home',['product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-product2">
            <div class="box-header">
                ĐỒ ĂN NHANH - ĐỒ UỐNG - THẢO DƯỢC
            </div>
            <div class="clearfix"></div>
            <div class="wrap-product">
                <div class="row is-flex">
                    @foreach($thucpham as $product)
                    @include('front-end.products.item-home',['product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-product2">
            <div class="box-header">
                SẢN PHẨM KHÁC
            </div>
            <div class="clearfix"></div>
            <div class="wrap-product">
                <div class="row is-flex">
                    @foreach($spkhac as $product)
                    @include('front-end.products.item-home',['product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- BANNER 2 --}}
    <div class="container">
        @if($banners->where('vitri',2)->first() != null)
        <div class="banner-img">
            <img class="img-responsive" src="{{$banners->where('vitri',2)->first()->image}}" alt="{{$banners->where('vitri',2)->first()->title}}">
        </div>
        @endif
    </div>

    {{-- SẢN PHẨM DU LỊCH --}}
    <div class="container">
        <div class="box-product2">
            <div class="box-header">
                DU LỊCH VÀ KHÁCH SẠN
            </div>
            <div class="clearfix"></div>
            <div class="wrap-product">
                <div class="row is-flex">
                    @foreach($services as $product)
                    @include('front-end.products.item-home',['product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('front-end.shop.list-home')
    {{-- BANNER 2 --}}
    <div class="container">
        @if($banners->where('vitri',3)->first() != null)
        <div class="banner-img">
            <img class="img-responsive" src="{{$banners->where('vitri',3)->first()->image}}" alt="{{$banners->where('vitri',3)->first()->title}}">
        </div>
        @endif
    </div>

    {{-- TIN TỨC --}}
    @include('front-end.post.list-home')
    @include('front-end.support.list-home')
</div>
@endsection

@section('js')
@endsection