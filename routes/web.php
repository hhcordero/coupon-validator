<?php

Route::redirect('/', '/coupon', 301);
Route::get('/coupon', 'CouponController@create')->name('coupon');
Route::get('/coupon/{id}/{hash}', 'CouponController@download')->name('coupon.download');
Route::post('/coupon', 'CouponController@store');
