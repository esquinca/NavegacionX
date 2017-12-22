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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/geolocation', 'GeoLocationController@index')->name('geolocation');
Route::get('/survey', 'SurveyController@index')->name('survey');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/Configuration', 'ConfigurationController@index')->name('Configuration');
Route::get('/data_consumption', 'DataConsumptionController@index')->name('data_consumption');

Route::post('/data_nationality', 'SurveyController@show');
Route::post('/data_ages', 'SurveyController@show_age');
Route::post('/data_tours', 'SurveyController@show_tours');
Route::post('/data_domains', 'SurveyController@show_domains');

Route::post('/data_consumption_unity', 'DataConsumptionController@show');
Route::post('/data_consumption_top_month', 'DataConsumptionController@show_top');
Route::post('/data_consumption_day_all', 'DataConsumptionController@show_day');

Route::post('/data_consumption_up_month', 'DataConsumptionController@show_month_up');
Route::post('/data_consumption_down_month', 'DataConsumptionController@show_month_down');

Route::post('/profile_up', 'ProfileController@update');
Route::post('/profile_up_pass', 'ProfileController@updatepass');
