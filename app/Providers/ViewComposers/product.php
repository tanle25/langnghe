<?php
 //START TYPE PRODUCT
View::composer('back-end.TypeProduct.*', function ($view) {
	$view->with(['flag'=>'TypeProduct','page_name'=>'LOẠI SẢN PHẨM', 'name_session'=>'TypeProduct']);
});
View::composer(['back-end.TypeProduct.create', 'back-end.TypeProduct.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - LOẠI SẢN PHẨM', 'parent_route'=>route('type-product.index')]);
});
View::composer(['back-end.TypeProduct.list', 'back-end.TypeProduct.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('type-product.create'),
		'route_update'=>route('mutileUpdate.type-product')]);
});

//START PRODUCT
View::composer('back-end.admin.product.*', function ($view) {
	$view->with(['flag'=>'admin-product','page_name'=>'SẢN PHẨM', 'name_session'=>'product']);
});
View::composer(['back-end.admin.product.create', 'back-end.admin.product.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - SẢN PHẨM', 'parent_route'=>route('admin-product.index')]);
});
View::composer(['back-end.admin.product.list', 'back-end.admin.product.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('admin-product.create'),
		'route_update'=>route('mutileUpdate.admin-product')]);
});

View::composer('back-end.shop.product.*', function ($view) {
	$view->with(['flag'=>'shop-product','page_name'=>'SẢN PHẨM', 'name_session'=>'shop-product']);
});
View::composer(['back-end.shop.product.create', 'back-end.shop.product.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - SẢN PHẨM', 'parent_route'=>route('product.index')]);
});
View::composer(['back-end.shop.product.list', 'back-end.shop.product.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('product.create'),
		'route_update'=>route('mutileUpdate.product')]);
});


//START VIEWS
View::composer('back-end.admin.views.*', function ($view) {
	$view->with(['flag'=>'admin-views','page_name'=>'DANH SÁCH LƯỢT XEM', 'name_session'=>'admin-views']);
});
View::composer('back-end.admin.rate.*', function ($view) {
	$view->with(['flag'=>'admin-rate','page_name'=>'DANH SÁCH ĐÁNH GIÁ', 'name_session'=>'admin-rate']);
});
View::composer('back-end.admin.like.*', function ($view) {
	$view->with(['flag'=>'admin-like','page_name'=>'DANH SÁCH YÊU THÍCH', 'name_session'=>'admin-like']);
});
View::composer('back-end.admin.ask.*', function ($view) {
	$view->with(['flag'=>'admin-ask','page_name'=>'DANH SÁCH Q&A', 'name_session'=>'admin-ask']);
});

View::composer('back-end.shop.views.*', function ($view) {
	$view->with(['flag'=>'product-views','page_name'=>'DANH SÁCH LƯỢT XEM', 'name_session'=>'product-views']);
});
View::composer('back-end.shop.rate.*', function ($view) {
	$view->with(['flag'=>'product-rate','page_name'=>'DANH SÁCH ĐÁNH GIÁ', 'name_session'=>'product-rate']);
});
View::composer('back-end.shop.like.*', function ($view) {
	$view->with(['flag'=>'product-like','page_name'=>'DANH SÁCH YÊU THÍCH', 'name_session'=>'product-like']);
});
View::composer('back-end.shop.ask.*', function ($view) {
	$view->with(['flag'=>'product-ask','page_name'=>'DANH SÁCH Q&A', 'name_session'=>'product-ask']);
});