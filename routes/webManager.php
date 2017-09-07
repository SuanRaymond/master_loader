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

//商品上傳 - 主頁
Route::get('/InsertShop', 'shop\commodity@index');

//商品上傳 - 資料寫入
Route::post('/InsertShop', 'shop\commodity@insert');

//圖片上傳
Route::get('/UpdateImages', 'shop\images\images@insert');
