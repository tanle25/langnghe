<?php
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login.get');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.post');
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {

	Route::prefix('thiet-lap')->group(function () {
    	Route::get('/thong-tin-chung', 'Admin\WebinfoController@commonInfo')->name('thong-tin-chung');
    	Route::post('/thong-tin-chung/thay-doi', 'Admin\WebinfoController@postCommonInfo')->name('thong-tin-chung.post');

    	Route::get('/header', 'Admin\WebinfoController@headerInfo')->name('header');
    	Route::post('/header/thay-doi', 'Admin\WebinfoController@postHeaderInfo')->name('header.post');

		Route::get('/menu', 'Admin\WebinfoController@menu')->name('menu');
		Route::any('menu/create', 'Admin\WebinfoController@createMenu')->name('menu_create');
		Route::any('menu/edit/{id}', 'Admin\WebinfoController@editMenu')->name('menu_edit');
		Route::delete('menu/delete/{id}', 'Admin\WebinfoController@deleteMenu')->name('menu_delete');

	});
    Route::group(['prefix' => 'filemanager', 'middleware' => ['auth:admin']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
	Route::get('/companion-brand', 'Admin\CompanionBrandController@companionBrand')->name('brand');
	Route::any('companion-brand/create', 'Admin\CompanionBrandController@createCompanionBrand')->name('brand_create');
	Route::any('companion-brand/edit/{id}', 'Admin\CompanionBrandController@editCompanionBrand')->name('brand_edit');
	Route::delete('companion-brand/delete/{id}', 'Admin\CompanionBrandController@deleteCompanionBrand')->name('brand_delete');

    Route::get('/', 'Admin\WebinfoController@commonInfo');


	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::resource('staff', 'Admin\AdminController');
	Route::get('/profile', 'Admin\AdminController@getProfile')->name('admin.profile');
	Route::post('/profile', 'Admin\AdminController@postProfile')->name('admin.profile.post');
	Route::post('/mutile-update/staff', 'Admin\AdminController@mutileUpdate')
	->name('mutileUpdate.staff');

	Route::get('/don-hang', 'Admin\HomeController@listCheckOut')->name('admin.checkout');
	Route::get('/don-hang/{code}', 'Admin\HomeController@detailCheckout')->name('detail_checkout');
	Route::any('/don-hang/{code}/edit', 'Admin\HomeController@editCheckout')->name('edit_checkout');
	Route::get('/yeu-cau', 'Admin\HomeController@listReq')->name('admin.req');
	//Type Product
	Route::resource('type-product', 'Admin\TypeProductController');
	Route::post('/mutile-update/type-product', 'Admin\TypeProductController@mutileUpdate')
	->name('mutileUpdate.type-product');

	//Product
	Route::resource('admin-product', 'Admin\ProductController');
	Route::post('/mutile-update/admin-product', 'Admin\ProductController@mutileUpdate')
	->name('mutileUpdate.admin-product');

	//Product
	Route::resource('shop', 'Admin\ShopController');
	Route::post('/mutile-update/shop', 'Admin\ProductController@mutileUpdate')
	->name('mutileUpdate.shop');

	Route::resource('contact', 'Admin\ContactController');
	Route::post('/mutile-update/contact', 'Admin\ContactController@mutileUpdate')
	->name('mutileUpdate.contact');


	Route::resource('thread', 'Admin\ThreadController');
	Route::post('/mutile-update/thread', 'Admin\ThreadController@mutileUpdate')
	->name('mutileUpdate.thread');
	Route::get('/active/thread/{id}', 'Admin\ThreadController@active')->name('thread.active');
    Route::get('/de-active/thread/{id}', 'Admin\ThreadController@deactive')->name('thread.deactive');

	Route::resource('shop-doc', 'Admin\ShopDocController');
	Route::post('/mutile-update/shop-doc', 'Admin\ShopDocController@mutileUpdate')
	->name('mutileUpdate.shop-doc');

	//View
	Route::resource('admin-views', 'Admin\UserViewController');
	Route::resource('admin-shop-views', 'Admin\ShopViewController');
	Route::resource('admin-rate', 'Admin\ProductRateController');
	Route::resource('admin-shop-rate', 'Admin\ShopRateController');
	Route::resource('admin-like', 'Admin\ProductLikeController');
	Route::resource('admin-shop-like', 'Admin\ShopLikeController');
	Route::resource('admin-ask', 'Admin\ProductAskController');
	Route::resource('admin-shop-ask', 'Admin\ShopAskController');
	//Content
	Route::resource('content', 'Admin\ContentController');
	Route::post('/mutile-update/content', 'Admin\ContentController@mutileUpdate')
	->name('mutileUpdate.content');

	//Section
	Route::resource('section', 'Admin\SectionController');
	Route::post('/mutile-update/section', 'Admin\SectionController@mutileUpdate')
	->name('mutileUpdate.section');

	//Post
	Route::resource('post', 'Admin\PostController');
	Route::post('/mutile-update/post', 'Admin\PostController@mutileUpdate')
	->name('mutileUpdate.post');

	//Album
	Route::resource('album', 'Admin\AlbumController');
	Route::post('/mutile-update/album', 'Admin\AlbumController@mutileUpdate')
	->name('mutileUpdate.album');
	Route::get('/get-image/autocomplete', 'Admin\AlbumController@getImage')
	->name('get-image');

	//Category
	Route::resource('category', 'Admin\CategoryController');
	Route::post('/mutile-update/category', 'Admin\CategoryController@mutileUpdate')
	->name('mutileUpdate.category');

	//Tag
	Route::resource('tag', 'Admin\TagController');
	Route::post('/mutile-update/tag', 'Admin\TagController@mutileUpdate')
	->name('mutileUpdate.tag');

	//Icon
	Route::resource('icon', 'Admin\IconController');
	Route::post('/mutile-update/icon', 'Admin\IconController@mutileUpdate')
	->name('mutileUpdate.icon');

	//Seo
	Route::resource('seo', 'Admin\SeoController');
	Route::post('/mutile-update/seo', 'Admin\SeoController@mutileUpdate')
	->name('mutileUpdate.seo');

	//Media
	Route::resource('media', 'Admin\MediaController');
	Route::post('/mutile-update/media', 'Admin\MediaController@mutileUpdate')
	->name('mutileUpdate.media');

	//Home
	Route::get('/home', 'Admin\HomeController@adminHome')->name('admin.home');

	//User
	Route::resource('user', 'Admin\UserController');
	Route::post('/mutile-update/user', 'Admin\UserController@mutileUpdate')
	->name('mutileUpdate.user');

	//Page
	Route::resource('page', 'Admin\PageController');
	Route::post('/mutile-update/page', 'Admin\PageController@mutileUpdate')
	->name('mutileUpdate.page');

	//Banner
	Route::resource('banner', 'Admin\BannerController');
	Route::post('/mutile-update/banner', 'Admin\BannerController@mutileUpdate')
	->name('mutileUpdate.banner');

	//Logs
	Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')
	->name('admin.logs');

	//Files
	Route::get('/files', function () {
    	return view('back-end.pages.files');
	})->name('admin.files');

	//Slug
	Route::get('/create-slug', 'Admin\HomeController@createSlug')
	->name('create-slug');
	Route::post('/addcustommenu', array('as' => 'haddcustommenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@addcustommenu'));
    Route::post('/deleteitemmenu', array('as' => 'hdeleteitemmenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@deleteitemmenu'));
    Route::post('/deletemenug', array('as' => 'hdeletemenug', 'uses' => '\Harimayco\Menu\Controllers\MenuController@deletemenug'));
    Route::post('/createnewmenu', array('as' => 'hcreatenewmenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@createnewmenu'));
    Route::post('/generatemenucontrol', array('as' => 'hgeneratemenucontrol', 'uses' => '\Harimayco\Menu\Controllers\MenuController@generatemenucontrol'));
    Route::post('/updateitem', array('as' => 'hupdateitem', 'uses' => '\Harimayco\Menu\Controllers\MenuController@updateitem'));
});
