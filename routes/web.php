<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\ChampionshipController;
use App\Http\Controllers\GalleriController;
use App\Http\Controllers\HistoryLevelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructureController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\StudentController;
use App\Models\Absen;
use App\Models\Galleri;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::get('/', 'HomeController@index')->name('home.index');

Auth::routes();

Route::get('/pendaftaran-siswa', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/pendaftaran-siswa', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

// Route::get('/', 'HomeController@index')->name('home.index');
//  Route::get('home', [HomeController::class, 'index'])->name('home');

 Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


   
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('home', [HomeController::class, 'index'])->name('home');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('/create', [UsersController::class, 'store'])->name('users.store');
            Route::patch('/{user}/status/aktif', [UsersController::class, 'aktif'])->name('users.aktif');
            Route::patch('/{user}/status/non', [UsersController::class, 'non'])->name('users.non');
            Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
            Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
        });

        /**
         * User Routes
         */
    Route::group(['prefix' => 'backend/admin/data-pendaftaran'], function(){
        Route::get('/', [PendaftaranController::class, 'data'])->name('datapendaftaran.index');
        Route::patch('/status/{pendaftaran}', [PendaftaranController::class, 'status'])->name('datapendaftaran.status');
        Route::delete('/{pendaftaran}', [PendaftaranController::class, 'destroy'])->name('datapendaftaran.destroy');
    });
    
    Route::get('/backend/data-siswa', [StudentController::class, 'index'] )->name('datasiswa.index');
    Route::get('/backend/data-siswa/create', [StudentController::class, 'create'] )->name('datasiswa.create');
    Route::post('/backend/data-siswa/create', [StudentController::class, 'store'] )->name('datasiswa.store');
    Route::get('/backend/data-siswa/show/{student}', [StudentController::class, 'show'] )->name('datasiswa.show');
    Route::get('/backend/data-siswa/{student}/edit', [StudentController::class, 'edit'] )->name('datasiswa.edit');
    Route::patch('/backend/data-siswa/{student}/update', [StudentController::class, 'update'] )->name('datasiswa.update');
    Route::patch('/backend/data-siswa/{student}/profile', [StudentController::class, 'ufoto'] )->name('datasiswa.update.foto');
    Route::patch('/backend/data-siswa/{student}/tempat', [StudentController::class, 'gtempat'] )->name('datasiswa.update.tempat');
    Route::patch('/backend/data-siswa/{student}/ttl', [StudentController::class, 'gttl'] )->name('datasiswa.update.gttl');
    Route::patch('/backend/data-siswa/{student}/nohp', [StudentController::class, 'gnohp'] )->name('datasiswa.update.nohp');
    Route::patch('/backend/data-siswa/{student}/namaortu', [StudentController::class, 'gnamaortu'] )->name('datasiswa.update.namaortu');
    Route::delete('/backend/data-siswa/delete/{student}', [StudentController::class, 'delete'] )->name('datasiswa.delete');
    
    Route::get('/backend/data-siswa/mydata', [StudentController::class, 'mydata'])->name('mydata.index');
    Route::get('/backend/data-siswa/{student}/profile', [StudentController::class, 'profile'])->name('profilesiswa.index');
    Route::get('/backend/data-siswa/{student}/kartu', [StudentController::class, 'downloadKartu'])->name('download.kartu');

    Route::get('/backend/data-kejuaraan', [ChampionshipController::class, 'index'] )->name('data-kejuaraan.index');
    Route::get('/backend/data-kejuaraan/create', [ChampionshipController::class, 'create'] )->name('data-kejuaraan.create');
    Route::post('/backend/data-kejuaraan/create', [ChampionshipController::class, 'store'] )->name('data-kejuaraan.store');
    Route::get('/backend/data-kejuaraan/show/{kejuaraan}', [ChampionshipController::class, 'show'] )->name('data-kejuaraan.show');
    Route::get('/backend/data-kejuaraan/{kejuaraan}/edit', [ChampionshipController::class, 'edit'] )->name('data-kejuaraan.edit');
    Route::patch('/backend/data-kejuaraan/{kejuaraan}/update', [ChampionshipController::class, 'update'] )->name('data-kejuaraan.update');
    Route::delete('/backend/data-kejuaraan/{kejuaraan}/delete', [ChampionshipController::class, 'destroy'] )->name('data-kejuaraan.destroy');    

    Route::get('/backend/data-pelatih', [InstructureController::class, 'index'] )->name('data-pelatih.index');
    Route::get('/backend/data-pelatih/create', [InstructureController::class, 'create'] )->name('data-pelatih.create');
    Route::post('/backend/data-pelatih/create', [InstructureController::class, 'store'] )->name('data-pelatih.store');
    Route::get('/backend/data-pelatih/show/{pelatih}', [InstructureController::class, 'show'] )->name('data-pelatih.show');
    Route::get('/backend/data-pelatih/{pelatih}/edit', [InstructureController::class, 'edit'] )->name('data-pelatih.edit');
    Route::patch('/backend/data-pelatih/{pelatih}/update', [InstructureController::class, 'update'] )->name('data-pelatih.update');
    Route::delete('/backend/data-pelatih/{pelatih}/delete', [InstructureController::class, 'destroy'] )->name('data-pelatih.destroy');
    
    Route::get('/backend/data-sabuk', [LevelController::class, 'index'])->name('data-sabuk.index');
    Route::get('/backend/data-sabuk/create', [LevelController::class, 'create'])->name('data-sabuk.create');
    Route::post('/backend/data-sabuk/create', [LevelController::class, 'store'])->name('data-sabuk.store');
    Route::get('/backend/data-sabuk/{level}/show', [LevelController::class, 'show'])->name('data-sabuk.show');
    Route::get('/backend/data-sabuk/{level}/edit', [LevelController::class, 'edit'])->name('data-sabuk.edit');
    Route::patch('/backend/data-sabuk/{level}/update', [LevelController::class, 'update'])->name('data-sabuk.update');
    Route::delete('/backend/data-sabuk/{level}/destroy', [LevelController::class, 'destroy'])->name('data-sabuk.destroy');

    Route::get('/backend/data-absen', [AbsenController::class, 'indexutama'])->name('data-absen.index');
    Route::patch('/backend/data-absen/{absen}', [AbsenController::class, 'hadir'])->name('data-absen.hadir');
    Route::patch('/backend/data-absen/non/{absen}', [AbsenController::class, 'non'])->name('data-absen.non');


    Route::get('/backend/data-jadwal', [JadwalController::class, 'index'])->name('data-jadwal.index');
    Route::get('/backend/data-jadwal/create', [JadwalController::class, 'create'])->name('data-jadwal.create');
    Route::post('/backend/data-jadwal/create', [JadwalController::class, 'store'])->name('data-jadwal.store');
    Route::get('/backend/data-jadwal/{jadwal}/show', [JadwalController::class, 'show'])->name('data-jadwal.show');
    Route::get('/backend/data-jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('data-jadwal.edit');
    Route::patch('/backend/data-jadwal/{jadwal}/update', [JadwalController::class, 'update'])->name('data-jadwal.update');
    Route::delete('/backend/data-jadwal/{jadwal}/destroy', [JadwalController::class, 'destroy'])->name('data-jadwal.destroy');

    Route::get('/backend/data-categori', [CategoriController::class, 'index'])->name('data-categori.index');
    Route::post('/backend/data-categori/create', [CategoriController::class, 'store'])->name('data-categori.store');
    Route::patch('/backend/data-categori/{categori}/update', [CategoriController::class, 'update'])->name('data-categori.update');
    Route::delete('/backend/data-categori/{categori}/destroy', [CategoriController::class, 'destroy'])->name('data-categori.destroy');

    Route::get('/backend/data-galeri', [GalleriController::class, 'index'])->name('data-galeri.index');
    Route::get('/backend/data-galeri/create', [GalleriController::class, 'create'])->name('data-galeri.create');
    Route::post('/backend/data-galeri/create', [GalleriController::class, 'store'])->name('data-galeri.store');
    Route::get('/backend/data-galeri/{galleri}/show', [GalleriController::class, 'show'])->name('data-galeri.show');
    Route::get('/backend/data-galeri/{galleri}/edit', [GalleriController::class, 'edit'])->name('data-galeri.edit');
    Route::patch('/backend/data-galeri/{galleri}/update', [GalleriController::class, 'update'])->name('data-galeri.update');
    Route::delete('/backend/data-galeri/{galleri}/destroy', [GalleriController::class, 'destroy'])->name('data-galeri.destroy');

    
    Route::get('/backend/siswa-absen/absen', [AbsenController::class, 'index'])->name('siswa-absen.index');
    Route::get('/backend/siswa-absen/{absen}/absen', [AbsenController::class, 'create'])->name('siswa-absen.create');
    Route::get('/backend/history/absen/{absen}', [AbsenController::class, 'history'])->name('siswa-absen.history');
    Route::post('/backend/siswa-absen/absen', [AbsenController::class, 'store'])->name('siswa-absen.store');
    Route::get('/backend/siswa-absen/{absen}/show', [AbsenController::class, 'show'])->name('siswa-absen.show');
    Route::get('/backend/siswa-absen/{absen}/edit', [AbsenController::class, 'edit'])->name('siswa-absen.edit');
    Route::patch('/backend/siswa-absen/{absen}/update', [AbsenController::class, 'update'])->name('siswa-absen.update');
    Route::delete('/backend/siswa-absen/{absen}/destroy', [AbsenController::class, 'destroy'])->name('siswa-absen.destroy');

    
    Route::get('/backend/history-level/', [HistoryLevelController::class, 'index'])->name('history-level.index');
    Route::get('/backend/history-level/create', [HistoryLevelController::class, 'create'])->name('history-level.create');
    Route::post('/backend/history-level/create', [HistoryLevelController::class, 'store'])->name('history-level.store');
    Route::get('/backend/history-level/{history}/show', [HistoryLevelController::class, 'show'])->name('history-level.show');
    Route::get('/backend/history-level/{history}/edit', [HistoryLevelController::class, 'edit'])->name('history-level.edit');
    Route::patch('/backend/history-level/{history}/update', [HistoryLevelController::class, 'update'])->name('history-level.update');
    Route::delete('/backend/history-level/{history}/destroy', [HistoryLevelController::class, 'destroy'])->name('history-level.destroy');
    
    
    Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
});