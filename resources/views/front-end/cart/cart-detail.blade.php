@extends('front-end.layouts.main')

@section('css')
 
@endsection

@section('title')
Giỏ hàng - Kết nối cung cầu nông sản Hoằng Hóa
@endsection

@section('content')

<div class="wrap-page">
    <div class="register-bg">
        <div class="block-title-h1" style="background-image: url({{asset('front-end/images/kt-banner.jpg')}})">
            <div class="container"><h1>Giỏ hàng</h1></div>
        </div>
        <div class="container" id="contentCart">
            @include('front-end.cart.list')
        </div>
    </div>
</div>
@include('front-end.modals.check-out')
@endsection

@section('js')
<script type="text/javascript">
    var url_add_cart = $('#base_url').val() + 'change-cart/ajax';
    $("#contentCart" ).on("click", ".check_out", function() {
       $('#modal-info').modal('toggle');
    });

    $("#contentCart" ).on("click", ".cong", function() {
        id = $(this).data('id');
        qty = $(this).parent().find('.item-quantity-value').val();
        $.get(url_add_cart, { product_id: id, num: parseInt(qty) + 1}, function (data) {
            $('#contentCart').empty().html(data.html);
            // $('.cart-count').html($('#sum_cart').val());
        });
    })
    $("#contentCart" ).on("click", ".tru", function() {
        id = $(this).data('id');
        qty = $(this).parent().find('.item-quantity-value').val();
        $.get(url_add_cart, { product_id: id, num: parseInt(qty) - 1}, function (data) {
            $('#contentCart').empty().html(data.html);
            // $('.cart-count').html($('#sum_cart').val());
        });
    })
   $("#contentCart" ).on("change", ".qty", function() {
        id = $(this).data('id');
        qty = $(this).val();
        $.get(url_add_cart, { product_id: id, num: parseInt(qty)}, function (data) {
            $('#contentCart').empty().html(data.html);
        });
    });
    $("#contentCart" ).on("click", ".btn-remove-cart-item", function() {
        id = $(this).data('id');
        qty = $(this).val();
        $.get(url_add_cart, { product_id: id, num: qty, type: 'del'}, function (data) {
            $('#contentCart').empty().html(data.html);
        });
    })
</script>
@endsection