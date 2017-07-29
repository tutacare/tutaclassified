<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::auth();

//image category
Route::get('images/category/{image}', function($image = null)
{
    $file = Storage::get('category/' . $image);
    $mimetype = Storage::mimeType('category/' . $image);
    return response($file, 200)->header('Content-Type', $mimetype);
});
//image product
Route::get('images/product/{image}', function($image = null)
{
    $file = Storage::get('product/' . $image);
    $mimetype = Storage::mimeType('product/' . $image);
    return response($file, 200)->header('Content-Type', $mimetype);
});
Route::get('images/product/thumbnail/{image}', function($image = null)
{
    $file = Storage::get('product/thumbnail/' . $image);
    $mimetype = Storage::mimeType('product/thumbnail/' . $image);
    return response($file, 200)->header('Content-Type', $mimetype);
});

//image product
Route::get('images/user/{image}', function($image = null)
{
    $file = Storage::get('user/' . $image);
    $mimetype = Storage::mimeType('user/' . $image);
    return response($file, 200)->header('Content-Type', $mimetype);
});

Route::get('about-us', function()
{
  return view('page.about-us');
});

Route::get('term', function()
{
  return view('page.term');
});

Route::get('contact-us', function()
{
  return view('page.contact-us');
});

Route::get('search/key', 'SearchController@search');

Route::group(['middleware' => ['auth', 'admin']], function () {
  Route::resource('/dashboard/admin/province', 'Dashboard\Admin\ProvinceController');
  Route::resource('/dashboard/admin/city', 'Dashboard\Admin\CityController');
  //category for admin
  Route::resource('/dashboard/admin/category', 'Dashboard\Admin\CategoryController');
  Route::resource('/dashboard/admin/sub-category', 'Dashboard\Admin\SubCategoryController');
  //user for admin
  Route::resource('/dashboard/admin/user', 'Dashboard\Admin\UserController');
  Route::post('api/user', 'Dashboard\Admin\UserController@getData');
});

// API Management
Route::get('api/province', 'Dashboard\Admin\ProvinceController@getProvinceApi');
Route::get('api/city/{province_id}', 'Dashboard\Admin\CityController@getCityApiID');
Route::get('api/category', 'Dashboard\Admin\CategoryController@getCategoryApi');
Route::get('api/sub-category/{category_id}', 'Dashboard\Admin\SubCategoryController@getSubCategoryApiID');
// END API

//WEB
Route::get('ads/{slug}', 'AdsController@index');
Route::get('category', 'AdsController@getAllCategory');
Route::get('category/{slug}', 'AdsController@getCategory');
Route::get('category/{cat_slug}/{sub_slug}/sub', 'AdsController@getSubCategory');
Route::get('category/{cat_slug}/{city_slug}/city', 'AdsController@getCityCategory');
//city
//Route::get('city', 'AdsCityController@getAdsCity');
Route::get('city/{slug}', 'AdsCityController@getAdsCitySlug');
//Route::get('category/{cat_slug}/{sub_slug}/sub', 'AdsController@getSubCategory');
//Route::get('category/{cat_slug}/{city_slug}/city', 'AdsController@getCityCategory');
//END WEB

Route::group(['middleware' => ['auth', 'form']], function () {
  //post ads
  Route::resource('/post-ads', 'PostAdsController');
  //sundul
  Route::resource('sundul', 'SundulController');
  //dashboard
  Route::get('/dashboard/admin', 'Dashboard\Admin\AdminController@index');

  //product for admin
  Route::get('/dashboard/admin/product', 'Dashboard\Admin\ProductController@index');
  Route::get('/dashboard/admin/product/{id}/show', 'Dashboard\Admin\ProductController@show');
  Route::put('/dashboard/admin/product/save-mod/{id}', 'Dashboard\Admin\ProductController@saveMod');
  Route::delete('/dashboard/admin/product/{id}', 'Dashboard\Admin\ProductController@destroy');


  //user
  Route::get('/user/ads', 'ProfileController@ads');
  Route::get('/user/ads-pending', 'ProfileController@adsPending');
  Route::resource('/user/profile', 'ProfileController');
  Route::put('/user/profile/change-password/{id}', 'ProfileController@changePassword');

});

Route::group(['middleware' => 'auth'], function () {
  Route::resource('auth/legal-action', 'FormController');
});


//bottom user
Route::get('{username}', [
  'as' => 'user/{username}', 'uses' => 'ProfileController@getUser'
  ]);
