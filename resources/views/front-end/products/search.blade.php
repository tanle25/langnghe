@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Kết quả tìm kiếm
@endsection

@section('content')
<content>
    <div class="wrap-page">
        <div class="wrap-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                    <li><a href="javascript:void(0)">Tìm Kiếm</a></li>
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
                                        Kết quả tìm kiếm
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <div id="sort-by">
                                        <label >Sắp xếp:</label>
                                        <select id="s_sort" class="form-control">
                                            <option value="default" {{isset($sort) ? ($sort == 'default' ? 'selected' : '') : ''}}>Mặc định</option>
                                            <option value="name_asc" {{isset($sort) ? ($sort == 'name_asc' ? 'selected' : '') : ''}}>Tên (A - Z)</option>
                                            <option value="name_desc" {{isset($sort) ? ($sort == 'name_desc' ? 'selected' : '') : ''}}>Tên (Z - A)</option>
                                            <option value="price_asc" {{isset($sort) ? ($sort == 'price_asc' ? 'selected' : '') : ''}}>Giá (Thấp &gt; Cao)</option>
                                            <option value="price_desc" {{isset($sort) ? ($sort == 'price_desc' ? 'selected' : '') : ''}}>Giá (Cao &gt; Thấp)</option>
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
        var filter_url = '<?php echo route('search'); ?>';
        $('#s_sort, #s_limit').change(function(){
            _num = $('#s_limit').val();
            _sort = $('#s_sort').val();
            $.ajax({
                url: filter_url,
                method: "GET",
                data: {
                    key: '{{$t_search}}',
                    limit: _num,
                    sort: _sort,    
                },
                success: function(json){
                    $('.list-product-by-cat').html(json.html)
                }
            })
        });
        $('.list-product-by-cat').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            _num = $('#s_limit').val();
            _sort = $('#s_sort').val();
            $.ajax({
                url: filter_url,
                method: "GET",
                data: {
                    key: '{{$t_search}}',
                    limit: _num,
                    sort: _sort,
                    page: page,
                },
                success: function(json){
                    $('.list-product-by-cat').html(json.html)
                }
            })
       });
    </script>
    @endsection