 <!-- end-footer -->
 <div id="fb-root"></div>
 <script src="{{asset('front-end/js/jquery-3.4.1.min.js')}}"></script>
 <script src="{{asset('front-end/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('front-end/js/select2.full.min.js')}}"></script>
 <script src="{{asset('front-end/js/slick.js')}}"></script>
 <script src="{{asset('front-end/js/owl.carousel.min.js')}}"></script>
 <script src="{{asset('front-end/js/jquery.fancybox.min.js')}}"></script>
 <script src="{{asset('front-end/js/datatables.min.js')}}"></script>
 <script src="{{asset('front-end/js/jquery-ui.js')}}"></script>
 <script src="{{asset('front-end/js/sweetalert2.min.js')}}"></script>
 <script src="{{asset('front-end/js/lightslider.min.js')}}"></script>
 <script src="{{asset('front-end/js/lightslider.js')}}"></script>
 <script src="{{asset('front-end/js/swiper.min.js')}}"></script>
 <script src="{{asset('front-end/js/customizer.js')}}"></script>
 <script src="{{asset('front-end/js/rateit.js')}}"></script>
 <script>
 	var url_add_cart = $('#base_url').val() + 'add-cart/ajax';
 	var url_search = $('#base_url').val() + 'tim-kiem';
 	var url_hover_cart = $('#base_url').val() + 'hover-cart/ajax';
 	$(".iconSearchHeader").click( function() {
 		keyword = $('#text_search').val();
 		if(keyword != null && keyword.trim() != ""){
			keyword = keyword.replace(' ', '+');
 			window.location = url_search + '?key=' + keyword;
 		}
 	});
$("#text_search").on('keypress', function(event) {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		 keyword = $('#text_search').val();
		//  console.log(keycode);
 		if(keyword != null && keyword.trim() != "" && keycode == '13'){
			keyword = keyword.replace(' ', '+');
 			window.location = url_search + '?key=' + keyword;
 		}
 	});
 	$(".add-cart").click( function() {
 		id = $(this).data('id');
 		$.get(url_add_cart, { product_id: id, num: 1}, function (data) {
       		$('.cart-count').empty().html(data['count']);
    	});
 	});
 	$("#small-cart" ).delegate(".btn-post-cart", "click", function() {
 		$.get(url_hover_cart, {}, function (data) {
       		$('#small-cart').empty().html(data);
       		$(".cart-web-hover").css('visibility', 'visible');
    	});
 	});
 	$("#small-cart" ).delegate(".close-small-cart", "click", function() {
 		$(".cart-web-hover").css('visibility', 'hidden');
 	});
 	$("#body_content" ).delegate( ".send-request", "click", function() {
        product_id = $(this).data('id');
        $('#product_id').val(product_id);
        $('#modal-lienhe').modal('show');
    });
 // 	$(document).mouseup(function(e)
	// {
	//     var container = $("#menu-left");

	//     // if the target of the click isn't the container nor a descendant of the container
	//     if (!container.is(e.target) && container.has(e.target).length === 0)
	//     {
	//         container.hide();
	//     }
	// });

	$(document).click(function(e)
	{
	    var container = $("#menu-top");

	    // if the target of the click isn't the container nor a descendant of the container
	    if (!container.is(e.target) && container.has(e.target).length === 0 && detectmob())
	    {
	       container.collapse('hide');
	    }
	});

	function detectmob() {
			if( navigator.userAgent.match(/Android/i)
	 				|| navigator.userAgent.match(/webOS/i)
	 				|| navigator.userAgent.match(/iPhone/i)
	 				|| navigator.userAgent.match(/iPad/i)
	 				|| navigator.userAgent.match(/iPod/i)
	 				|| navigator.userAgent.match(/BlackBerry/i)
	 				|| navigator.userAgent.match(/Windows Phone/i)
	 		){
	    		return true;
	  		}
	 		else {
	    		return false;
	  		}
	}
	 </script>
     @livewireScripts
