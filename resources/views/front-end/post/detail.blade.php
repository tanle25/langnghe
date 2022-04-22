@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
{{$post->name}}
@endsection

@section('content')
<content>
    <div class="wrap-page">
        <div class="hrm-wrap-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                    @if(isset($cat))
                    <li><a href="{{route('post.list',['slug'=>$cat->slug])}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                    @endif
                    <li><a href="#">{{$post->name}}</a></li>
                </ul>
            </div>
        </div>
        <div class="single-co-so-sx">
            <div class="container">
                <div class="content-center">
                    <div class="shop-page-wrapper">
                        <div class="shop-page__info">
                            <h1>{{$post->name}}</h1>
                        </div>
                        @if(isset($cat))
                        {!! $post->des_f !!}
                        @else
                        {!! $post->content !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</content>
@endsection

@section('js')

@endsection