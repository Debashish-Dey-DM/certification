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
// Route::get('/admin', 'App\Http\Controllers\AdminController@store');
Route::post('/admin', 'App\Http\Controllers\AdminController@store');
//create certificate
Route::post('/create-cert', 'App\Http\Controllers\CertificateController@store');
// get certificate
Route::get('/get-cert-all', 'App\Http\Controllers\CertificateController@get');
// get certificate by id
Route::get('/get-cert/{id}', 'App\Http\Controllers\CertificateController@getById');

// get certificate by service
Route::get('/get-cert-by-service/{service}', 'App\Http\Controllers\CertificateController@getByService');

Route::post('/image', 'App\Http\Controllers\CertificateController@imageUpload');