<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <br/>
        @if(session('error-user-check-out'))
        <div class="alert alert-danger">
            <strong>{{session('error-user-check-out')}}</strong>
        </div>
        @endif
        @if(session('success-user-check-out'))
        <div class="alert alert-success">
            <strong>{{session('success-user-check-out')}}</strong>
        </div>
        @endif
        <div class="cart-page__content">
            <div class="cart-page-product-headers">
                <div class="cart-page-product-header">
                    <div class="cart-page-product-header__title">Sản phẩm</div>
                </div>
                <div class="cart-page-product-header">Đơn giá</div>
                <div class="cart-page-product-header">Số lượng</div>
                <div class="cart-page-product-header">Đơn vị tính</div>
                <div class="cart-page-product-header">Số tiền</div>
                <div class="cart-page-product-header">Thao tác</div>
            </div>
            <div>
                <div class="cart-page-shop-section">
                    @include('front-end.cart.item-cart')
                </div>
            </div>
        </div>
        <div class="cart-page-footer">
            <div class="ct-card">
                @php
                    $qty = \Cart::count();
                    $sum = \Cart::subtotal(0, 0.1);
                @endphp
                <input type="hidden" id="sum_cart" value={{$qty}}>
                <div class="cart-page-footer__summary col-md-10">
                    <div class="cart-page-footer__first-summary">
                        <div class="cart-page-footer-summary__subtotal-text">Tổng tiền hàng ({{$qty}} sản phẩm):</div>
                        <div class="cart-page-footer-summary__subtotal-amount">{{str_replace(',', '.', $sum)}} ₫ </div>
                    </div>
                </div>
                <div class="cart-page-footer__checkout col-md-2">
                    @if($qty > 0)
                    <button  class="button-solid btn-purchase check_out">Mua hàng</button>
                    @endif
                </div>
            </div>
            <button onclick="window.location='{{route('home')}}'"  class="button-solid btn-purchase">Tiếp tục mua hàng</button>
        </div>
    </div>
</div>