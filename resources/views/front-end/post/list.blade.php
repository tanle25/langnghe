@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
{{$cat->name}} - Hệ sinh thái nông nghiệp- làng nghề ARG GIS nông sản Hoằng Hóa
@endsection

@section('content')
<content>
    <div class="hrm-wrap-page">
        <div class="hrm-block-title" style="background-image: url({{asset('front-end/images/kt-banner.jpg')}});">
            <div class="container">
                <h1>{{$cat->name}}</h1>
            </div>
        </div>
    </div> <!-- end wrap page -->
    <div class="hrm-wrap-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('home')}}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{route('post.list',['slug'=>$cat->slug])}}">{{$cat->name}}</a>
                </li>
            </ul>
        </div>
    </div> <!-- end breadcrumd -->
    <div class="hrm-blog">
        <div class="container">
            <div class="box-news row">
                <div class="block-content">
                    <div class="row is-flex">
                        @foreach($posts as $post)
                        <div class="list-item col-md-4 col-sm-6 col-xs-6">
                            <div class="item news-content">
                                <a href="{{route('post.detail',['slug'=>$post->slug])}}" class="img">
                                    <img src="{{$post->image}}" alt="{{$post->name}}">
                                </a>
                                <h3>
                                    <a href="{{route('post.detail',['slug'=>$post->slug])}}" class="img">{{$post->name}}</a>
                                </h3>
                                <p>
                                    {{$post->des_s}}
                                </p>
                            </div> <!-- end item -->
                        </div>
                        @endforeach
                    </div> <!-- end row -->
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div> <!-- end block -->
</content>
@endsection

@section('js')

@endsection