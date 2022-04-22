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
Trang chủ - Kết nối cung cầu nông sản Hoằng Hóa
@endsection

@section('content')
<div class="page-area">
    <div class="container">
        <div class="wrapper hrm-dangtin" >
        @if(auth()->check())
        @include('front-end.account.menu')
        @endif
        <div class="content-wrapper" style="min-height: 533px;">
            @include('front-end.account.toggle')
            <content>
                <div class="form-ads-container">
                    <div class="toolbarUser">
                        <div class="user-info-right ">
                            @include('front-end.account.form-new')
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
    var base_url = $('#base_url').val();
    var getForm = base_url + 'ajax/dangtin/getForm';
    $('.category_id').change(function(event){
        event.preventDefault();
        _value = $(this).val();
        $.get(getForm, {type: _value}, function(data){
            $('#content_form').html(data);
        });
    });
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
</script>
@endsection