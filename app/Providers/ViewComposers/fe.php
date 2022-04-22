<?php

use App\Admin\CartDb;
use Cart;
use App\Admin\TypeProduct;
use App\Admin\Category;
use App\Admin\Huyen;
use App\Admin\Webinfo;
use App\Admin\Banner;

View::composer('front-end.partials.small-cart', function ($view) {
	$count = Cart::count();
	$view->with(['count'=>$count]);
});

View::composer('front-end.layouts.main', function ($view) {
	$info = Webinfo::where('name','thong-tin-chung')->first();
	if($info == null) abort(404);
	$header = Webinfo::where('name','header')->first();
	if($header == null) abort(404);
	$types = TypeProduct::where('status',1)->where('type',1)->orderby('name')->get();
	$view->with(['info'=>json_decode($info->content)]);
	$view->with(['header'=>json_decode($header->content)]);
	$view->with(['types'=>$types]);
});

View::composer('front-end.partials.footer', function ($view) {

});

View::composer('front-end.partials.menu-cat', function ($view) {
	$view->with(['cats2'=>[]]);
});

View::composer('front-end.page.index', function ($view) {

});