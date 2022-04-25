<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('delete-shop',[ProductController::class,'deleteProduct']);

Route::get('/register', 'UserController@register')->name('register');
Route::post('/register', 'UserController@step1')->name('register.post');
Route::get('/login', 'UserController@login')->name('login.get');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/san-pham/{slug}', 'ProductController@detail')->name('product.detail');
Route::get('/fillter/danh-muc', 'ProductController@fillterAjax')->name('ajax.filler');
Route::get('/tim-kiem', 'HomeController@search')->name('search');
Route::get('/search/xa', 'Admin\UserController@xaAjax');
Route::get('/search/xa2', 'UserController@xaAjax');
Route::get('/danh-muc/{slug}', 'ProductController@getByCategory')->name('category.detail');
Route::post('/dat-hang/', 'CartController@checkOutPost')->name('checkOut.post');
Route::post('/send/require-buy', 'HomeController@sendReq')
    ->name('require-buy.post');
Route::get('/dang-tin/', 'ConnectController@create')
    ->name('dangtin');
Route::post('/dang-tin/', 'ConnectController@store')
    ->name('dangtin.post');
Route::get('/danh-sach-tin/{id}', 'ConnectController@userTinDang')
    ->name('userTinDang');
Route::get('/tin-dang/sua/{id}', 'ConnectController@edit')
    ->name('userTinDang.edit');
Route::post('/tin-dang/sua/{id}', 'ConnectController@update')
    ->name('userTinDang.update');
Route::get('/tin-dang/xoa/{id}', 'ConnectController@del')
    ->name('userTinDang.del');
Route::get('/ajax/dangtin/getForm', 'ConnectController@getForm');
Route::post('/dang-ki-gian-hang', 'Admin\ShopController@registerShop')
    ->name('dang-ki-gian-hang');
Route::get('user/{id}', 'Admin\AdminController@user')
    ->name('detail_user');

Route::middleware(['auth'])->group(function () {
    // Route::get('/dat-hang/', 'CartController@checkOut')
    // ->name('checkOut');
    Route::get('/thong-tin-ca-nhan', 'UserController@getProfile')
        ->name('profile.get');
    Route::patch('/thong-tin-ca-nhan', 'UserController@updateProfile')
        ->name('update.profile');
    Route::post('/thay-doi/avatar', 'UserController@updateAvatar')->name('user.avatar');
    Route::post('/thay-doi/mat-khau', 'UserController@updatePwd')->name('user.pwd.change');
});
Route::post('product/danh-gia', 'ProductController@rateProduct')->name('rate_product');
Route::post('/step-2', 'UserController@step2')->name('step2.post');
Route::get('/add-cart/ajax', 'CartController@addCartAjax')
    ->name('addCart.ajax');
Route::get('/hover-cart/ajax', 'CartController@hoverCartAjax')
    ->name('hoverCart.ajax');
Route::get('/change-cart/ajax', 'CartController@changeCartAjax')
    ->name('changeCart.ajax');
Route::get('/gio-hang/', 'CartController@getCart')
    ->name('getCart');
Route::get('/ket-noi/', 'ConnectController@getList')
    ->name('ketnoi');
Route::get('/ajax/ket-noi/', 'ConnectController@ajaxType')
    ->name('ketnoi.ajax.type');
Route::get('/search/ket-noi', 'ConnectController@search')
    ->name('ketnoi.search');
Route::get('/ket-noi/{slug}', 'ConnectController@getDetail')
    ->name('ketnoi.detail');
Route::get('/tin-tuc/{slug}', 'HomeController@getListPost')
    ->name('post.list');
Route::get('/bai-viet/{slug}', 'HomeController@getDetailPost')
    ->name('post.detail');

Route::get('/videos', 'HomeController@getListVideo')
    ->name('video.list');
Route::get('/images', 'HomeController@getListImage')
    ->name('image.list');
Route::get('/images/{name}', 'HomeController@getDetailImage')
    ->name('image.detail');
Route::get('/lien-he/', 'HomeController@getContact')
    ->name('contact.get');
Route::post('/lien-he', 'HomeController@postContact')
    ->name('contact.post');
Route::get('/shop', 'HomeController@listShop')
    ->name('shop.list');
Route::get('/shop/{username}', 'HomeController@showShop')->name('shop.chitiet');
Route::get('auto-rate', 'HomeController@autoRate');
Route::get('/{slug}', 'HomeController@getPageDetail')
    ->name('page.detail');
