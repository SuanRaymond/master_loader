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

//修改密碼
Route::get('/CPwd', 'changePassword@index');
//修改密碼 驗證
Route::post('/CPwd', 'changePassword@check');//修改密碼

Route::get('/MFire', 'memberProfile@index');//會員明細
//修改會員資料
Route::get('/CMFire', 'changeMemberProfile@index');
//修改會員資料 驗證
Route::post('/CMFire', 'changeMemberProfile@check');
//驗證碼驗證
Route::get('/Check', 'verificationCheck@index');
//驗證碼驗證 驗證
Route::post('/Check', 'verificationCheck@check');



//購物網
Route::get('/Shop', 'Shop\homeShop@index');
//商品詳細
Route::get('/ShopDetail', 'Shop\detail@index');
//購物車
Route::get('/ShopCar', 'Shop\shopCar@index');
//清除購物車
Route::get('/ClearBuy', 'Shop\clearShopCarList@index');
//結算
Route::get('/Buy', 'Shop\buy@index');
Route::get('/PassBuy', 'Shop\passBuy@index');
//分類頁
Route::get('/Sort', 'Shop\sortPage@index');
//付款
Route::get('/Send', 'Shop\commodityOrderAdd@index');



//任務網
Route::get('/Task', 'Task\homeTask@index');
//每天簽到
Route::get('/Sign', 'Task\signEveryDay@index');
//每日小遊戲
Route::get('/SGame', 'Task\smallGame@index');

Route::get('/PGame', 'Task\smallGame@pick');






