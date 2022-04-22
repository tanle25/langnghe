@extends('front-end.layouts.main')

@section('css')
@endsection

@section('title')
Liên hệ - Hệ sinh thái nông nghiệp- làng nghề - du lịch langnghethanhhoa.vn
@endsection

@section('content')
<content>
    <div class="blocks-contact">
        <div class="wrap-page">
            <div class="hrm-wrap-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="{{route('contact.get')}}" title="Văn bản">Liên hệ, phản hồi</a></li>
                    </ul>
                </div>
            </div> <!-- end pagination -->
            <div class="content-lienhe">
                <div class="container">
                    <div class="content-center">
                        <div class="row">
                            <div class="col-md-8">
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <strong>{{$err}}</strong><br>
                                    @endforeach
                                </div>
                                @endif
                                @if(session('error-user-contact'))
                                    <div class="alert alert-danger">
                                        <strong>{{session('error-user-contact')}}</strong>
                                    </div>
                                @endif
                                @if(session('success-user-contact'))
                                    <div class="alert alert-success">
                                        <strong>{{session('success-user-contact')}}</strong>
                                    </div>
                                @endif
                                <div class="blocks-contact-title">
                                    <h3>Thông tin phản hồi</h3>
                                </div>
                                <div class="blocks-contact-title-conment">
                                    <p>
                                        Cảm ơn Quý khách hàng đã tin tưởng sử dụng Hệ sinh thái nông nghiệp- làng nghề - du lịch langnghethanhhoa.vn, mời bạn gửi phản hồi về cho chúng tôi theo mẫu sau:
                                    </p>
                                </div>
                                <div class="group">
                                    <form id="form" class="form-horizontal" role="form" action="{{route('contact.post')}}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                        <div class="item-form col-xs-6">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên *" required>
                                        </div>
                                        <div class="item-form col-xs-6">
                                            <input type="number" class="form-control" id="mobile" name="phone" placeholder="Điện thoại" required>
                                        </div>
                                        <div class="item-form col-xs-6">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="item-form col-xs-12">
                                            <input type="text" class="form-control" id="subject" name="title" placeholder="Tiêu đề *" required>
                                        </div>
                                        <div class="item-form col-xs-12">
                                            <textarea class="form-control" name="content" type="textarea" id="message" placeholder="Nội dung chi tiết *" required="" rows="7">

                                            </textarea>
                                        </div>
                                        <div class="item-form col-xs-12">
                                            <p>Các ô có dấu <span>*</span> cần điền đầy đủ thông tin. Bạn có thể chọn nhiều file đính kèm để gửi. <br>
                                                Chúng tôi cam kết mọi thông tin phản hồi sẽ được bảo mật và chỉ sử dụng thông tin vào mục đích bảo vệ người tiêu dùng.
                                            </p>
                                        </div>
                                        <div class="item-form col-xs-12 text-center">
                                            <button type="submit" id="submit" name="submit" class="btn btn-success">Gửi phản hồi</button>
                                            <button type="reset" class="btn btn-default1" id="searchReset">Làm mới</button>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end col -->
                        </div> <!--  end media -->
                        <div class="clearfix"></div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row  -->
        </div>
    </div>
</div>
</div>
</div>
</content>
@endsection

@section('js')

@endsection