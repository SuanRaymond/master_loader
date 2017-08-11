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

Route::get('/', 'home@index');//首頁
Route::get('/detail', 'productDetail@index');//商品明細頁

//登入
Route::get('/Login', 'login@index');
//登入 驗證
Route::post('/Login', 'login@check');

//註冊
Route::get('/Registered', 'registered@index');
//註冊 驗證
Route::post('/Registered', 'registered@check');

//登出
Route::get('/Logout', 'logout@index');

Route::get('/shopCar', 'shopCar@index');//購物車
//修改密碼
Route::get('/CPwd', 'changePassword@index');
//修改密碼 驗證
Route::post('/CPwd', 'changePassword@check');//修改密碼

Route::get('/MFire', 'memberProfile@index');//會員明細
//修改會員資料
Route::get('/CMFire', 'changeMemberProfile@index');
//修改會員資料 驗證
Route::post('/CMFire', 'changeMemberProfile@check');