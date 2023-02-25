<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\sysadmin\JematController;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/ourteam', function () {
    return view('our_team');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('Admin')->group(function () {
    Route::group(['middleware' => 'is.admin'], function () {
        ########## ==PARAM DATE= ##########
        Route::get('home', [HomeController::class, 'handleAdmin'])->name('admin.route');
        Route::get('jemaat', [JematController::class, 'index'])->name('admin.jemat');
        Route::get('jemaat/edit/{id}', [JematController::class, 'edit'])->name('admin.jemat.edit');
        Route::patch('jemaat/edit/{id}', [JematController::class, 'update'])->name('admin.jemat.update');
        Route::get('jemaat/scheduleHbd', [JematController::class, 'cekHbd'])->name('admin.jemat.hbd');
    });
});
