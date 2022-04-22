@extends('front-end.layouts.main')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

<style type="text/css">
    .main-section{

        margin:0 auto;

        padding: 20px;

        margin-top: 100px;

        background-color: #fff;

        box-shadow: 0px 0px 20px #c1c1c1;

    }

    .fileinput-remove,

    .fileinput-upload{

        display: none;

    }
</style>
@endsection

@section('title')
Thông tin tài khoản: {{$user->name}}
@endsection

@section('content')
<div class="page-area">
    <div class="container">
        <div class="wrapper hrm-dangtin" >
         @include('front-end.account.menu')
         <div class="content-wrapper" style="min-height: 533px;">
            @include('front-end.account.toggle',['title'=>'Theo dõi đơn hàng'])
            <content>
                <div class="user-container">
                    <div class="">
                        <div class="box" id="box-area">
                            <!-- /.box-header -->
                            <div class="box-body-table">
                                <table class="table table-bordered table-striped table-hover" id="datatable-donhang" width="100%">
                                    <colgroup>
                                        <col width="35%">

                                        <col width="10%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="5%">
                                    </colgroup>
                                    <thead>
                                        <tr role="row" class="heading">
                                            <th>Loại tin</th>
                                            <th>Tên hàng hóa</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Nội dung</th>
                                            <th>Khu vực</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày hết hạn</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($threads as $thread)
                                        <tr role="row" class="odd">
                                            <td>@if($thread->type == 1) Cần mua @elseif($thread->type == 2) Cần bán @else Tìm đối tác @endif</td>
                                            <td class="text-right">{{$thread->name}}</td>
                                            <td class="text-right">{{$thread->type_product != null ? $thread->type_product->name : ''}}</td>
                                            <td class="text-right"><img src="{{get_image_thread($thread->main_image)}}" style="width: 100px; height: 100px"></td>
                                            <td>@if($thread->type == 1) Số lượng: {{$thread->content}} @elseif($thread->type == 2) Giá: {{$thread->content}} @else 'Giá: '{{$thread->content}} @endif</td>
                                            <td class="text-right">{{$thread->xa_model != null ? $thread->xa_model->name : ''}}</td>
                                            <td class="text-right">{{$thread->phone}}</td>
                                            <td class="text-right">{{$thread->end_date}}</td>
                                            <td class="text-right"><a href="{{route('userTinDang.edit',['id'=>$thread->id])}}" style="color: blue">Sửa</a> <a href="{{route('userTinDang.del',['id'=>$thread->id])}}" style="color: red">Xóa</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </content>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('js/slug.js')}}"></script>
<script type="text/javascript">
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "/imageUpload.php",
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
        overwriteInitial: false,
        maxFileSize:2000,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });

    $('.btn-show-sp').click(function(){

        $("#updateAvatar").submit();

    });
</script>
@endsection