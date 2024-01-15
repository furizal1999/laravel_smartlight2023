<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(App\Http\Controllers\LoginController::class)->group(function (){
    Route::get('/', 'index')->name("user.auth");
    Route::post('/login/process', 'login')->name("user.auth.login");
    Route::get('/logout/process', 'logout')->name("user.auth.logout");
    // Route::post('/insert-request/{id_user}/{lamp_to}/{lamp_status}/{status_data}', 'insertRequest')->name("user.auth.login.insert");
});

Route::controller(App\Http\Controllers\LightControlController::class)->middleware("checkuseraccess")->group(function (){
    Route::get('/user/control/light', 'index')->name("user.control.light");
    Route::post('/insert-request/{id_user}/{lamp_to}/{lamp_status}/{status_data}', 'insertRequest')->name("user.control.light.insert");
});