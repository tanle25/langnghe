@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
{{$name}} - Hệ sinh thái nông nghiệp- làng nghề ARG GIS nông sản Hoằng Hóa
@endsection

@section('content')
<content>
    <div class="block-allbums">
        <div class="wrap-page">
            <div class="hrm-wrap-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="{{route('image.list')}}">Thư viện ảnh</a></li>
                    </ul>
                </div>
            </div> <!-- end pagination <-->
            <div class="content-single-image">
                <div class="content">
                    <div class="block-videos-content">
                        <div class="container">
                            <h2 class="title-detail">{{$name}}</h2>
                            <div class="list-img ">
                                @foreach($data as $key=>$value)
                                <a class="fancybox" href="{{$key}}" data-fancybox="images" data-thumb="{{$key}}" data-src="{{$key}}">
                                    <img src="{{$key}}" />
                                </a>
                                @endforeach
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