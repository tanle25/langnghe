@if(auth()->check())
@php
$shopIds = [];
foreach($carts as $cart){
if($cart->product != null && $cart->product->shop != null)
{
    $cart_att_shop = $cart->product->shop->id;
    if(!isset($shopIds[$cart_att_shop]) || $shopIds[$cart_att_shop] == null){
    $shopIds[$cart_att_shop] = 1;
}else{
$shopIds[$cart_att_shop] = $shopIds[$cart_att_shop] + 1;
}
}
}
@endphp
@foreach($shopIds as $key=>$value)
@php
$shop = App\Shop::find($key);
@endphp
@if($shop != null)
@foreach($carts as $cart)
@if($cart->product != null && $cart->product->shop != null && $cart->product->shop->id == $key)
@php
$product = App\Admin\Product::find($cart->product_id);
@endphp
@if($product != null)
@if($product->sale_off <= 0)
@php
$off = $product->price;
@endphp
@else
@php
$off = $product->sale_off;
@endphp
@endif
<div class="checkout-product-ordered-list__content"> 
    <div class="checkout-shop-order-group">
        <div class="checkout-shop-order-group__orders">

            <div class="cart-page-shop-header">
                <a class="cart-page-shop-header__shop-name" href="#">
                    <span class="mgl10">{{$shop->tencs}}</span>
                </a>
            </div>
            <div class="checkout-product-ordered-list-item__items">
                <div class="checkout-product-ordered-list-item__item">
                    <div class="checkout-product-ordered-list-item__header checkout-product-ordered-list-item__header--product">
                        <img class="checkout-product-ordered-list-item__product-image" src="{{get_image_product($product->product_code.'/'.$product->main_image)}}" width="40" height="40">
                        <span class="checkout-product-ordered-list-item__product-info">
                            <span class="checkout-product-ordered-list-item__product-name">{{$product->name}}{{$product->name}}</span>
                        </span>
                    </div>
                    <div class="checkout-product-ordered-list-item__header">{{number_format($off, 0 ,'.' ,'.')}}&nbsp;₫</div>
                    <div class="checkout-product-ordered-list-item__header">{{$cart->amount}}</div>
                    <div class="checkout-product-ordered-list-item__header">Kg</div>
                    <div class="checkout-product-ordered-list-item__header">
                    @php
                    $total = floatval($off) * floatval($cart->amount);
                    @endphp
                    {{number_format( $total , 0 ,'.' ,'.')}}&nbsp;₫</div>
                </div>
            </div>
            <div class="info-order-organi">
                <div class="info-price-order">
                    <span class="total-price">Tổng tiền ({{$cart->amount}} sản phẩm):</span>
                    <span class="price-organi">{{number_format( $total , 0 ,'.' ,'.')}}&nbsp;₫</span>
                </div>
                <div class="info-price-right">
                    <form class="form-horizontal" role="form" action="{{route('checkOut.post')}}" 
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$shop->id}}" name="shop_id">
                        <input type="hidden" value="1" name="type_pay">
                        <button type="submit" class="button-solid-organi">Đặt hàng</button>
                    </form>
                </div>                                                
            </div>
        </div>
    </div>
</div>
@endif
@endif
@endforeach
@endif
@endforeach
@endif