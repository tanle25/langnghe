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
            @include('front-end.account.toggle')
            <content>
                <div>
                    <div class="user-container">
                        <div class="row">

                            <div class="col-md-6 col-xs-12 user-info-right ">
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                    <strong>{{$err}}</strong><br>
                                    @endforeach
                                </div>
                                @endif
                                @if(session('error-update'))
                                <div class="alert alert-danger">
                                    <strong>{{session('error-update')}}</strong>
                                </div>
                                @endif
                                @if(session('success-update'))
                                <div class="alert alert-success">
                                    <strong>{{session('success-update')}}</strong>
                                </div>
                                @endif
                                <form id="form" class="form-horizontal" role="form" action="{{route('update.profile')}}"
                                enctype="multipart/form-data" method="POST">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" id="_id" name="_id" value="{{$user->id}}">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Tên đăng nhập</label>
                                    <div class="col-md-8">
                                        <div>
                                            <input id="username" type="text" class="form-control" name="username" value="{{$user->username}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ E-Mail</label>
                                    <div class="col-md-8">
                                        <div>
                                            <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Điện thoại di động</label>
                                    <div class="col-md-8">
                                        <div>
                                            <input id="phone" type="text" class="form-control" name="phone" value="{{$user->phone}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-left: 10px; padding-right: 10px;">
                                    <div style="border-top:1px solid #eee;"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Họ và tên</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row  ">
                                    <label for="region_id" class="col-md-4 col-form-label text-md-right">Huyện:</label>
                                    <div class="col-lg-8 col-sm-8 tree-search">
                                        <select class="js-example-basic-single col-lg-12" id="huyen" name="huyen" required>
                                            <option label=""></option>
                                            @foreach($huyens as $huyen)
                                            <option value="{{$huyen->id}}" {{isset($user) ? ($user->huyen == $huyen->id ? 'selected' : '') :
                                            (old('huyen') == $huyen->id ? 'selected' : '')}}>
                                            {{$huyen->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row  xa-content">
                                    @include('front-end.account.xa')
                               </div>
                               <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">SN/Thôn/Xóm</label>
                                <div class="col-md-8">
                                    <input id="xom" type="text" class="form-control" name="xom" value="{{$user->xom}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dayOfBirth" class="col-md-4 col-form-label text-md-right">Ngày sinh</label>
                                <div class="col-md-8">
                                    <input id="birthday" type="text" class="date-picker form-control" name="birthday" value="{{$user->birthday}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sex" class="col-md-4 col-form-label text-md-right">Giới tính</label>
                                <div class="col-md-8">
                                    <label for="sex" class="radio-inline"><input required value="1" {{$user->gender == 1 ? 'checked' : ''}} id="sex" type="radio" name="gender" >Nam</label>
                                    <label for="sex1" class="radio-inline"><input required value="0" {{$user->gender == 0 ? 'checked' : ''}} id="sex1" type="radio" name="gender" >Nữ</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="identification" class="col-md-4 col-form-label text-md-right">Số CMND/TCCCN</label>
                                <div class="col-md-8">
                                    <input id="cmtnd" type="text" class="form-control" name="cmtnd" value="{{$user->cmtnd}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="identification_date" class="col-md-4 col-form-label text-md-right">Ngày cấp</label>
                                <div class="col-md-8">
                                    <input id="ngaycap" type="text" class="date-picker form-control" name="ngaycap" value="{{$user->ngaycap}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="noicap" class="col-md-4 col-form-label text-md-right">Nơi cấp</label>

                                <div class="col-md-8">
                                    <input id="noicap" type="text" class="form-control" name="noicap" value="{{$user->noicap}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_login_otp" class="col-md-4 col-form-label text-md-right">Đăng nhập qua OTP</label>
                                <div class="col-md-8">
                                    <input id="isLoginOtpCheck" name="isLoginOtpCheck" type="checkbox" class="map" {{$user->otp == 1 ? 'checked' : ''}}  value="0" >
                                </div>
                            </div>
                            <div class="mb-0" style="text-align: right; padding-top: 8px;">
                                <!--<div class="col-md-6 offset-md-4">-->
                                    <button type="submit" class="btn-alert btn btn-success btn-save-tt">
                                        Lưu thông tin
                                    </button>
                                    <!--</div>-->
                                </div>
                            </div>
                        </form>
                        <div class="col-md-6 col-xs-12">
                            <div class="upload-img-container">
                                <div class="upload-img-border">
                                    <div class="upload-img-wrap">
                                        <img class="media-object" src="{{get_avatar($user)}}" width="128" height="128">
                                    </div>
                                </div>
                                <form id="updateAvatar" class="form-horizontal" role="form" action="{{route('user.avatar')}}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="upload-img-wrap-desc">
                                    <label class="upload-img-desc">Ảnh đại diện</label>
                                    <div class="btn btn-default btn-file">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh đại diện
                                        <input type='file' id="getFile" name="avatar">
                                    </div>
                                    <p class="upload-desc">
                                        <i class="fa fa-info-circle"></i>
                                        Hỗ trợ định dạng .jpg, .png, .gif, .jpeg với dung lượng không lớn hơn 2MB.<!-- /react-text -->
                                    </p>
                                </div>
                            </form>
                        </div>
                        <form action="{{route('user.pwd.change')}}" class="form-mk" method="POST">
                        @csrf

                        <div class="frm-reset-pass" style="border-top:1px solid #eee; margin-top: 10px;">
                            <h3 class="text-center" style="padding-top: 20px;padding-bottom: 10px;font-weight: 600; text-transform: uppercase;font-size: 18px;">Đổi mật khẩu</h3>
                            <br/>
                            @if(session('error-user-pwd'))

                                <div class="alert alert-danger">

                                    <strong>{{session('error-user-pwd')}}</strong>

                                </div>

                            @endif

                            @if(session('success-user-pwd'))

                                <div class="alert alert-success">

                                    <strong>{{session('success-user-pwd')}}</strong>

                                </div>

                            @endif
                            <div class="form-group row">
                                <label for="password-current" class="col-md-5 col-form-label text-md-right">Mật khẩu hiện tại</label>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control" name="password" required value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-5 col-form-label text-md-right">Mật khẩu mới</label>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control" name="new_password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-5 col-form-label text-md-right">Nhập lại mật khẩu mới</label>
                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="re_new_password" required>
                                </div>
                            </div>
                            <div class="mb-0" style="text-align: right;">
                                <button type="submit"  class="btn btn-primary btn-change-pass">
                                    Đổi mật khẩu
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>

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

    $('#getFile').change(function(){

        $("#updateAvatar").submit();

    });
</script>
<script>
    var base_url = $('#base_url').val();
    var xa_url = base_url + 'search/xa2';
    $('#huyen').change(function(){
            huyen_id = $('#huyen').val();
            $.get(xa_url, {huyen: huyen_id}, function (data) {
                $('.xa-content').empty().html(data);
            });
    });
</script>
@endsection
