<?php
//START PRODUCT
View::composer('back-end.admin.thread.*', function ($view) {
	$view->with(['flag'=>'thread','page_name'=>'TIN ĐĂNG CUNG/CẦU', 'name_session'=>'thread']);
});
View::composer(['back-end.admin.thread.create', 'back-end.admin.thread.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - TIN ĐĂNG CUNG/CẦU', 'parent_route'=>route('thread.index')]);
});
View::composer(['back-end.admin.thread.list', 'back-end.admin.thread.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('thread.create'),
		'route_update'=>route('mutileUpdate.thread')]);
});
	