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
use App\Http\Controllers\Dashboard\DashboardAboutController;
use App\Http\Controllers\Dashboard\DashboardPortofolioController;
use App\Http\Controllers\Dashboard\stock\DashboardInvstockController;
use App\Http\Controllers\Dashboard\stock\DashboardSparepartController;
use App\Http\Controllers\Dashboard\stock\DashboardStockController;
use App\Http\Controllers\Dashboard\stock\DashboardSupplierController;
use App\Http\Controllers\Dashboard\Unit\DashboardUnitController;
use App\Http\Controllers\Dashboard\Unit\Letter\DashboardLetterController;
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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);

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
    // Page administrator
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
    Route::resource(
        'dashboard/page/heropage',
        DashboardHeroController::class
    )->only('index', 'update');
    // About
    Route::resource(
        'dashboard/page/about',
        DashboardAboutController::class
    )->only('index', 'update');

    Route::get('dashboard/page/portofolio/checkSlug', [
        DashboardPortofolioController::class,
        'checkSlug',
    ]);

    Route::resource(
        'dashboard/page/portofolio',
        DashboardPortofolioController::class
    );
    // End Page administrator
    // ekspedisi Program
    Route::controller(DashboardUnitController::class)->group(function () {
        route::get('dashboard/unit/getType', 'getType');

        Route::get('dashboard/unit/checkSlug', 'checkSlug');
    });

    Route::controller(DashboardLetterController::class)->group(function () {
        Route::get('/dashboard/unit/letter/data/{categoryletter}', 'data');
        Route::get('/dashboard/unit/letter/edittax/{letter}', 'edittax');
        Route::put('/dashboard/unit/letter/taxstore/{letter}', 'taxstore');
        Route::get('/dashboard/unit/letter/editexpire/{letter}', 'editexpire');
        Route::put(
            '/dashboard/unit/letter/expirestore/{letter}',
            'expirestore'
        );
    });

    Route::resource('dashboard/unit/letter', DashboardLetterController::class);
    Route::resource('dashboard/unit', DashboardUnitController::class);

    Route::controller(DashboardSupplierController::class)->group(function () {
        Route::get('/dashboard/stock/supplier/checkSlug', 'checkSlug');
    });

    Route::resource(
        'dashboard/stock/supplier',
        DashboardSupplierController::class
    );

    Route::controller(DashboardSparepartController::class)->group(function () {
        Route::get('dashboard/stock/sparepart/checkSlug', 'checkSlug');
        route::get('dashboard/stock/sparepart/getType', 'getType');
    });

    Route::resource(
        'dashboard/stock/sparepart',
        DashboardSparepartController::class
    );

    Route::controller(DashboardStockController::class)->group(function () {
        Route::get('/dashboard/stock', 'index');
        Route::get('/dashboard/stock/iodata', 'iodata');
        Route::get('/dashboard/stock/create/{invStock}', 'create');
        Route::get('/dashboard/stock/detail/{invStock}', 'detail');
        Route::post('/dashboard/stock', 'store');
        Route::get('/dashboard/stock/{stock}/edit', 'edit');
        Route::put('/dashboard/stock/{stock}', 'update');
        Route::delete('/dashboard/stock/{stock}', 'destroy');
    });

    Route::controller(DashboardInvstockController::class)->group(function () {
        Route::get('/dashboard/stock/invStock/checkSlug', 'checkSlug');
        Route::get('/dashboard/stock/invStock/{supplier}', 'index');
        Route::get('/dashboard/stock/invStock/create/{supplier}', 'create');
        Route::post('/dashboard/stock/invStock', 'store');
        Route::delete('/dashboard/stock/invStock/{invStock}', 'destroy');
        Route::get('/dashboard/stock/invStock/{invStock}/edit', 'edit');
        Route::put('/dashboard/stock/invStock/{invStock}', 'update');
    });

    // End ekspedisi Program
});
