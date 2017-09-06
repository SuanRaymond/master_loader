<?php

//取得圖片資訊
Route::post('/GetImages', 'images@index');

//上傳圖片資訊
Route::post('/InsertImages', 'images@insert');