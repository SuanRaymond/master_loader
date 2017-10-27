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
//上傳頭像 頁面
Route::get('/PUpload', 'photoUpload@index');
//訂單查詢 頁面
Route::get('/BuyList', 'memberBuyList@index');

/***** 地址 ******/
//收貨地址管理
Route::get('/AddressList', 'Account\Address\address@index');
//收貨地址管理－新增
Route::get('/AddressListAdd', 'Account\Address\address@add');
//收貨地址管理－修改
Route::get('/AddressListCha', 'Account\Address\address@change');
//收貨地址管理－刪除
Route::get('/AddressListDel', 'Account\Address\address@delete');
//收貨地址管理－修改預設
Route::get('/AddressListMas', 'Account\Address\address@setMaster');
//收貨地址管理－選取
Route::get('/AddressListPic', 'Account\Address\address@pick');
/***** 地址 ******/

//信用卡
Route::get('/creditCard', 'Shop\sendCreditCard@index');

//購物網
Route::get('/Shop', 'Shop\homeShop@index');
//商品詳細
Route::get('/ShopDetail', 'Shop\detail@index');
//購物車
Route::get('/ShopCar', 'Shop\shopCar@index');
//清除購物車
//??
Route::get('/ClearBuy', 'Shop\clearShopCarList@index');
//結算
Route::any('/Buy', 'Shop\buy@index');
// Route::get('/Buy', 'Shop\buy@index');
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






