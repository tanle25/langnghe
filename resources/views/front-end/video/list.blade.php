@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Videos - Hệ sinh thái nông nghiệp- làng nghề ARG GIS nông sản Hoằng Hóa
@endsection

@section('content')
<content>
    <div class="block-videos">
        <div class="wrap-page">
            <div class="hrm-wrap-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="{{route('video.list')}}">Thư viện Video</a></li>
                    </ul>
                </div>
            </div> <!-- end pagination -->
            <div class="content-videos">
                <div class="container">
                    <div class="block-videos-title">
                        <h1>Danh sách video</h1>
                    </div>
                    <div class="block-videos-content row is-flex">
                        @foreach($videos as $video)
                            <div class="item-video-list col-md-3 col-sm-4 col-xs-6">
                            <div class="img-news-hot">
                                <a href="{{$video->link}}" target="_blank">
                                    <div>
                                        <img src="{{$video->image}}">
                                        <div class="icon-play">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="title-video-right">
                                <h3><a href="{{$video->link}}">{{$video->title}}</a></h3>
                                <p class="time-hot">
                                    <span><i class="fa fa-clock-o"></i>{{date('d-m-Y', strtotime($video->created_at))}}</span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{$videos->links()}}
                </div>
            </div>
        </div>
    </div>
</content>
@endsection

@section('js')

@endsection