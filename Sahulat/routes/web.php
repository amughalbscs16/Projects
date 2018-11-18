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


Auth::routes();
Route::get('/about','PeopleProviderController@getAboutUs')->name('getAboutUs');

Route::get('/', 'PeopleProviderController@getHomeView' )->name('getHomeView');
Route::post('/', 'PeopleProviderController@postUserCountry')->name('postUserCountry');
Route::post('/country', 'PeopleProviderController@postServicesData')->name('postServicesData');
Route::get('/country/{service_id}/{provider_id}/{location}', 'PeopleProviderController@searchServiceProvider')->name('searchServiceProvider');
Route::group(['middleware' => 'auth'] , function(){
  Route::get('/store', 'ProviderController@getStore')->name('getStore');
  Route::get('/storeprofile/{serviceid}/{providerid}', 'ProviderController@getStoreProfile')->name('getStoreProfile');
  Route::get('/plumber', 'ProviderController@getPlumber')->name('getPlumber');
  Route::get('/plumberprofile/{serviceid}/{providerid}', 'ProviderController@getPlumberProfile')->name('getPlumberProfile');
  Route::get('/laundry', 'ProviderController@getLaundry')->name('getLaundry');
  Route::get('/laundryprofile/{serviceid}/{providerid}', 'ProviderController@getLaundryProfile')->name('getLaundryProfile');
  Route::get('/mechanic', 'ProviderController@getMechanic')->name('getMechanic');
  Route::get('/mechanicprofile/{serviceid}/{providerid}', 'ProviderController@getMechanicProfile')->name('getMechanicProfile');
  Route::get('/carpenter', 'ProviderController@getCarpenter')->name('getCarpenter');
  Route::get('/carpenterprofile/{serviceid}/{providerid}', 'ProviderController@getCarpenterProfile')->name('getCarpenterProfile');
  Route::get('/electrician', 'ProviderController@getElectrician')->name('getElectrician');
  Route::get('/electricianprofile/{serviceid}/{providerid}', 'ProviderController@getElectricianProfile')->name('getElectricianProfile');

  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
  
  Route::group(['prefix' => 'user'], function(){
    Route::get('/profile', 'PeopleController@getUserProfile')->name('getUserProfile');
    Route::post('/profile', 'PeopleController@postUserProfile')->name('postUserProfile');
    Route::post('/rating','PeopleController@postServiceRatings')->name('postServiceRatings');
  });

  Route::group(['prefix' => 'provider'], function(){
    Route::get('/profile', 'ProviderController@getProviderProfile')->name('getProviderProfile');
    Route::post('/profile', 'ProviderController@postProviderProfile')->name('postProviderProfile');
    Route::get('/service', 'ProviderController@getServiceProvider')->name('getServiceProvider');
    Route::post('/service', 'ProviderController@postServiceProvider')->name('postServiceProvider');
    Route::get('/deleteservice/{serviceid}/{providerid}', 'ProviderController@deleteServiceProvider')->name('deleteServiceProvider');
  });

  Route::group(['prefix' => 'admin'], function(){
    Route::get('/service', 'PeopleProviderController@getServiceAdmin')->name('getServiceAdmin');
    Route::post('/service', 'PeopleProviderController@postServiceAdmin')->name('postServiceAdmin');
    Route::post('/services', 'PeopleProviderController@editServiceAdmin')->name('editServiceAdmin');
    Route::get('/deleteservice/{serviceid}', 'PeopleProviderController@deleteServiceAdmin')->name('deleteServiceAdmin');
    Route::get('/serviceanalysis', 'PeopleProviderController@getServiceAnalysis')->name('getServiceAnalysis');

  });


});
