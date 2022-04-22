<?php
View::composer('back-end.staff.*', function ($view) {
	$view->with(['flag'=>'staff','page_name'=>'QUẢN TRỊ VIÊN', 'name_session'=>'staff']);
});
View::composer(['back-end.staff.create', 'back-end.staff.edit'], function ($view) {
	$view->with(['parent_menu'=>'DANH SÁCH QUẢN TRỊ VIÊN', 'parent_route'=>route('staff.index')]);
});
View::composer(['back-end.staff.list', 'back-end.staff.edit'], function ($view) {
	$view->with(['name_button'=>'Create new',
		'route_button'=>route('staff.create'),
		'route_update'=>route('mutileUpdate.staff')]);
});

View::composer('back-end.users.*', function ($view) {
	$view->with(['flag'=>'users','page_name'=>'THÀNH VIÊN', 'name_session'=>'user']);
});
View::composer(['back-end.users.create', 'back-end.users.edit'], function ($view) {
	$view->with(['parent_menu'=>'DANH SÁCH THÀNH VIÊN', 'parent_route'=>route('user.index')]);
});
View::composer(['back-end.users.list', 'back-end.users.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('user.create'),
		'route_update'=>route('mutileUpdate.user')]);
});

View::composer('back-end.brand.*', function ($view) {
	$view->with(['flag'=>'brand','page_name'=>'Thương hiệu đồng hành', 'name_session'=>'brand']);
});
View::composer(['back-end.brand.create', 'back-end.brand.edit'], function ($view) {
	$view->with(['parent_menu'=>'Thương hiệu đồng hành', 'parent_route'=>route('brand')]);
});
View::composer(['back-end.brand.list'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('brand_create'), 
		// 'route_update'=>route('mutileUpdate.brand')
	]);
});

View::composer('back-end.admin.contact.*', function ($view) {
	$view->with(['flag'=>'contact','page_name'=>'LIÊN HỆ', 'name_session'=>'contact']);
});
View::composer(['back-end.admin.contact.create', 'back-end.admin.contact.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - LIÊN HỆ', 'parent_route'=>route('contact.index')]);
});
View::composer(['back-end.admin.contact.list', 'back-end.admin.contact.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('contact.create'),
		'route_update'=>route('mutileUpdate.contact')]);
});

View::composer(['back-end.webinfo.menu'], function ($view) {
	$view->with(['name_button'=>'Thêm mới',
		'route_button'=>route('menu_create'),
		// 'route_update'=>route('mutileUpdate.contact')
	]);
});

 //START CONTENT
View::composer('back-end.content.*', function ($view) {
	$view->with(['flag'=>'content','page_name'=>'CONTENT', 'name_session'=>'content']);
});
View::composer(['back-end.content.create', 'back-end.content.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - CONTENT', 'parent_route'=>route('content.index')]);
});
View::composer(['back-end.content.list', 'back-end.content.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('content.create'), 
		'route_update'=>route('mutileUpdate.content')]);
});
        //END CONTENT

        //START SECTION
View::composer('back-end.section.*', function ($view) {
	$view->with(['flag'=>'section','page_name'=>'SECTION', 'name_session'=>'section']);
});
View::composer(['back-end.section.create', 'back-end.section.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - SECTION', 'parent_route'=>route('section.index')]);
});
View::composer(['back-end.section.list', 'back-end.section.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('section.create'), 
		'route_update'=>route('mutileUpdate.section')]);
});
//END SECTION
View::composer('back-end.pages.files', function ($view) {
	$view->with(['page_name'=>'Files', 'flag'=>'files']);
});

View::composer('back-end.pages.home', function ($view) {
	$view->with(['page_name'=>'Bảng Tin', 'flag'=>'admin-home']);
});

        //START USER
View::composer('back-end.users.*', function ($view) {
	$view->with(['flag'=>'users','page_name'=>'Người Dùng', 'name_session'=>'user']);
});
View::composer(['back-end.users.create', 'back-end.users.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - Người Dùng', 'parent_route'=>route('user.index')]);
});
View::composer(['back-end.users.list', 'back-end.users.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('user.create'), 
		'route_update'=>route('mutileUpdate.user')]);
});
        //END USER

        //START PAGE
View::composer('back-end.page.*', function ($view) {
	$view->with(['flag'=>'page','page_name'=>'Trang', 'name_session'=>'page']);
});
View::composer(['back-end.page.create', 'back-end.page.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - Trang', 'parent_route'=>route('page.index')]);
});
View::composer(['back-end.page.list', 'back-end.page.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('page.create'), 
		'route_update'=>route('mutileUpdate.page')]);
});
        //END PAGE

        //START BANNER
View::composer('back-end.banner.*', function ($view) {
	$view->with(['flag'=>'banner','page_name'=>'Banner', 'name_session'=>'banner']);
});
View::composer(['back-end.banner.create', 'back-end.banner.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - Banner', 'parent_route'=>route('banner.index')]);
});
View::composer(['back-end.banner.list', 'back-end.banner.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('banner.create'), 
		'route_update'=>route('mutileUpdate.banner')]);
});
        //END BANNER

        //START SEO
View::composer('back-end.seo.*', function ($view) {
	$view->with(['flag'=>'seo','page_name'=>'SEO', 'name_session'=>'seo']);
});
View::composer(['back-end.seo.create', 'back-end.seo.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - SEO', 'parent_route'=>route('seo.index')]);
});
View::composer(['back-end.seo.list', 'back-end.seo.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('seo.create'), 
		'route_update'=>route('mutileUpdate.seo')]);
});
        //END SEO
View::composer('back-end.webinfo.*', function ($view) {
	$view->with(['name_session'=>'info']);
});
        //START MEDIA
View::composer('back-end.media.*', function ($view) {
	$view->with(['flag'=>'media','page_name'=>'MEDIA', 'name_session'=>'media']);
});
View::composer(['back-end.media.create', 'back-end.media.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - MEDIA', 'parent_route'=>route('media.index')]);
});
View::composer(['back-end.media.list', 'back-end.media.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('media.create'), 
		'route_update'=>route('mutileUpdate.media')]);
});
        //END MEDIA

        //START ICON
View::composer('back-end.icon.*', function ($view) {
	$view->with(['flag'=>'icon','page_name'=>'ICON', 'name_session'=>'icon']);
});
View::composer(['back-end.media.create', 'back-end.media.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - ICON', 'parent_route'=>route('icon.index')]);
});
View::composer(['back-end.icon.list', 'back-end.icon.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('icon.create'), 
		'route_update'=>route('mutileUpdate.icon')]);
});
        //END ICON

        //START TAG
View::composer('back-end.tag.*', function ($view) {
	$view->with(['flag'=>'tag','page_name'=>'TAG', 'name_session'=>'tag']);
});
View::composer(['back-end.tag.create', 'back-end.tag.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - TAGS', 'parent_route'=>route('tag.index')]);
});
View::composer(['back-end.tag.list', 'back-end.tag.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('tag.create'), 
		'route_update'=>route('mutileUpdate.tag')]);
});
        //END TAG

        //START CATEGORY
View::composer('back-end.category.*', function ($view) {
	$view->with(['flag'=>'category','page_name'=>'CHUYÊN MỤC', 'name_session'=>'category']);
});
View::composer(['back-end.category.create', 'back-end.category.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - CHUYÊN MỤC', 'parent_route'=>route('category.index')]);
});
View::composer(['back-end.category.list', 'back-end.category.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('category.create'), 
		'route_update'=>route('mutileUpdate.category')]);
});
        //END CATEGORY

        //START POST
View::composer('back-end.post.*', function ($view) {
	$view->with(['flag'=>'post','page_name'=>'BÀI VIẾT', 'name_session'=>'post']);
});
View::composer(['back-end.post.create', 'back-end.post.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - BÀI VIẾT', 'parent_route'=>route('post.index')]);
});
View::composer(['back-end.post.list', 'back-end.post.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('post.create'), 
		'route_update'=>route('mutileUpdate.post')]);
});
        //END POST

        //START ALBUM
View::composer('back-end.album.*', function ($view) {
	$view->with(['flag'=>'album','page_name'=>'ALBUM', 'name_session'=>'album']);
});
View::composer(['back-end.album.create', 'back-end.album.edit'], function ($view) {
	$view->with(['parent_menu'=>'Danh sách - ALBUM', 'parent_route'=>route('album.index')]);
});
View::composer(['back-end.album.list', 'back-end.album.edit'], function ($view) {
	$view->with(['name_button'=>'Thêm mới', 
		'route_button'=>route('album.create'), 
		'route_update'=>route('mutileUpdate.album')]);
});
        //END ALBUM


        // View::composer(
        //     'partials.navigation', 'App\Http\ViewComposers\NavigationViewComposer'
        // );