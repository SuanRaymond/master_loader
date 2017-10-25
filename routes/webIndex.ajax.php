<?php

//放入購物車
Route::post('/ShopCarAdd', 'shopCar@add');
//拿出購物車
Route::post('/ShopCarRem', 'shopCar@rem');
//刪除購物車
Route::post('/ShopCarDel', 'shopCar@del');
//重發驗證碼
Route::post('/VerificationReSend', 'verificationReSend@index');
//購買藏蛋
Route::post('/Rebate', 'rebateAdd@index');
//每日簽到
Route::post('/SignSend', 'signSend@index');
//每日小遊戲
Route::post('/GameSend', 'signSend@game');
//大頭照上傳
Route::post('/PhotoSend', 'photoSend@index');
//購物車轉結算
Route::post('/SCAS', 'shopCarAddSession@index');
//地址暫存
Route::post('/CAddressS', 'addressSession@index');
//地址刪除
Route::post('/CAddressD', 'addressSession@deleteA');
//地址暫存 選擇
Route::post('/SAddress', 'selectAddrSession@index');
//取得金流單
Route::post('/PayCardList', 'payCardList@index');




