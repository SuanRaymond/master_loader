<?php

//放入購物車
Route::post('/ShopCarAdd', 'shopCarAdd@index');
//重發驗證碼
Route::post('/VerificationReSend', 'verificationReSend@index');