// láº¥y param cá»§a url
var urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results === null) {
        return null;
    }
    else {
        return decodeURI(results[1]) || 0;
    }
}
// kiá»ƒm tra Ä‘Äƒng nháº­p
var checkLogin = function () {
    if (userId < 1) {
        toastr.error("Báº¡n chÆ°a Ä‘Äƒng nháº­p !");
        return false;
    }
    return true;
}
// 
function updateURL(sUrl) {
    if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + sUrl;
        window.history.pushState({ path: newurl }, '', newurl);
    }
}
var entityMap = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#39;',
    '/': '&#x2F;',
    '`': '&#x60;',
    '=': '&#x3D;'
};

function escapeHtml(string) {
    return String(string).replace(/[&<>"'`=\/]/g, function (s) {
        return entityMap[s];
    });
}
// thĂªm sáº£n pháº©m vĂ o giá» hĂ ng
var addItemToCart = function (productId, organizationId) {
    // if(!checkLogin())
    //         return false;
    var form_data = new FormData();
    form_data.append('productId', productId);
    form_data.append('amount', 1);
    form_data.append('organization_id', organizationId);
    $.ajax({
        url: url + '/add-cart',
        method: 'POST',
        data: form_data,
        contentType: false,
        processData: false,
    }).done(function (msg) {
        if (msg.status === 'success') {
            $('.cart-count').html('');
            $('.cart-count').html('' + msg.totalQty + '');
            toastr.success("ThĂªm sáº£n pháº©m thĂ nh cĂ´ng !");
        }
        else {
            toastr.error(msg.message);
        }
    });
}
var numberFormat = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
    minimumFractionDigits: 0,
    maximumFractionDigits: 2,
});
$(document).on('ready', function () {
    // Thiáº¿t láº­p jquery ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //    var width = $(window).width();
    //    if (width <= 480) {
    //        //$('.toggle-button-dmsp').
    //        $('.toggle-button-dmsp').attr('data-target','.menu-vertical-dmsp');
    //        $(".regular").slick({
    //            infinite: true,
    //            slidesToShow: 2,
    //            slidesToScroll: 2
    //        });
    //    } else if (width <= 768) {
    //        $('.toggle-button-dmsp').attr('data-target','.menu-vertical-dmsp');
    //        $(".regular").slick({
    //            infinite: true,
    //            slidesToShow: 3,
    //            slidesToScroll: 3
    //        });
    //    } else {
    //       // $('.menu-vertical-dmsp').attr('display','none');
    //        $(".regular").slick({
    //            infinite: true,
    //            slidesToShow: 5,
    //            slidesToScroll: 5
    //        });
    //        
    //    }
    // if(userId > 0)
    $('.cart-count').css("display", "inline-flex");
    $('.btn-solid-primary').on('click', function () {
        location.href = url + '/get-cart';
    });
    $('.btn-post-cart, .cart-web-hover').hover(function () {
        $(".cart-web-hover").css('visibility', 'visible');
    }, function () {
        $(".cart-web-hover").css('visibility', 'hidden');
    }
    );
    $('.btn-post-cart').hover(function () {
        e.preventDefault();
        $(".cart-web-hover").css('visibility', 'visible');
        $.ajax({
            url: url + "/get-product-cart",
            method: 'GET',
            cache: false,
        }).done(function (msg) {
            if (msg.message === 'success') {
                var strHtml = '';
                var baseUrl = url;
                $.each(msg.product_cart, function (index, value) {
                    strHtml += ' <div class="cart-web-hover-item">';
                    strHtml += '<div class="cart-web-item-left" style="background-image: url(' + baseUrl + '/image/300/300/' + value.options.avatar_image + ' );"></div>';
                    strHtml += '<div class="cart-web-item-right">';
                    strHtml += '<div class="v-center">';
                    strHtml += '<div class="cart-sp-name">' + escapeHtml(value.name) + '</div>';
                    strHtml += '<div class="_2BMmIF"></div>';
                    strHtml += '<div class="cart-sp-price v-center">';
                    strHtml += '<div>' + numberFormat.format(value.subtotal) + '</div>';
                    strHtml += ' </div>';
                    strHtml += '</div>';
                    strHtml += '</div>';
                    strHtml += '</div>';
                });
                $('.product-items-cart').html('');
                $('.product-items-cart').html(strHtml);
            }
        });
    }, function () {
        $(".cart-web-hover").css('visibility', 'hidden');
    }
    );

    var loadCart = function () {
        // if(userId > 0){
        $.ajax({
            url: url + "/get-product-cart",
            method: 'GET',
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function (msg) {
            if (msg.message === 'success') {
                $('.cart-count').html('');
                $('.cart-count').html('' + msg.totalQty + '');

            }
        });
        // }
    }

    loadCart();
    // button cáº§n mua cáº§n bĂ¡n, tĂ¬m Ä‘á»‘i tĂ¡c
    $('.canmua-card').on('click', function (e) {
        location.href = urlAds + "?typeAds=can-mua";
    });
    $('.canban-card').on('click', function (e) {
        location.href = urlAds + "?typeAds=can-ban";
    });
    $('.timdoitac-card').on('click', function (e) {
        location.href = urlAds + "?typeAds=tim-doi-tac";
    });
    //button modal gá»­i yĂªu cáº§u liĂªn há»‡
    $('.send-request').on('click', function (e) {
        var id = $(this).data('id');
        if (!checkLogin())
            return false;
        $('#productId').val(id);
        $('#modal-lienhe').modal();
    });
    //gá»­i liĂªn há»‡
    $('#btn-send-request-product').on('click', function (e) {
        if (!checkLogin())
            return false;
        if ($('#txtContent').val().trim() == '') {
            toastr.error("Báº¡n chÆ°a nháº­p ná»™i dung");
            $('#txtContent').focus();
            return false;
        }

        var form_data = new FormData();
        form_data.append('productId', $('#productId').val());
        //        form_data.append('full-name', $('#ho-ten').val());
        //        form_data.append('email-user', $('#email-user').val());
        //        form_data.append('phone-number', $('#phone-number').val());
        form_data.append('txtContent', $('#txtContent').val());
        $.ajax({
            url: url + '/send-request-product',
            method: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
        }).done(function (msg) {
            if (msg.status === 'success') {
                $('#productId').val('');
                //                $('#ho-ten').val('');
                //                $('#email-user').val('');
                //                $('#phone-number').val('');
                $('#txtContent').val('');
                $('#modal-lienhe').modal('hide');
                toastr.success("Gá»­i yĂªu cáº§u thĂ nh cĂ´ng !");
            }
        });
    });
});
