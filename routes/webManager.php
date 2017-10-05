<?php

//主頁面
Route::get('/', 'profile@index');
//主頁面
Route::get('/Profile', 'profile@index');

//登入驗證 頁面
Route::get('/login', 'login@index');
//登入驗證 功能
Route::post('/login', 'login@check');

//登出
Route::get('/logout', 'logout@index');

//帳號列表
Route::get('/AccountList', 'account\accountList@index');

//帳號交易列表
Route::get('/TransactionList', 'account\transactionList@index');

//取得購物報表
Route::get('/ShopList', 'report\shopOrderList@index');

//取得藏蛋報表
Route::get('/RebateList', 'report\rebateList@index');

//取得返利報表
Route::get('/BackList', 'report\backList@index');

//取得點數報表
Route::get('/TradeList', 'report\tradeList@index');

//商品上傳 - 主頁
Route::get('/InsertShop', 'shop\commodity@index');

//商品上傳 - 資料寫入
Route::post('/InsertShop', 'shop\commodity@insert');

//商品更新 - 資料寫入
Route::get('/UpdateShop', 'shop\commodityUpdate@index');

//商品更新 - 資料寫入
Route::post('/UpdateShop', 'shop\commodityUpdate@update');

//圖片上傳
Route::get('/UpdateImages', 'shop\images\images@insert');
