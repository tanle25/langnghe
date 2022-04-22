@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Thư viện ảnh - Hệ sinh thái nông nghiệp- làng nghề ARG GIS nông sản Hoằng Hóa
@endsection

@section('content')
<content>
    <div class="block-iamges">
        <div class="wrap-page">
            <div class="hrm-wrap-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('home')}}" title="Trang chủ">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{route('image.list')}}">Thư viện ảnh</a>
                        </li>
                    </ul>
                </div>
            </div> <!-- end pagination -->
            <div class="content-img">
                <div class="container">
                    <div class="block-videos-title">
                        <h1>Danh sách Album ảnh</h1>
                    </div>
                    <div class="block-videos-content row is-flex">
                    	@foreach($data as $key=>$value)
                        <div class="item-video-list col-md-3 col-sm-4 col-xs-6">
                            <div class="logo-allbum">
                                <a href="{{route('image.detail',['name'=>$key])}}">
                                    <img src="{{$value}}" alt="{{$key}}">
                                </a>
                            </div>
                            <div class="title-allbum-right title-videos">
                                <h3>
                                    <a href="{{route('image.detail',['name'=>$key])}}">{{$key}}</a>
                                </h3>
                            </div>
                        </div> <!-- end col -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
    </div>
</content>
@endsection

@section('js')

@endsection