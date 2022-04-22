<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv='cache-control' content='no-cache'>
    <link rel="shortcut icon" href="{{asset('front-end/images/shop.png')}}">
    <meta name="csrf-token" content="f7iBK1y39jMNzhYXI1kF5ENfLcmWqvd4Zl6NWMTG">
    <title>
    @if(isset($seo) && $seo != null && $seo->seo_title != null && $seo->seo_title != "")
    {{$seo->seo_title}}
    @else
    @yield('title')
    @endif
    </title>
    @if(isset($seo) && $seo != null)
    <meta name="description" content="{{$seo->seo_des}}">
    <meta name="title" content="{{$seo->seo_title}}">
    <meta name="keyword" content="{{$seo->seo_key}}">
    @endif
    <!-- Favicon -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://www.nongsanantoanthanhhoa.vn/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <link href="{{asset('front-end/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('front-end/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{asset('front-end/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/nhomsp.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="https://www.nongsanantoanthanhhoa.vn/css/chitietsanpham.css" rel="stylesheet">
    <link href="{{asset('front-end/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/ketnoi.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/style-shop.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/bolocsanpham.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/swiper.min.css')}}" rel="stylesheet">
<link href="{{asset('front-end/css/rateit.css')}}" rel="stylesheet">
    <style>
     #modal-info .modal-header{
        background-color: #ff5722;
     }
     #modal-info .modal-header  button,
     #modal-info .modal-header h4{
        color: #fff;
        opacity: 1;

     }
    #modal-info .modal-body .form-group{
        margin-right:0;
        margin-left:0;
    }
     #modal-lienhe .modal-header{
        background-color: #ff5722;
     }
     #modal-lienhe .modal-header  button,
     #modal-lienhe .modal-header h4{
        color: #fff;
        opacity: 1;

     }
    #modal-lienhe .modal-body .form-group{
        margin-right:0;
        margin-left:0;
    }
 </style>
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FE9GK1LETE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FE9GK1LETE');
</script>
@livewireStyles

</head>
