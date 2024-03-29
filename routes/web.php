<?php

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

Route::get('/', "HomeController@index");
//Rss
Route::get('/feed/stores', 'FeedController@stores');
Route::get('/feed/coupons', 'FeedController@coupons');

// for static page
Route::get('/about-us', function () {
    return view('about-us');
})->name('aboutus');
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contactus');
/*Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy_policy');*/

Route::get('/privacy-policy', 'StaticPageController@privacyPolicy')->name('privacy_policy');
Route::get('/terms', 'StaticPageController@termsPage')->name('termsPage');
Route::get('/contact-us', 'ContactUsController@index')->name('contactus');
Route::get('/search/', 'WelcomeController@search');
//Route::get('/contact-us', 'StaticPageController@termsPage')->name('contactus');



//category
Route::get('/category', 'CategoryController@index');
Route::get('/category/{alias}', 'CategoryController@CategoriesDetail')->name('cat-detail');
Route::get('/category/{alias}/{offset}', 'CategoryController@getMoreStores');

//stores
Route::get('/stores/{alias}/coupons', 'StoresController@getDetails')->name('store-detail');
Route::get('/stores/more/{storeId}/{offset}', 'StoresController@getMoreCoupons')->name('store-detail-more');
Route::get('/stores/filter', 'StoresController@filterType')->name('store-filter');
//go coupons
Route::get('/coupons/detail/{goId}', 'StoresController@getGo')->name('coupon-detail');

//blogs
Route::get('/blogs', function() {
    return view('blogs.detail');
})->name('blogs-detail');



