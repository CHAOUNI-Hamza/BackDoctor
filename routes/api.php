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

    'prefix' => 'auth'

], function ($router) {

    Route::get('/', 'App\Http\Controllers\AuthController@index');
    Route::post('/', 'App\Http\Controllers\AuthController@store');
    Route::get('/{user}', 'App\Http\Controllers\AuthController@show');
    Route::post('/{id}/update', 'App\Http\Controllers\AuthController@update');
    Route::delete('/{user}', 'App\Http\Controllers\AuthController@delete');
    Route::put('/restore/{user}', 'App\Http\Controllers\AuthController@restore');
    Route::post('deleted', 'App\Http\Controllers\AuthController@deleted');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

    Route::get('/sociale/{provider}', 'App\Http\Controllers\AuthController@redirectToProvider');
    Route::get('/sociale/{provider}/callback', 'App\Http\Controllers\AuthController@handleProviderCallback');

    // security
    Route::post('/forgot-password-admin', 'App\Http\Controllers\AuthController@forgotpassword'); 
    Route::post('/reset-password-admin', 'App\Http\Controllers\AuthController@resetpassword'); 

});


Route::group([

    //'prefix' => 'doctors'

], function ($router) {

    Route::resource('doctors', 'App\Http\Controllers\DoctorController');

    Route::post('doctors/{id}/update-status', 'App\Http\Controllers\DoctorController@updateStatus');

    Route::delete('/{doctor}', 'App\Http\Controllers\DoctorController@delete');
    Route::put('/restore/{doctor}', 'App\Http\Controllers\DoctorController@restore');
    Route::post('doctors/login', 'App\Http\Controllers\DoctorController@login');
    Route::post('doctors/logout', 'App\Http\Controllers\DoctorController@logout');
    Route::post('doctors/refresh', 'App\Http\Controllers\DoctorController@refresh');
    Route::post('doctors/me', 'App\Http\Controllers\DoctorController@me');
    Route::post('doctors/deleted', 'App\Http\Controllers\DoctorController@deleted');
    Route::post('doctors/change_password', 'App\Http\Controllers\DoctorController@changePassword');

});


Route::group([

    //'prefix' => 'patients'

], function ($router) {

    Route::resource('patients', 'App\Http\Controllers\PatientController');

    Route::post('patients/{id}/update-status', 'App\Http\Controllers\PatientController@updateStatus');

    Route::get('/trashed', 'App\Http\Controllers\PatientController@trashed');
    Route::put('/restore/{patient}', 'App\Http\Controllers\PatientController@restore');
    Route::post('login', 'App\Http\Controllers\PatientController@login');
    Route::post('logout', 'App\Http\Controllers\PatientController@logout');
    Route::post('refresh', 'App\Http\Controllers\PatientController@refresh');
    Route::post('me', 'App\Http\Controllers\PatientController@me');

});





Route::group([

    'prefix' => 'appointements'

], function ($router) {
    Route::get('/upcomming_past', 'App\Http\Controllers\AppointementController@index');

    /* Doctor */
    Route::get('/appointement_doctor', 'App\Http\Controllers\Doctors\AppointementDoctorController@index');
    /* Doctor */
});

Route::group([

    //'prefix' => 'specialties'

], function ($router) {

    Route::post('specialties/{specialty}', 'App\Http\Controllers\SpecialtyController@update');
    Route::resource('specialties', 'App\Http\Controllers\SpecialtyController');

});

Route::group([

    //'prefix' => 'pharmacies'

], function ($router) {

    Route::post('pharmacies/{pharmacy}', 'App\Http\Controllers\PharmacyController@update');
    Route::resource('pharmacies', 'App\Http\Controllers\PharmacyController');

});


Route::group([

    //'prefix' => 'categories'

], function ($router) {

    Route::post('categories/{category}', 'App\Http\Controllers\CategoryController@update');
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
});

Route::group([

    'prefix' => 'settings'

], function ($router) {

    Route::post('/{id}', 'App\Http\Controllers\SettingController@update');
    Route::get('/{id}', 'App\Http\Controllers\SettingController@index');

});










