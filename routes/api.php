<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/




Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::get('/', 'App\Http\Controllers\AuthController@index');
    Route::post('/', 'App\Http\Controllers\AuthController@store');
    Route::get('/{user}', 'App\Http\Controllers\AuthController@show');
    Route::put('/{user}', 'App\Http\Controllers\AuthController@update');
    Route::delete('/{user}', 'App\Http\Controllers\AuthController@delete');
    Route::put('/restore/{user}', 'App\Http\Controllers\AuthController@restore');
    Route::post('deleted', 'App\Http\Controllers\AuthController@deleted');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});


Route::group([

    //'middleware' => 'doctor',
    'middleware' => 'auth', 'verified',
    //'prefix' => 'doctors'

], function ($router) {

    Route::resource('doctors', 'App\Http\Controllers\DoctorController');

    Route::post('/{doctor}/update-status', 'App\Http\Controllers\DoctorController@updateStatus');
    Route::delete('/{doctor}', 'App\Http\Controllers\DoctorController@delete');
    Route::put('/restore/{doctor}', 'App\Http\Controllers\DoctorController@restore');
    Route::post('doctors/login', 'App\Http\Controllers\DoctorController@login');
    Route::post('doctors/logout', 'App\Http\Controllers\DoctorController@logout');
    Route::post('doctors/refresh', 'App\Http\Controllers\DoctorController@refresh');
    Route::post('doctors/me', 'App\Http\Controllers\DoctorController@me');
    Route::post('doctors/deleted', 'App\Http\Controllers\DoctorController@deleted');

});


Route::group([

    //'middleware' => 'api',
    //'prefix' => 'patients'

], function ($router) {

    Route::resource('patients', 'App\Http\Controllers\PatientController');

    Route::get('/trashed', 'App\Http\Controllers\PatientController@trashed');
    Route::put('/restore/{patient}', 'App\Http\Controllers\PatientController@restore');
    Route::post('login', 'App\Http\Controllers\PatientController@login');
    Route::post('logout', 'App\Http\Controllers\PatientController@logout');
    Route::post('refresh', 'App\Http\Controllers\PatientController@refresh');
    Route::post('me', 'App\Http\Controllers\PatientController@me');

});





Route::group([

    //'middleware' => 'api',
    'prefix' => 'appointements'

], function ($router) {
    Route::get('/upcomming_past', 'App\Http\Controllers\AppointementController@appointementUpcommingPast');
});

Route::group([

    //'middleware' => 'api',
    //'prefix' => 'specialties'

], function ($router) {

    Route::resource('specialties', 'App\Http\Controllers\SpecialtyController');

});

Route::group([

    //'middleware' => 'api',
    //'prefix' => 'pharmacies'

], function ($router) {

    Route::resource('pharmacies', 'App\Http\Controllers\PharmacyController');

});


Route::group([

    //'middleware' => 'api',
    //'prefix' => 'categories'

], function ($router) {

    Route::resource('categories', 'App\Http\Controllers\CategoryController');
});

Route::group([

    //'middleware' => 'api',
    'prefix' => 'settings'

], function ($router) {

    Route::post('/{id}', 'App\Http\Controllers\SettingController@update');
    Route::get('/{id}', 'App\Http\Controllers\SettingController@index');

});




