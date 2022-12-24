<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\HomeController;
use Spatie\Permission\Contracts\Permission;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\Dashboard\ProfilUserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Dashboard\DashboardHeroController;
use App\Http\Controllers\Dashboard\DashboardPageController;
use App\Http\Controllers\Landingpage\LandingpageController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\AuthenticationController;

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

Route::get('/', LandingpageController::class);

Auth::routes();

Route::get('/dashboard', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('/dashboard/authentication/role', RoleController::class);
    Route::resource(
        'dashboard/authentication/permission',
        PermissionController::class
    );

    Route::get('dashboard/authentication/regper/{id}', [
        AuthenticationController::class,
        'regper',
    ]);
    Route::resource(
        'dashboard/authentication',
        AuthenticationController::class
    );

    Route::controller(ProfilUserController::class)->group(function () {
        Route::get('dashboard/user/profil', 'index');
        Route::put('dashboard/user/profil/{user}', 'update');
    });
    Route::controller(UserController::class)->group(function () {
        route::get('dashboard/user/addrole/{user}', 'addrole');
        route::post('dashboard/user/storerole/{user}', 'storerole');
        route::put('dashboard/user/updatepassword/{user}', 'updatepassword');
    });

    Route::resource('dashboard/user', UserController::class);

    // page
    Route::get('/dashboard/page', DashboardPageController::class);
    // hero
    Route::resource('dashboard/page/hero', DashboardHeroController::class);
});
