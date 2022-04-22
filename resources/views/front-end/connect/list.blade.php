@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Kết nối cung cầu - Kết nối cung cầu nông sản Hoằng Hóa
@endsection

@section('content')
<div class="buy-center" >
    <div class="wrap-page">
        <div class="wrap-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('home')}}" title="Trang chủ">Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{route('ketnoi')}}" title="Sản phẩm">Kết nối cung cầu </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            @include('front-end.connect.header')
            <div class="row">
                <div class="col-md-8">
                    <div class="row heading-page- ">
                        <div class="col-md-6  col-xs-12  block-h1 results-typeAds">

                        </div>
                        <div class="col-md-6  col-xs-12  block-h1">
                            <button class="button-dangtin" onclick="window.location.href='{{route('dangtin')}}'"><i class="fa fa-pencil" aria-hidden="true"></i>Đăng tin cung cầu</button>
                        </div>
                    </div>
                    <div class="buy-center-linked-list" id="list-thread">
                        @include('front-end.connect.list-connect',['threads'=>$threads])
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ncc-center-topic">
                        <div class="block-h1">
                            <h1>Nhà cung cấp tiêu biểu</h1>
                        </div>
                        @foreach($shops as $shop)
                        @include('front-end.connect.item-shop',['shop'=>$shop])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('js')
    <script type="text/javascript">
        var _url = $('#base_url').val() + 'ajax/ket-noi/';
        $('.connect-image').click(function(){
            _value = $(this).data('value');
            $.get(_url, {type: _value}, function(data){
                $('#list-thread').html(data);
            });
        });
    </script>
    @endsection