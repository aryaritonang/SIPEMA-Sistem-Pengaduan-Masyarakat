<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIComplaintController;

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

Route::resource('complaints', 'APIComplaintController');

Route::resource('register', 'APIRegisterController');


Route::get('login', 'APILoginController@index');
Route::post('login/checklogin', 'APILoginController@checklogin');
Route::get('login/successlogin', 'APILoginController@successlogin');

Route::get('register', 'APIRegisterController@index');
Route::post('register', 'APIRegisterController@checkregister');
Route::get('register/successregister', 'APIRegisterController@successregister');
