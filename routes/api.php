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
    Route::get('/', 'App\Http\Controllers\DoctorController@index');

    // Créer un nouveau docteur
    Route::post('/', 'App\Http\Controllers\DoctorController@store');

    // Afficher un docteur spécifique
    Route::get('/{doctor}', 'App\Http\Controllers\DoctorController@show');

    // Mettre à jour un docteur spécifique
    Route::put('/{doctor}', 'App\Http\Controllers\DoctorController@update');

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
    'prefix' => 'patients'

], function ($router) {

    // Afficher tous les patients
    Route::get('/', 'App\Http\Controllers\PatientController@index');

    // Créer un nouveau patient
    Route::post('/', 'App\Http\Controllers\PatientController@store');

    // Afficher un patient spécifique
    Route::get('/{patient}', 'App\Http\Controllers\PatientController@show');

    // Mettre à jour un patient spécifique
    Route::put('/{patient}', 'App\Http\Controllers\PatientController@update');

    // Supprimer un patient spécifique (soft delete)
    Route::delete('/{patient}', 'App\Http\Controllers\PatientController@delete');

    // Afficher tous les patients supprimés (soft delete)
    Route::get('/trashed', 'App\Http\Controllers\PatientController@trashed');

    // Restaurer un patient supprimé (soft delete)
    Route::put('/restore/{patient}', 'App\Http\Controllers\PatientController@restore');

    Route::post('login', 'App\Http\Controllers\PatientController@login');
    Route::post('logout', 'App\Http\Controllers\PatientController@logout');
    Route::post('refresh', 'App\Http\Controllers\PatientController@refresh');
    Route::post('me', 'App\Http\Controllers\PatientController@me');

});
