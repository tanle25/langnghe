@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
{{$thread->name}} - Hệ sinh thái nông nghiệp- làng nghề ARG GIS nông sản Hoằng Hóa
@endsection

@section('content')
<content>
    <div class="wrap-page detail-ads-wrap">
     <div class="wrap-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                <li><a href="{{route('ketnoi')}}" title="Sản phẩm">Kết nối cung cầu
                </a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="buy-center" >
            <div class="row">
                <div class="col-md-8">
                    <div class="buy-center-linked-list buy-center-linked-list-detail">
                        <div class="row">
                            @if($user != null)
                            <div class="col-md-3 col-sm-4 col-xs-4 col-100">
                                <div class="messageUserBlock">
                                    <div class="avatarHolder"><img src="{{get_image_user($user->image)}}"></div>
                                    <div class="userText">
                                        <div class="userTitle"><a href="#" class="username" dir="auto" itemprop="name">{{$user->name}}</a></div>
                                        <div class="datejoin">Tham gia:   {{date('d-m-Y', strtotime($user->created_at))}}</div>
                                        @if($user->xom != null && $user->xom != '')
                                        <div class="area1">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            {{$user->xom}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="col-md-9 col-sm-8 col-xs-8 col-100 border-ads">
                                <div class="block-h1">
                                    <h3>{{$thread->name}}</h3>
                                </div>
                                <div class="content-muaban">
                                    <div class="ngaydang">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d-m-Y', strtotime($thread->created_at))}}</span>
                                        <br/>
                                        <br/>
                                        <span><i class="glyphicon glyphicon-bullhorn" aria-hidden="true"></i> Thông tin chi tiết</span>
                                    </div>
                                    <div class="news-buy-main">
                                        <div class="loaisp"><strong>Tên hàng hóa:</strong><span class="span-label">
                                            <span>
                                                {{$thread->name}}
                                            </span>
                                        </div>
                                        <div class="loaisp"><strong>Loại sản phẩm:</strong><span class="span-label">
                                            <span>
                                                {{$thread->type_product != null ? $thread->type_product->name : ''}}
                                            </span>
                                        </div>
                                        @if($thread->type == 1)
                                        <div class="loaisp"><strong>Số lượng:</strong><span class="span-label">
                                            <span>
                                                {{$thread->content}}
                                            </span>
                                        </div>
                                        @else
                                        <div class="loaisp"><strong>Giá:</strong><span class="span-label">
                                            <span>
                                                {{$thread->content}}
                                            </span>
                                        </div>
                                        @endif
                                        <div class="loaisp"><strong>Số điện thoại:</strong><span class="span-label">
                                            <span>
                                                {{$thread->phone}}
                                            </span>
                                        </div>
                                        <div class="loaisp"><strong>Khu vực giao hàng:</strong><span class="span-label">
                                            <span>
                                                {{$thread->xa_model != null ? $thread->xa_model->name : ''}}
                                            </span>
                                        </div>
                                        <div class="loaisp"><strong>Địa chỉ:</strong><span class="span-label">
                                            <span>
                                                {{$thread->address}}
                                            </span>
                                        </div>
                                        <div class="loaisp"><strong>Ngày hết hạn:</strong><span class="span-label">
                                            <span>
                                                {{$thread->end_date}}
                                            </span>
                                        </div>
                                    </div>
                                    <div id="gallery" class="item">
                                        <ul id="content-slider">
                                            @foreach($thread->array_image as $key=>$value)
                                            <li>
                                                <img src="{{get_image_thread($value)}}" />
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ncc-center-topic">
                        <div class="block-h1">
                            <h1>Nhà cung cấp tiêu biểu</h1>
                        </div>
                        @foreach($shops as $shop)
                        <div class="wrap-ncc-r match-my-cols is-flex1">
                            <div class="ncc-rightlist media">
                                <a class= "pull-left" href="#" >
                                    <img class="img-ncc-right-list" title="" alt="" src="{{get_image_shop($shop->image)}}">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$shop->tencs}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if($threads->count() > 0)
            <div class="block-h1">
                <h1>Tin kết nối cung cầu</h1>
            </div>
            <div class="buy-center-linked-list-columns-index">
                <div class="row is-flex">
                    @foreach($threads as $tmp)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="buy-li1">
                            <div class="news-buy">
                                <div class="icon-buy-li">
                                    <a href="{{route('ketnoi.detail',['id'=>$tmp->id])}}">
                                        <img  src="{{get_image_thread($tmp->image)}}" >
                                    </a>
                                </div>
                                 <div class="wrap-buy-li">
                                    <h4><a class="post-link1" href="#">{{$tmp->user != null ? $tmp->user->name : ''}}</a></h4>
                                    <div class="info-buy">
                                        <span class="userport">
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                @if($tmp->type == 1)
                                                {{$tmp->phone}}
                                                @else
                                                {{$tmp->user != null ? $tmp->user->name : ''}}
                                                @endif
                                            </a>
                                        </span>
                                    </span>
                                    <span>|</span>
                                    <span class="port-time">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('d-m-Y', strtotime($tmp->created_at))}}</span>
                                    </span>
                                    <span>|</span>
                                    <span class="port-time">
                                        <span><i class="fa fa fa-bars" aria-hidden="true"></i>@if($tmp->type == 1) Cần bán @elseif ($tmp->type ==2) Cần mua @else Tìm đối tác @endif</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</content>
@endsection

@section('js')
@endsection