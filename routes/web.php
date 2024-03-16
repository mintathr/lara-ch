<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DependantController;
use App\Http\Controllers\jemat\UploadController;
use App\Http\Controllers\jemat\ProfileController;
use App\Http\Controllers\PelkatAbsenceController;
use App\Http\Controllers\pka\pkaDocController;
use App\Http\Controllers\sysadmin\JematController;
use App\Http\Controllers\skklweb\WebSkklController;
use App\Http\Controllers\sysadmin\DocumentController;
use App\Http\Controllers\ppmj\PpmjDocumentationController;
use App\Http\Controllers\pt\{PtHomeController, PtJematController};
use App\Http\Controllers\sysadmin\WebConfigController;

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
// webskkl
Route::get('/', [WebSkklController::class, 'index'])->name('webskkl');
Route::get('diaken', [WebSkklController::class, 'diaken'])->name('webskkl.diaken');
Route::get('penatua', [WebSkklController::class, 'penatua'])->name('webskkl.penatua');
Route::get('komisi-il', [WebSkklController::class, 'komisiIl'])->name('webskkl.komisi.il');
Route::get('pelkat-pt', [WebSkklController::class, 'pelkatPt'])->name('webskkl.pelkat.pt');

Route::get('ppmj', [PpmjDocumentationController::class, 'index'])->name('ppmj');
Route::get('ppmj/edit/{id}', [PpmjDocumentationController::class, 'edit'])->name('ppmj.edit');

Route::get('/login', function () {
    return view('auth.login');
});


// pka
Route::get('pka/dashboard', [pkaDocController::class, 'dashboard'])->name('pka.dashboard');
Route::get('pka', [pkaDocController::class, 'index'])->name('pka.index');
Route::get('pka/show/{pkadoc:no_pka}', [pkaDocController::class, 'show'])->name('pka.show');


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

// absence
Route::get('absensi-pt', [PelkatAbsenceController::class, 'absensiPt'])->name('absence.pt');
Route::get('absensi-pa', [PelkatAbsenceController::class, 'absensiPa'])->name('absence.pa');
Route::post('absensi', [PelkatAbsenceController::class, 'store'])->name('absence.pelkat');

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
        Route::post('profile/uploadPhoto', [ProfileController::class, 'updatePhoto'])->name('jemat.update.photo'); 
        Route::get('profile/download/{temporaryfile}', [ProfileController::class, 'getDownload']);
        Route::get('profile/{jemat:nama_keluarga}', [HomeController::class, 'editAlamat']); 
        Route::patch('profile/{id}', [HomeController::class, 'updateAlamat'])->name('jemat.update.alamat');
        
        Route::get('getDistricts/{id}', [DependantController::class, 'getDistricts']);
        Route::get('getVillages/{id}', [DependantController::class, 'getVillages']);
    });
});

########## PT TERUNA ##########
Route::prefix('PT')->group(function () {
    Route::group(['middleware' => 'is.teruna'], function () {
        Route::get('home', [PtHomeController::class, 'index'])->name('pt.route');
        #Route::get('absensi', [PtHomeController::class, 'index'])->name('pt.route');
        Route::get('teruna', [PtJematController::class, 'teruna'])->name('pt.teruna');
        Route::get('pengurus-pelayan', [PtJematController::class, 'pelayanPengurusTeruna'])->name('pt.pengurus');
        #Route::post('pengurus-pelayan', [PtJematController::class, 'pelayan'])->name('pt.pengurus.post');
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
       /*  Route::get('jemaat/searchHbd', function () {
            return view('test');
        }); */
        Route::get('jemaat/searchHbd', [JematController::class, 'getSearchCekHbd'])->name('admin.jemat.searchHbd');
        Route::get('jemaat/searchHbdR', [JematController::class, 'getSearchCekHbd'])->name('admin.jemat.getSearchHbd');
    
    ########## CONFIG WEBSKKL ##########
    Route::get('webconfig/linkUtube', [WebConfigController::class, 'linkUtube'])->name('admin.web.linkutube');
    Route::patch('webconfig/linkUtube/{id}', [WebConfigController::class, 'linkUtubeUpdate'])->name('admin.web.linkutubeUpdate');

    // LAMPIRAN - LAMPIRAN
    Route::get('lampiran', [DocumentController::class, 'index'])->name('admin.lampiran');
    Route::get('lampiran/upload', [DocumentController::class, 'create'])->name('admin.lampiran.upload.create');
    Route::post('lampiran/upload', [DocumentController::class, 'store'])->name('admin.lampiran.upload.store');
    Route::delete('lampiran/upload', [DocumentController::class, 'delete'])->name('admin.lampiran.upload.delete');
    Route::get('lampiran/download/{temporaryfile}', [DocumentController::class, 'getDownload']);
    });

    // absensi
    Route::get('absensi/pa', [PelkatAbsenceController::class, 'searchAbsencePa'])->name('absence.search.pa');
    Route::get('absensi/pt', [PelkatAbsenceController::class, 'searchAbsencePt'])->name('absence.search.pt');

});
