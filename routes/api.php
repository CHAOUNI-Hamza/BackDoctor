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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('doctors')->group(function () {

    // Afficher tous les docteurs
    Route::get('/', 'DoctorController@index');

    // Créer un nouveau docteur
    Route::post('/', 'DoctorController@store');

    // Afficher un docteur spécifique
    Route::get('/{id}', 'DoctorController@show');

    // Mettre à jour un docteur spécifique
    Route::put('/{id}', 'DoctorController@update');

    // Supprimer un docteur spécifique (soft delete)
    Route::delete('/{id}', 'DoctorController@softDelete');

    // Afficher tous les docteurs supprimés (soft delete)
    Route::get('/deleted', 'DoctorController@deleted');

    // Restaurer un docteur supprimé (soft delete)
    Route::put('/restore/{id}', 'DoctorController@restore');

});
