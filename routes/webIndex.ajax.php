<?php

//放入購物車
Route::post('/ShopCarAdd', 'shopCarAdd@index');
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





