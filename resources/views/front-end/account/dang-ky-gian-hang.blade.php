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
Đăng ký gian hàng
@endsection

@section('content')
<div class="page-area">
    <div class="container">
        @if(session('error-shop'))
        <div class="alert alert-danger">
            <strong>{{session('error-shop')}}</strong>
        </div>
        @endif
        @if(session('success-shop'))
        <div class="alert alert-success">
            <strong>{{session('success-shop')}}</strong>
        </div>
        @endif
        <h3>Form đăng ký gian hàng</h3>
        <br>
        <form method="POST" action="{{ route('dang-ki-gian-hang')}}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-6 col-xs-12 user-info-right ">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Tên đăng nhập <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <div>
                            <input id="username" type="text" class="form-control" name="username" value="{{old('username')}}" required>
                        </div>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Mật khẩu <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <div>
                            <input id="password" type="password" class="form-control" name="password" value="" required>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ E-Mail <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Số điện thoại <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <div>
                            <input id="dt" type="text" class="form-control" name="dt" value="{{old('dt')}}" required>
                            @error('dt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="padding-left: 10px; padding-right: 10px;">
                    <div style="border-top:1px solid #eee;"></div>
                </div>
                <div class="form-group row">
                    <label for="sogiay" class="col-md-4 col-form-label text-md-right">Ảnh đại diện <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <input type='file' name="image" required>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-8 col-md-offset-4">
                    <img src="#" style="display: none; margin: 10px 0; max-width: 300px">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sogiay" class="col-md-4 col-form-label text-md-right">Ảnh giấy tờ 1 <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <input type='file' name="image_1" required>
                        @error('image_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <span class="col-md-12">** Giấy chứng nhận đủ điều kiện ATTP với sản phẩm thực phẩm</span>
                    <div class="col-md-8 col-md-offset-4">
                        <img src="#" style="display: none; margin: 10px 0; max-width: 300px">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sogiay" class="col-md-4 col-form-label text-md-right">Ảnh giấy tờ 2 </label>
                    <div class="col-md-8">
                        <input type='file' name="image_2">
                        @error('image_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-8 col-md-offset-4">
                    <img src="#" style="display: none; margin: 10px 0; max-width: 300px">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 user-info-right">
                <div class="form-group row">
                    <label for="tencs" class="col-md-4 col-form-label text-md-right">Tên gian hàng <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <input id="tencs" type="text" class="form-control" name="tencs" value="{{old('tencs')}}" required>
                        @error('tencs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="region_id" class="col-md-4 col-form-label text-md-right">Xã <span style="color: red">*</span></label>
                    <div class="col-lg-8 col-sm-8 tree-search">
                        <select class="js-example-basic-single col-lg-12" id="xa" name="xa" required>
                            <option label=""></option>
                            @foreach($xas as $xa)
                            <option value="{{$xa->id}}" {{old('xa') == $xa->id ? 'selected' : ''}}>
                                {{$xa->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('xa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">SN/Thôn/Xóm</label>
                    <div class="col-md-8">
                        <input id="xom" type="text" class="form-control" name="xom" value="{{old('xom')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Loại gian hàng <span style="color: red">*</span></label>
                    <div class="col-lg-8 col-sm-8 tree-search">
                        <select name="loaidn" class="js-example-basic-single col-lg-12" id="loaidn" required>
                            <option label=""></option>
                            @foreach(config('shop.loaidn') as $key=>$value)
                            <option value="{{$key}}" {{old('loaidn') == $key ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                            @error('loaidn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group row" style="display: none">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Mã số thuế <span style="color: red">*</span></label>
                    <div class="col-lg-8 col-sm-8 tree-search">
                        <input id="masothue" type="text" class="form-control" name="masothue" value="{{old('masothue')}}" required>
                    </div>
                </div>
                <div class="form-group row" style="display: none">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Số CMND<span style="color: red">*</span></label>
                    <div class="col-lg-8 col-sm-8 tree-search">
                        <input id="socmnd" type="text" class="form-control" name="socmnd" value="{{old('socmnd')}}" required>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Loại giấy tờ <span style="color: red">*</span></label>
                    <div class="col-lg-8 col-sm-8 tree-search">
                        <select name="loaigiayto" class="js-example-basic-single col-lg-12" id="loaigiayto" required>
                            <option label=""></option>
                            @foreach(config('shop.loaigiayto') as $key=>$value)
                            <option value="{{$key}}" {{old('loaigiayto') == $key ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sogiay" class="col-md-4 col-form-label text-md-right">Số giấy tờ <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <input id="sogiay" type="text" class="form-control" name="sogiay" value="{{old('sogiay')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sogiay" class="col-md-4 col-form-label text-md-right">Nơi cấp <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <input id="coquancp" type="text" class="form-control" name="coquancp" value="{{old('coquancp')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sogiay" class="col-md-4 col-form-label text-md-right">Ngày cấp <span style="color: red">*</span></label>
                    <div class="col-md-8">
                        <input id="ngaycap" type="text" class="form-control" name="ngaycap" value="{{old('ngaycap')}}" required>
                    </div>
                </div>
                
                <div class="mb-0" style="text-align: right; padding-top: 8px;">
                    <button type="submit" class="btn-alert btn btn-success btn-save-tt">
                        Gửi yêu cầu
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

<script>
    var base_url = $('#base_url').val();
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $(input).parent().parent().find('img').attr('src', e.target.result).css('display', 'block');
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $(document).ready(function(){
        $("input[type='file']").change(function() {
            readURL(this);
        });
    });
</script>
@endsection