@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
{{$obj->name}}
@endsection

@section('content')
<content>
    <div class="wrap-page">
        @if(isset($obj) && $obj->banner != null && $obj->banner != '')
        <div class="block-title-h1" style="background-image: url('{{$obj->banner}}')">
            <div class="container"><h1>{{$obj->name}}</h1> </div>
        </div>
        @endif
        <div class="wrap-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                    @if($obj->parent != null)
                    <li><a href="{{route('category.detail',['slug'=>$obj->parent->slug])}}">{{$obj->parent->name}}</a></li>
                    @endif
                    <li><a href="{{route('category.detail',['slug'=>$obj->slug])}}">{{$obj->name}}</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="">
                @include('front-end.partials.menu-cat')
                <div class="col-md-4-5">
                    <div class="col-main-chil">
                        <div class="toolbar">
                            <div class="row">
                                <div class="col-md-5 col-sm-5">
                                    <div class="sortsoffer">
                                        {{$obj->name}}
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <div id="sort-by">
                                        <label >Sắp xếp:</label>
                                        <select id="s_sort" class="form-control">
                                            <option value="0" {{isset($sort) ? ($sort == 0 ? 'selected' : '') : ''}}>Mặc định</option>
                                            <option value="1" {{isset($sort) ? ($sort == 1 ? 'selected' : '') : ''}}>Tên (A - Z)</option>
                                            <option value="2" {{isset($sort) ? ($sort == 2 ? 'selected' : '') : ''}}>Tên (Z - A)</option>
                                            <option value="3" {{isset($sort) ? ($sort == 3 ? 'selected' : '') : ''}}>Giá (Thấp &gt; Cao)</option>
                                            <option value="4" {{isset($sort) ? ($sort == 4 ? 'selected' : '') : ''}}>Giá (Cao &gt; Thấp)</option>
                                        </select>
                                    </div>
                                    <div id="limiter">
                                        <label>Xem:</label>
                                        <select id="s_limit" class="form-control">
                                            <option value="12" {{isset($num) ? ($num == 12 ? 'selected' : '') : ''}}>12</option>
                                            <option value="25" {{isset($num) ? ($num == 25 ? 'selected' : '') : ''}}>25</option>
                                            <option value="50" {{isset($num) ? ($num == 50 ? 'selected' : '') : ''}}>50</option>
                                            <option value="100" {{isset($num) ? ($num == 100 ? 'selected' : '') : ''}}>100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product-by-cat">
                            @include('front-end.products.list')
                        </div>
                        <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </content>
    @endsection

    @section('js')
    <script src="{{asset('front-end/js/menu_dmsp.js')}}"></script>
    <script type="text/javascript">
        var fillter_url = '<?php echo route('ajax.filler'); ?>';
        $('#s_sort, #s_limit').change(function(){
            _num = $('#s_limit').val();
            _sort = $('#s_sort').val();
            _cat =  '{{$obj->id}}';
            $.get(fillter_url, {num: _num, sort: _sort, cat: _cat}, function (data) {
                $('.list-product-by-cat').empty().html(data);
            });
        });
    </script>
    @endsection