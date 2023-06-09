<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    // Afficher tous les docteurs
    Route::get('/', 'App\Http\Controllers\AuthController@index');

    // Créer un nouveau docteur
    Route::post('/', 'App\Http\Controllers\AuthController@store');

    // Afficher un docteur spécifique
    Route::get('/{user}', 'App\Http\Controllers\AuthController@show');

    // Mettre à jour un docteur spécifique
    Route::put('/{user}', 'App\Http\Controllers\AuthController@update');

    // Supprimer un docteur spécifique (soft delete)
    Route::delete('/{user}', 'App\Http\Controllers\AuthController@delete');

    // Restaurer un docteur supprimé (soft delete)
    Route::put('/restore/{user}', 'App\Http\Controllers\AuthController@restore');

    Route::post('deleted', 'App\Http\Controllers\AuthController@deleted');

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});


Route::group([

    //'middleware' => 'doctor',
    'prefix' => 'doctors'

], function ($router) {

    // Afficher tous les docteurs
    Route::get('/', 'App\Http\Controllers\DoctorController@doctors');

    // Créer un nouveau docteur
    Route::post('/', 'App\Http\Controllers\DoctorController@store');

    // Afficher un docteur spécifique
    Route::get('/{doctor}', 'App\Http\Controllers\DoctorController@show');

    // Mettre à jour un docteur spécifique
    Route::put('/{doctor}', 'App\Http\Controllers\DoctorController@update');
    Route::post('/{doctor}/update-status', 'App\Http\Controllers\DoctorController@updateStatus');

    // Supprimer un docteur spécifique (soft delete)
    Route::delete('/{doctor}', 'App\Http\Controllers\DoctorController@delete');

    // Restaurer un docteur supprimé (soft delete)
    Route::put('/restore/{doctor}', 'App\Http\Controllers\DoctorController@restore');

    Route::post('login', 'App\Http\Controllers\DoctorController@login');
    Route::post('logout', 'App\Http\Controllers\DoctorController@logout');
    Route::post('refresh', 'App\Http\Controllers\DoctorController@refresh');
    Route::post('me', 'App\Http\Controllers\DoctorController@me');
    Route::post('deleted', 'App\Http\Controllers\DoctorController@deleted');

});


Route::group([

    //'middleware' => 'api',
    //'prefix' => 'patients'

], function ($router) {

    Route::resource('patients', 'App\Http\Controllers\PatientController');

    /*Route::get('/', 'App\Http\Controllers\PatientController@patients');

    Route::post('/', 'App\Http\Controllers\PatientController@store');

    Route::get('/{patient}', 'App\Http\Controllers\PatientController@show');

    Route::put('/{patient}', 'App\Http\Controllers\PatientController@update');

    Route::delete('/{patient}', 'App\Http\Controllers\PatientController@delete');*/

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

    // Afficher tous les appointement Upcomming
    Route::get('/upcomming_past', 'App\Http\Controllers\AppointementController@appointementUpcommingPast');

});

Route::group([

    //'middleware' => 'api',
    //'prefix' => 'specialties'

], function ($router) {

    Route::resource('specialties', 'App\Http\Controllers\SpecialtyController');

    /*Route::get('/', 'App\Http\Controllers\SpecialtyController@index');
    Route::post('/', 'App\Http\Controllers\SpecialtyController@store');
    Route::post('/{specialty}', 'App\Http\Controllers\SpecialtyController@update');
    Route::get('/{specialty}', 'App\Http\Controllers\SpecialtyController@show');
    Route::delete('/{specialty}', 'App\Http\Controllers\SpecialtyController@destroy');*/

});

Route::group([

    //'middleware' => 'api',
    //'prefix' => 'pharmacies'

], function ($router) {

    Route::resource('pharmacies', 'App\Http\Controllers\PharmacyController');

    /*Route::get('/', 'App\Http\Controllers\PharmacyController@index');
    Route::post('/', 'App\Http\Controllers\PharmacyController@store');
    Route::post('/{pharmacy}', 'App\Http\Controllers\PharmacyController@update');
    Route::get('/{pharmacy}', 'App\Http\Controllers\PharmacyController@show');
    Route::delete('/{pharmacy}', 'App\Http\Controllers\PharmacyController@destroy');*/

});


Route::group([

    //'middleware' => 'api',
    //'prefix' => 'categories'

], function ($router) {

    Route::resource('categories', 'App\Http\Controllers\CategoryController');

   /* Route::get('/', 'App\Http\Controllers\CategoryController@index');
    Route::post('/', 'App\Http\Controllers\CategoryController@store');
    Route::post('/{category}', 'App\Http\Controllers\CategoryController@update');
    Route::get('/{category}', 'App\Http\Controllers\CategoryController@show');
    Route::delete('/{category}', 'App\Http\Controllers\CategoryController@destroy');*/

});

Route::group([

    //'middleware' => 'api',
    'prefix' => 'settings'

], function ($router) {

    Route::post('/{id}', 'App\Http\Controllers\SettingController@update');
Route::get('/{id}', 'App\Http\Controllers\SettingController@index');

});




