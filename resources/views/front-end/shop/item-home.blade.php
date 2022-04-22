<div class="col-md-4">
    <div class="business-item">
        <div class="img-business">
            <a class="detail" href="{{route('shop.chitiet',['username'=>$shop->username])}}">
                <img alt="Công ty Cổ phần TM &amp; XNK thực phẩm Sao Mai" class="business-logo" src="{{$shop->getThumb($shop->image)}}">
            </a>
        </div>
        <div class="business-info"><span class="name">
            <a  href="{{route('shop.chitiet',['username'=>$shop->username])}}">
                {{$shop->tencs}}
            </a></span>
            <span class="text">Địa chỉ: {{$shop->xa_model != null ? $shop->xa_model->name.', '.$shop->xom : ''}}</span>
            <span class="text">&nbsp;</span>
        </div>
    </div>
</div>