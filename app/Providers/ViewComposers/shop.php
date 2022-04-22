<?php
//START PRODUCT
View::composer('back-end.admin.shop.*', function ($view) {
	$view->with(['flag'=>'shop','page_name'=>'CƠ SỞ KINH DOANH', 'name_session'=>'shop']);
});
View::composer(['back-end.admin.shop.create', 'back-end.admin.shop.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - CƠ SỞ KINH DOANH', 'parent_route'=>route('shop.index')]);
});
View::composer(['back-end.admin.shop.list', 'back-end.admin.shop.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('shop.create'),
		'route_update'=>route('mutileUpdate.shop')]);
});

//START PRODUCT
View::composer('back-end.admin.shop-doc.*', function ($view) {
	$view->with(['flag'=>'admin-shop-doc','page_name'=>'GIẤY TỜ CƠ SỞ KINH DOANH', 'name_session'=>'admin-shop-doc']);
});
View::composer(['back-end.admin.shop-doc.create', 'back-end.admin.shop-doc.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - GIẤY TỜ CƠ SỞ KINH DOANH', 'parent_route'=>route('shop-doc.index')]);
});
View::composer(['back-end.admin.shop-doc.list', 'back-end.admin.shop-doc.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('shop-doc.create'),
		'route_update'=>route('mutileUpdate.shop-doc')]);
});

View::composer('back-end.admin.shop-views.*', function ($view) {
	$view->with(['flag'=>'admin-shop-views','page_name'=>'DANH SÁCH LƯỢT XEM', 'name_session'=>'admin-shop-views']);
});
View::composer('back-end.admin.shop-rate.*', function ($view) {
	$view->with(['flag'=>'admin-shop-rate','page_name'=>'DANH SÁCH ĐÁNH GIÁ', 'name_session'=>'admin-shop-rate']);
});
View::composer('back-end.admin.shop-like.*', function ($view) {
	$view->with(['flag'=>'admin-shop-like','page_name'=>'DANH SÁCH YÊU THÍCH', 'name_session'=>'admin-shop-like']);
});
View::composer('back-end.admin.shop-ask.*', function ($view) {
	$view->with(['flag'=>'admin-shop-ask','page_name'=>'DANH SÁCH Q&A', 'name_session'=>'admin-shop-ask']);
});


View::composer('back-end.shop.shop-doc.*', function ($view) {
	$view->with(['flag'=>'shop-doc','page_name'=>'GIẤY TỜ CƠ SỞ KINH DOANH', 'name_session'=>'shop-doc']);
});
View::composer(['back-end.shop.shop-doc.create', 'back-end.shop.shop-doc.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - GIẤY TỜ CƠ SỞ KINH DOANH', 'parent_route'=>route('doc.index')]);
});
View::composer(['back-end.shop.shop-doc.list', 'back-end.shop.shop-doc.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('doc.create'),
		'route_update'=>route('mutileUpdate.doc')]);
});

View::composer('back-end.shop.shop-views.*', function ($view) {
	$view->with(['flag'=>'shop-views','page_name'=>'DANH SÁCH LƯỢT XEM', 'name_session'=>'shop-views']);
});
View::composer('back-end.shop.shop-rate.*', function ($view) {
	$view->with(['flag'=>'shop-rate','page_name'=>'DANH SÁCH ĐÁNH GIÁ', 'name_session'=>'shop-rate']);
});
View::composer('back-end.shop.shop-like.*', function ($view) {
	$view->with(['flag'=>'shop-like','page_name'=>'DANH SÁCH YÊU THÍCH', 'name_session'=>'shop-like']);
});
View::composer('back-end.shop.shop-ask.*', function ($view) {
	$view->with(['flag'=>'shop-ask','page_name'=>'DANH SÁCH Q&A', 'name_session'=>'shop-ask']);
});

View::composer('back-end.admin.checkout.*', function ($view) {
	$view->with(['flag'=>'admin-checkout','page_name'=>'DANH SÁCH ĐƠN HÀNG', 'name_session'=>'admin-checkout']);
});
View::composer('back-end.admin.req.*', function ($view) {
	$view->with(['flag'=>'admin-req','page_name'=>'DANH SÁCH YÊU CẦU', 'name_session'=>'admin-req']);
});
View::composer('back-end.shop.checkout.*', function ($view) {
	$view->with(['flag'=>'shop-checkout','page_name'=>'DANH SÁCH ĐƠN HÀNG', 'name_session'=>'shop-checkout']);
});
View::composer('back-end.shop.req.*', function ($view) {
	$view->with(['flag'=>'shop-req','page_name'=>'DANH SÁCH YÊU CẦU', 'name_session'=>'shop-req']);
});