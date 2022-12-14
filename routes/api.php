<?php

use App\Http\Controllers\API\AdsController;
use App\Http\Controllers\API\AdvertiserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FiltersController;
use App\Http\Controllers\API\MailTestController;
use App\Http\Controllers\API\TagsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'ads'],function (){
    Route::get('/all', [AdsController::class, 'index']);
    Route::get('/show/{id}', [AdsController::class, 'show']);
    Route::post('/add', [AdsController::class, 'store']);
    Route::put('/update/{id}', [AdsController::class, 'update']);
    Route::delete('/delete/{id}', [AdsController::class, 'delete']);
});

Route::group(['prefix'=>'advertiser'],function (){
    Route::get('/all', [AdvertiserController::class, 'index']);
    Route::get('/show/{id}', [AdvertiserController::class, 'show']);
    Route::get('/{id}/ads', [AdvertiserController::class, 'advertiserAds']);
    Route::post('/add', [AdvertiserController::class, 'store']);
    Route::put('/update/{id}', [AdvertiserController::class, 'update']);
    Route::delete('/delete/{id}', [AdvertiserController::class, 'delete']);
});


Route::group(['prefix'=>'category'],function (){
    Route::get('/all', [CategoryController::class, 'index']);
    Route::get('/show/{id}', [CategoryController::class, 'show']);
    Route::post('/add', [CategoryController::class, 'store']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
});

Route::group(['prefix'=>'tag'],function (){
    Route::get('/all', [TagsController::class, 'index']);
    Route::get('/show/{id}', [TagsController::class, 'show']);
    Route::post('/add', [TagsController::class, 'store']);
    Route::put('/update/{id}', [TagsController::class, 'update']);
    Route::delete('/delete/{id}', [TagsController::class, 'delete']);
});

Route::group(['prefix'=>'filter'],function (){
    Route::get('/byCategory/{id}', [FiltersController::class, 'filterByCategory']);
    Route::get('/byTag/{id}', [FiltersController::class, 'filterByTag']);

});

Route::post('sendmail', [MailTestController::class, 'check']);
