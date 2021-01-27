<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Prakerin;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\PrakerinController;
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

// Route::get('admin', function () {
//     return view('admin.pages');

//  });

Route::get('login',function () {
    return view('login');
});
Auth::routes();



// Route::get('test', function () {
//     return view('pages');

//  });

// Route::group(['prefix' =>'admin', 'middleware' =>['auth']],
// function(){
//     Route::get('/', function()
//     {
//         return view('admin.index');
//     });
//     Route::get('/provinsi', function()
//     {
//         return view('admin.provinsi.index');
//     });

//     Route::get('/kota', function()
//     {
//         return view('admin.kota.index');
//     });
//     Route::get('/kecamatan', function()
//     {
//         return view('admin.kecamatan.index');
//     });
//     Route::get('/kelurahan', function()
//     {
//         return view('admin.kelurahan.index');
//     });
//     Route::get('/rw', function()
//     {
//         return view('admin.rw.index');
//     });

//     Route::get('/kasus', function()
//     {
//         return view('admin.kasus.index');
//     });

// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){

    Route::get('/',[DashboardController::class,'index']) ->name('admin');

    Route::resource('provinsi',ProvinsiController::class);
    Route::resource('kota',KotaController::class);
    Route::resource('kecamatan',KecamatanController::class);
    Route::resource('kelurahan',KelurahanController::class);
    Route::resource('rw',RwController::class);
    Route::resource('prakerin',PrakerinController::class);

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    