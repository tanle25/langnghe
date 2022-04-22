 <div class="col-sm-4 col-md-3 col-xs-6">
    <div class="thumb-product item">
        <div class="img-item">
            @if($product->main_image != null)
            <div class="img">
                <a href="{{route('product.detail',['slug'=>$product->slug])}}" title="{{$product->name}}">
                    <img src="{{get_image_product($product->product_code.'/'.$product->main_image)}}" alt="{{$product->name}}">
                </a>
            </div>
            @endif
            <div class="cer-item">
            </div>
        </div>
        <div class="wrap-info">
            <h3><a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h3>
            @if($product->price > 0)
            <p class="discount">{{number_format($product->price, 0 ,'.' ,'.')}} ₫</p>
            @else
            <p class="discount">Giá: Liên hệ</p>
            @endif
        </div>
        <div class="container-star">
            <span class="star">
                @if($product->avg_rate != null)
                    @for($i = 1; $i <= $product->avg_rate; $i++)
                        <div class="rating-symbol" >
                            <div class="rating-symbol-background fa fa-star-o fa-2x"></div>
                            <div class="rating-symbol-foreground"><span class="fa fa-star fa-2x"></span>
                            </div>
                        </div>
                    @endfor
                    @for($i = 1; $i <= 5- ($product->avg_rate); $i++)
                        <div class="rating-symbol" >
                            <div class="rating-symbol-background fa fa-star-o fa-2x"></div>
                            <div class="rating-symbol-foreground"><span class="fa fa-star-o fa-2x"></span>
                            </div>
                        </div>
                    @endfor
                @endif
            </span>
            <input type="hidden" data-readonly value="3.6" class="rating rating-tooltip-manual" data-filled="fa fa-star fa-1x" data-empty="fa fa-star-o fa-1x" />
            @if($product->price > 0)
            <span class="shopping-cart-index">
                <a href="javascript:void(0)" data-id="{{$product->id}}" class="add-cart"> 
                    <i class="fa fa-cart-plus "></i>
                </a>
            </span>
            @else
            <button type="button" class="send-request" data-id="{{$product->id}}">Gửi yêu cầu</button>
            @endif
        </div>
        @if($product->shop != null)
        <div class="shop-info-index">
            <div class="shop-info-index-avatar">
                <img class="image-avatar-index" src="
                {{$product->shop->getThumb($product->shop->image)}}">
            </div>

            <span class="shop-info-index-text">
                <a href="{{route('shop.chitiet',['username'=>$product->shop->username])}}" title="{{$product->shop->tencs}}" >{{$product->shop->tencs}}</a>
            </span>
        </div>
        @endif
    </div>
</div>