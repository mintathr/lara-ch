<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jemat\UploadController;
use App\Http\Controllers\jemat\ProfileController;
use App\Http\Controllers\sysadmin\JematController;

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

Route::get('changePassword', [ChangePasswordController::class, 'index'])->name('changePassword');
Route::post('changePassword', [ChangePasswordController::class, 'changePassword']);
Route::get('changePasswordExp', [ChangePasswordController::class, 'show'])->name('changePasswordExp');
Route::post('changePasswordExp', [ChangePasswordController::class, 'changePasswordExp']);

Route::prefix('Jemat')->group(function () {
    Route::group(['middleware' => 'is.jemat'], function () {
        ########## ==PARAM DATE= ##########
        Route::get('home', [HomeController::class, 'handleJemat'])->name('jemat.route');
        Route::patch('home/{id}', [HomeController::class, 'updateJemat'])->name('jemat.update');
        Route::get('upload', [UploadController::class, 'create'])->name('jemat.upload.create');
        Route::post('upload', [UploadController::class, 'store'])->name('jemat.upload.store');
        Route::delete('upload', [UploadController::class, 'delete'])->name('jemat.upload.delete');
        Route::get('profile', [ProfileController::class, 'index'])->name('jemat.profile');
        Route::get('profile/download/{temporaryfile}', [ProfileController::class, 'getDownload']);
        
    });
});

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
