<?php

//主頁面
Route::get('/', 'profile@index');
//主頁面
Route::get('/Profile', 'profile@index');

//登入驗證 頁面
Route::get('/login', 'login@index');
//登入驗證 功能
Route::post('/login', 'login@check');


//商品上傳
Route::get('/InsertShop', 'shop\commodity@insert');


