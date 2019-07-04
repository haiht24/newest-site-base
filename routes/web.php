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

Route::get('/detail', function () {
    return view('store-detail');
});

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
Route::get('/category/{alias}', 'CategoryController@CategoriesDetail');
Route::get('/category/{alias}/{offset}', 'CategoryController@getMoreStores');

//stores
Route::get('/stores/{alias}-coupons', 'StoresController@getDetails')->name('store-detail');

