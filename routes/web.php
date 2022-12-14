<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\AdsController;
use App\Http\Controllers\WEB\AdvertiserController;
use App\Http\Controllers\WEB\CategoryController;
use App\Http\Controllers\WEB\FiltersController;
use App\Http\Controllers\WEB\MailTestController;
use App\Http\Controllers\WEB\TagsController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['prefix'=>'advertiser'],function (){
    Route::get('/all', [AdvertiserController::class, 'index'])->name('advertiser.index');
    Route::get('/show/{id}', [AdvertiserController::class, 'show'])->name('advertiser.edit');
    Route::put('/update/{id}', [AdvertiserController::class, 'update'])->name('advertiser.update');
    Route::delete('/delete/{id}', [AdvertiserController::class, 'delete'])->name('advertiser.delete');
    Route::get('/create', function () { return view('advertiser.create');})->name('advertiser.create');
    Route::post('/add', [AdvertiserController::class, 'store'])->name('advertiser.store');
    Route::get('/{id}/ads', [AdvertiserController::class, 'advertiserAds'])->name('advertiser.ads');
});

Route::group(['prefix'=>'ads'],function (){
    Route::get('/all', [AdsController::class, 'index'])->name('ads.index');
    Route::get('/show/{id}', [AdsController::class, 'show'])->name('ads.edit');
    Route::put('/update/{id}', [AdsController::class, 'update'])->name('ads.update');
    Route::delete('/delete/{id}', [AdsController::class, 'delete'])->name('ads.delete');
    Route::get('/create', [AdsController::class, 'create'])->name('ads.create');
    Route::post('/add', [AdsController::class, 'store'])->name('ads.store');
});

Route::group(['prefix'=>'tag'],function (){
    Route::get('/all', [TagsController::class, 'index'])->name('tags.index');
    Route::get('/show/{id}', [TagsController::class, 'show'])->name('tags.edit');
    Route::put('/update/{id}', [TagsController::class, 'update'])->name('tags.update');
    Route::get('/create', function () { return view('tags.create');})->name('tags.create');
    Route::post('/add', [TagsController::class, 'store'])->name('tags.store');
    Route::delete('/delete/{id}', [TagsController::class, 'delete'])->name('tags.delete');
});

Route::group(['prefix'=>'category'],function (){
    Route::get('/all', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/create', function () { return view('categories.create');})->name('category.create');
    Route::post('/add', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});

Route::group(['prefix'=>'filter'],function (){
    Route::get('/byCategory', [FiltersController::class, 'filterByCategory'])->name('filter.category');
    Route::get('/byTag', [FiltersController::class, 'filterByTag'])->name('filter.tag');
});
