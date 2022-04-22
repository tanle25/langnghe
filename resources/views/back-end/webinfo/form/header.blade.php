<div class="form-group">
    <label class="col-sm-2 control-label">Logo header</label>
    <div class="col-sm-4">
        <div class="input-group">
            <span class="input-group-btn">
                <a href="{{env('URL_FILEMANAGE_0', '')}}"
                class="btn btn-primary red iframe-btn" id="iframe-btn-0"><i
                class="fa fa-picture-o"></i>Chọn</a>
            </span>
            @if($content != null && isset($content->logo))
            <input id="thumb_0" class="form-control" type="text" name="logo" value="{{$content->logo}}">
            @else
            <input id="thumb_0" class="form-control" type="text" name="logo">
            @endif
        </div>

        <div id="preview_0">
        @if($content != null && isset($content->logo))
            <img src="{{config('admin.base_url').$content->logo}}" style="max-width: 250px;">
        @else
        @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Link logo header</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="link_logo" id="link_logo" 
        value="{{$content != null ? $content->link_logo : ''}}">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Logo footer</label>
    <div class="col-sm-4">
        <div class="input-group">
            <span class="input-group-btn">
                <a href="{{env('URL_FILEMANAGE_2', '')}}"
                class="btn btn-primary red iframe-btn" id="iframe-btn-2"><i
                class="fa fa-picture-o"></i>Chọn</a>
            </span>
            @if($content != null && isset($content->logo_footer))
            <input id="thumb_2" class="form-control" type="text" name="logo_footer" value="{{$content->logo_footer}}">
            @else
            <input id="thumb_2" class="form-control" type="text" name="logo_footer">
            @endif
        </div>

        <div id="preview_2">
        @if($content != null && isset($content->logo_footer))
            <img src="{{config('admin.base_url').$content->logo_footer}}" style="max-width: 250px;">
        @else
        @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Link logo header</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="link_logo_footer" id="link_logo_footer" 
        value="{{$content != null && isset($content->link_logo_footer) ? $content->link_logo_footer : ''}}">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Banner</label>
    <div class="col-sm-4">
        <div class="input-group">
            <span class="input-group-btn">
                <a href="{{env('URL_FILEMANAGE_1', '')}}"
                class="btn btn-primary red iframe-btn" id="iframe-btn-1"><i
                class="fa fa-picture-o"></i>Chọn</a>
            </span>
            @if($content != null && isset($content->banner))
            <input id="thumb_1" class="form-control" type="text" name="banner" value="{{$content->banner}}">
            @else
            <input id="thumb_1" class="form-control" type="text" name="banner">
            @endif
        </div>

        <div id="preview_1">
        @if($content != null && isset($content->banner))
            <img src="{{config('admin.base_url').$content->banner}}" style="max-width: 250px;">
        @else
        @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Link banner</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="link_banner" id="link_banner" 
        value="{{$content != null && isset($content->link_banner) ? $content->link_banner : ''}}">
    </div>
</div>