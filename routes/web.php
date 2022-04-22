<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//START ADMIN ROUTE
@include('admin.php');
//END ADMIN ROUTE

//START SHOP ROUTE
@include('shop.php');
//END SHOP ROUTE

//START USER ROUTE
@include('user.php');
//END USER ROUTE


