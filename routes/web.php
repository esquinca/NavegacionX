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

Route::group(['middleware' => ['auth']], function() {

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

  Route::get('/geoLoc', 'GeoLocationController@xmlProc');

  Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
  Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);

  Route::post('/data_config', 'ProfileController@show');
  Route::post('/data_edit_config', 'ConfigurationController@store');
  Route::post('/data_menu_config', 'ConfigurationController@showMenu');
  Route::post('/data_create_user_config', 'ConfigurationController@create');
  Route::post('/data_edit_user_config', 'ConfigurationController@edit');

  Route::post('/data_edit_priv_config', 'ConfigurationController@update_priv');
  Route::post('/data_edit_menu_config', 'ConfigurationController@update_menu');
  Route::post('/data_delete_config', 'ConfigurationController@destroy');
});
