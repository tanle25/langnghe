jQuery(document).ready(function() {
    jQuery(".owl-carousel").owlCarousel({
    loop:true,
    items: 1,
    nav: true,
    dots: true,
    autoplay: true,
});
  $('.js-example-basic-single').select2();
  $('#ThongBaoContent_1568594212').slick({
    vertical: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    verticalSwiping: false,
    autoplay: true,
  });
  $(".rating-star").mousemove(function() {
        count = $(this).data('id');
        $(".rating-star").each(function(){
            $(this).removeClass('fa-star');
            $(this).removeClass('fa-star-o');
            id = $(this).data('id');
            if(id <= count){
                $(this).addClass('fa-star');
            }else $(this).addClass('fa-star-o');
        });
    });
  jQuery(".subDropdown")[0] && jQuery(".subDropdown").on("click", function() {
    jQuery(this).toggleClass("plus"), jQuery(this).toggleClass("minus"), jQuery(this).parent().find("ul").slideToggle()
});
  var width = $(window).width();
  if (width <= 480) {
        //$('.toggle-button-dmsp').
        $('.toggle-button-dmsp').attr('data-target','.menu-vertical-dmsp');
        $(".regular").slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2
        });
    } else if (width <= 768) {
        $('.toggle-button-dmsp').attr('data-target','.menu-vertical-dmsp');
        $(".regular").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    } else {
       // $('.menu-vertical-dmsp').attr('display','none');
       $(".regular").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5
    });

   }

   $('.fancybox').fancybox();

     jQuery('.list-img').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:9,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        prevHtml:'<i class="fa fa-angle-left"></i>',
        nextHtml:'<i class="fa fa-angle-right"></i>',
    }); 
    //nút luu thông tin
     $(".btn-save-tt").click(function() {
       const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 3000,
        customClass: {
          container: 'content-alert',
          popup: 'popup-class',
          header: 'header-class',
          title: 'title-class',
          closeButton: 'close-button-class',
        }
      })
       Toast.fire({
        type: 'success',
        title: 'Cập nhật thành công!'
      })
     });
    //nút đổi mật khẩu
     $(".btn-change-pass").click(function() {
       const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 3000,
        customClass: {
          container: 'content-alert-change-pas',
          popup: 'popup-class-change-pas',
          header: 'header-class-change-pas',
          title: 'title-class-change-pas',
          closeButton: 'close-button-class-change-pas',
        }
      })
       Toast.fire({
        type: 'error',
        title: 'Cập nhật không thành công!'
      })
     });

// nút mua hàng
     $(".add-cart").click(function() {
       const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 3000,
        customClass: {
          container: 'content-alert',
          popup: 'popup-class',
          header: 'header-class',
          title: 'title-class',
          closeButton: 'close-button-class',
        }
      })
       Toast.fire({
        type: 'success',
        title: 'Thêm vào giỏ hàng thành công!'
      })
     });

     

});

$( function() {
  $( ".date-picker" ).datepicker();
} );


$( function() {
  $(".content-wrapper .modul-name a.sidebar-toggle").click(function(){
      $(".content-wrapper").toggleClass("sidebar-collapse");
    });

  $(".content-wrapper .modul-name a.sidebar-toggle").click(function(){
      $(".main-sidebar").toggleClass("res-me");
    });

  $('#datatable-donhang').dataTable({
      "oLanguage": {
        "sEmptyTable": "Không có dữ liệu.",
        "oPaginate": {
          "sPrevious": "Trước",
          "sNext": "Sau",
        },
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
      },
      "bLengthChange": false,
      "searching": false,
    });

  $('#datatable').dataTable({
      "oLanguage": {
        "sEmptyTable": "Không có dữ liệu.",
        "oPaginate": {
          "sPrevious": "Trước",
          "sNext": "Sau",
        },
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
      },
      "bLengthChange": false,
      "searching": false,
    });

  $('#datatable-dangtincc').dataTable({
      "oLanguage": {
        "sEmptyTable": "Không có dữ liệu.",
        "oPaginate": {
          "sPrevious": "Trước",
          "sNext": "Sau",
        },
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
      },
      "bLengthChange": false,
      "searching": false,
    });

  $(".js-example-basic-single").select2({
      placeholder: "Select Items",
      allowClear: true
    });

} );

$(function(){
    var imagesthumbspost = new Swiper('.images-thumbs-post', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: false,
      freeMode: true,
      loopedSlides: 5,
      direction: 'vertical',
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var gallerycontainer = new Swiper('.gallery-container', {
      spaceBetween: 10,
      loop:true,
      loopedSlides: 5,
      navigation: {
        nextEl: '.button-nexts',
        prevEl: '.button-prevs',
      },
      thumbs: {
        swiper: imagesthumbspost,
      },
    });
});
