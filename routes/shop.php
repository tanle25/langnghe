<?php
Route::get('shop/login', 'Auth\ShopLoginController@showLoginForm')->name('shop.login.get');
Route::post('shop/login', 'Auth\ShopLoginController@login')->name('shop.login.post');
Route::get('shop/dang-ky', 'UserController@registerShop')->name('shop.register');
Route::post('shop/dang-ky', 'UserController@storeShop')->name('shop.register.post');
Route::middleware(['auth:shop'])->prefix('shop')->group(function () {
    //Product
    Route::resource('product', 'Shop\ProductController');
    Route::post('/mutile-update/product', 'Shop\ProductController@mutileUpdate')
        ->name('mutileUpdate.product');
    Route::resource('product-views', 'Shop\UserViewController');
    Route::resource('product-rate', 'Shop\ProductRateController');
    Route::resource('shop-rate', 'Shop\ShopRateController');
    Route::resource('product-like', 'Shop\ProductLikeController');
    Route::resource('shop-like', 'Shop\ShopLikeController');
    Route::resource('product-ask', 'Shop\ProductAskController');
    Route::resource('shop-ask', 'Shop\ShopAskController');
    Route::resource('doc', 'Shop\ShopDocController');
    Route::post('/mutile-update/doc', 'Shop\ShopDocController@mutileUpdate')->name('mutileUpdate.doc');
    Route::get('/don-hang', 'Shop\HomeController@listCheckOut')->name('shop.checkout');

    Route::get('/don-hang/{code}', 'Shop\HomeController@checkoutDetail')->name('shop.checkout.detail');
    Route::post('/don-hang/{code}', 'Shop\HomeController@checkoutDetail')->name('shop.checkout.update');

    Route::get('/yeu-cau', 'Shop\HomeController@listReq')->name('shop.req');
});