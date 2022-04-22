@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $err)
    <strong>{{$err}}</strong><br>
    @endforeach
</div>
@endif
@if(session('error-creat-thread-user'))
<div class="alert alert-danger">
    <strong>{{session('error-creat-thread-user')}}</strong>
</div>
@endif
@if(session('success-creat-thread-user'))
<div class="alert alert-success">
    <strong>{{session('success-creat-thread-user')}}</strong>
</div>
@endif
@if(!isset($obj))
<form accept-charset="utf-8" enctype="multipart/form-data" action="{{route('dangtin.post')}}" class="form-horizontal" method="POST">
@else
<form accept-charset="utf-8" enctype="multipart/form-data" action="{{route('userTinDang.update',['id'=>$obj->id])}}" class="form-horizontal" method="POST">
@endif
    @csrf
    <input id="id" type="hidden" name="id" value="{{isset($obj) ? $obj->id : ''}}">
    <div class="form-group required">
        <label for="category_id" class="control-label col-lg-3 col-sm-4">Loại thông tin <sup>*</sup>
        </label>
        <div class="col-lg-9 col-sm-8">
            <label for="category_id" class="radio-inline">
                <input class="category_id" required value="1" id="category_id" type="radio" name="type" @if(!isset($obj) || (isset($obj) && $obj->type == 1)) checked="checked" @endif>Cần mua
            </label>
            @if(auth()->check())
            <label for="category_id2" class="radio-inline">
                <input class="category_id" required value="2" id="category_id2" type="radio" name="type" @if((isset($obj) && $obj->type == 2)) checked="checked" @endif>Cần bán
            </label>
            <label for="category_id3" class="radio-inline">
                <input class="category_id" required value="3" id="category_id3" type="radio" name="type" @if((isset($obj) && $obj->type == 3)) checked="checked" @endif>Tìm đối tác
            </label>
            @endif
        </div>
    </div>
    <span id="content_form">
       @include('front-end.account.elements.mua')
    </span>
    <div class="form-group required">
        <label for="tel" class="control-label col-lg-3 col-sm-4">Ảnh sản phẩm <sup>*</sup>
        </label>
        <div class="col-lg-9 col-sm-8">
            <div class="file-loading">
            <input id="file-1" type="file" name="images[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
            </div>
        </div>
    </div>
    <div class="form-group pull-right" style="margin-bottom: 0">
        <!--<div class="col-md-6 offset-md-4">-->
        <button type="submit" class="btn-save-tt btn btn-primary btn-creat-ads">
            Lưu
        </button>
            <!--</div>-->
    </div>
    <div class="clearfix">
    </div>
</form>