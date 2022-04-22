<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề header website</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="title" id="title" value="{{$content != null && isset($content->title) ? $content->title : old('title')}}" placeholder="Cổng thông tin du lịch làng nghề Hoằng Hóa - Thanh Hóa" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề footer website</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="title_f" id="title_f" value="{{$content != null && isset($content->title_f) ? $content->title_f : old('title_f')}}" placeholder="© 2019 Hệ sinh thái nông nghiệp làng nghề du lịch Hoằng Hóa - Thanh Hóa." required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề Video trang chủ</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="title_video" id="video" value="{{$content != null && isset($content->title_video) ? $content->title_video : old('title_video')}}" placeholder="Tìm về nguồn cội (Ký sự Thanh Hóa tên đất hồn người - Tập 1)" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Ảnh video</label>
    <div class="col-sm-8">
        <div class="input-group">
            {{-- <span class="input-group-btn">
                <a href="{{env('URL_FILEMANAGE_0', '')}}"
                class="btn btn-primary red iframe-btn" id="iframe-btn-0"><i
                class="fa fa-picture-o"></i>Chọn</a>
            </span>
            @if($content != null && isset($content->image_video))
            <input id="thumb_0" class="form-control" type="text" name="image_video" value="{{$content->image_video}}">
            @else
            <input id="thumb_0" class="form-control" type="text" name="image_video">
            @endif --}}
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                </a>
              </span>
              <input id="thumbnail" class="form-control" type="text" name="image_video">
        </div>

        <div id="preview_0">
        {{-- @if($content != null && isset($content->image_video))
            <img src="{{config('admin.base_url').$content->image_video}}" style="max-width: 250px;">
        @else
        @endif --}}
        <div id="holder" style="margin-top:15px;">
            @if($content != null && isset($content->image_video))
            <img src="{{config('admin.base_url').$content->image_video}}" style="max-width: 250px;">
            @endif
        </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Video trang chủ</label>
    <div class="col-sm-8">
       <textarea class="form-control" name="video" id="video" rows="10">{!! $content != null && isset($content->video) ? $content->video : old('video') !!} </textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Hotline</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="hotline" id="hotline" value="{{$content != null && isset($content->hotline) ? $content->hotline : old('hotline')}}" placeholder="090.999.9999" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="email" id="email" value="{{$content != null && isset($content->email) ? $content->email : old('email')}}" placeholder="exmaple@gmail.com" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Địa chỉ</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="address" id="address" value="{{$content != null && isset($content->address) ? $content->address : old('address')}}" placeholder="Ủy ban nhân dân huyện Hoằng Hóa" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Map</label>
    <div class="col-sm-8">
        <textarea class="form-control" name="map" id="map" cols="5">{!! $content != null && isset($content->map) ? $content->map : old('map') !!} </textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Mô tả</label>
    <div class="col-sm-8">
        <textarea class="form-control" name="mota" id="mota">
           {!! $content != null && isset($content->mota) ? $content->map : old('mota') !!}
        </textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Facebook</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$content != null && isset($content->facebook) ? $content->facebook : old('facebook')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Google</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="gg" id="gg" value="{{$content != null && isset($content->gg) ? $content->gg : old('gg')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Zalo</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="zalo" id="zalo" value="{{$content != null && isset($content->zalo) ? $content->zalo : old('zalo')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Skype</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="skype" id="skype" value="{{$content != null && isset($content->skype) ? $content->skype : old('skype')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Youtube</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="youtube" id="youtube" value="{{$content != null && isset($content->youtube) ? $content->youtube : old('youtube')}}" placeholder="">
    </div>
</div>
