<?php

use App\Models\unit;
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
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\Dashboard\Unit\DashboardFlagController;
use App\Http\Controllers\Dashboard\Unit\DashboardTypeController;
use App\Http\Controllers\Dashboard\Unit\DashboardUnitController;
use App\Http\Controllers\Dashboard\DashboardPortofolioController;
use App\Http\Controllers\Dashboard\Maintenance\DashboardMaintenanceController;
use App\Http\Controllers\Dashboard\stock\DashboardCategoryPartController;
use App\Http\Controllers\Dashboard\Unit\DashboardBrandController;
use App\Http\Controllers\Dashboard\Unit\DashboardGroupController;
use App\Http\Controllers\RolePermission\AuthenticationController;
use App\Http\Controllers\Dashboard\stock\DashboardStockController;
use App\Http\Controllers\Dashboard\stock\DashboardInvstockController;
use App\Http\Controllers\Dashboard\stock\DashboardSupplierController;
use App\Http\Controllers\Dashboard\stock\DashboardSparepartController;
use App\Http\Controllers\Dashboard\Unit\DashboardCaroseriesController;
use App\Http\Controllers\Dashboard\Unit\DashboardCategoriesController;
use App\Http\Controllers\Dashboard\Unit\Letter\DashboardLetterController;

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

    // Unit Brand
    Route::controller(DashboardBrandController::class)->group(function () {
        Route::get('dashboard/unit/brand/checkSlug', 'checkSlug');
        Route::get('dashboard/unit/brand/create-excl', 'createexcl');
        Route::post('dashboard/unit/brand/store-excl', 'storeexcl');
    });

    Route::resource('dashboard/unit/brand', DashboardBrandController::class);
    // End Unit Brand

    // Categories Unit
    Route::controller(DashboardCategoriesController::class)->group(function () {
        Route::get('dashboard/unit/category/checkSlug', 'checkSlug');
        Route::get('dashboard/unit/category/create-excl', 'createexcl');
        Route::post('dashboard/unit/category/store-excl', 'storeexcl');
    });

    Route::resource(
        'dashboard/unit/category',
        DashboardCategoriesController::class
    );
    // End Categories Unit

    // Carosery
    Route::controller(DashboardCaroseriesController::class)->group(function () {
        Route::get('dashboard/unit/carosery/checkSlug', 'checkSlug');
        Route::get('dashboard/unit/carosery/create-excl', 'createexcl');
        Route::post('dashboard/unit/carosery/store-excl', 'storeexcl');
    });

    Route::resource(
        'dashboard/unit/carosery',
        DashboardCaroseriesController::class
    );
    // End Carosery

    // Group
    Route::controller(DashboardGroupController::class)->group(function () {
        Route::get('dashboard/unit/group/checkSlug', 'checkSlug');
        Route::get('dashboard/unit/group/create-excl', 'createexcl');
        Route::post('dashboard/unit/group/store-excl', 'storeexcl');
    });
    Route::resource('dashboard/unit/group', DashboardGroupController::class);
    // End Group

    // flag
    Route::controller(DashboardFlagController::class)->group(function () {
        Route::get('dashboard/unit/flag/checkSlug', 'checkSlug');
        Route::get('dashboard/unit/flag/create-excl', 'createexcl');
        Route::post('dashboard/unit/flag/store-excl', 'storeexcl');
    });

    Route::resource('dashboard/unit/flag', DashboardFlagController::class);
    // endflag

    // Type
    Route::controller(DashboardTypeController::class)->group(function () {
        Route::get('dashboard/unit/type/checkSlug', 'checkSlug');
        Route::get('dashboard/unit/type/create-excl', 'createexcl');
        Route::post('dashboard/unit/type/store-excl', 'storeexcl');
    });

    Route::resource('dashboard/unit/type', DashboardTypeController::class);
    // End Type

    // Letter
    Route::controller(DashboardLetterController::class)->group(function () {
        Route::get('/dashboard/unit/letter/data/{categoryletter}', 'data');
        Route::get('/dashboard/unit/letter/edittax/{letter}', 'edittax');
        Route::put('/dashboard/unit/letter/taxstore/{letter}', 'taxstore');
        Route::get('/dashboard/unit/letter/editexpire/{letter}', 'editexpire');
        Route::put(
            '/dashboard/unit/letter/expirestore/{letter}',
            'expirestore'
        );
        Route::get('dashboard/unit/letter/create-excl', 'createexcl');
        Route::post('dashboard/unit/letter/store-excl', 'storeexcl');
    });

    Route::resource('dashboard/unit/letter', DashboardLetterController::class);
    // end Letter

    Route::controller(DashboardUnitController::class)->group(function () {
        route::get('dashboard/unit/getType', 'getType');
        Route::get('dashboard/unit/create-excl', 'createexcl');
        Route::post('dashboard/unit/store-excl', 'storeexcl');
        Route::get('dashboard/unit/checkSlug', 'checkSlug');
    });
    Route::resource('dashboard/unit', DashboardUnitController::class);

    Route::controller(DashboardSupplierController::class)->group(function () {
        Route::get('/dashboard/stock/supplier/checkSlug', 'checkSlug');
    });

    Route::resource(
        'dashboard/stock/supplier',
        DashboardSupplierController::class
    );
    // Sparepart

    Route::controller(DashboardCategoryPartController::class)->group(
        function () {
            Route::get(
                'dashboard/stock/sparepart/categoryPart/checkSlug',
                'checkSlug'
            );
            Route::get(
                'dashboard/stock/sparepart/categoryPart/create-excl',
                'createexcl'
            );
            Route::post(
                'dashboard/stock/sparepart/categoryPart/store-excl',
                'storeexcl'
            );
        }
    );

    Route::resource(
        '/dashboard/stock/sparepart/categoryPart',
        DashboardCategoryPartController::class
    );

    Route::controller(DashboardSparepartController::class)->group(function () {
        Route::get('dashboard/stock/sparepart/checkSlug', 'checkSlug');
        route::get('dashboard/stock/sparepart/getType', 'getType');
        Route::get('dashboard/stock/sparepart/detail/{type}', 'detail');
        Route::get('dashboard/stock/sparepart/add/{type}', 'addsparepart');
        Route::post('dashboard/stock/sparepart/storepart', 'storepart');
        Route::get('dashboard/stock/sparepart/create-excl', 'createexcl');
        Route::post('dashboard/stock/sparepart/store-excl', 'storeexcl');
    });

    Route::resource(
        'dashboard/stock/sparepart',
        DashboardSparepartController::class
    );
    // End Sparepart

    // stock

    Route::controller(DashboardStockController::class)->group(function () {
        Route::get('/dashboard/stock', 'index');
        Route::get('/dashboard/stock/iodata', 'iodata');
        Route::get('/dashboard/stock/create/{invStock}', 'create');
        Route::get('/dashboard/stock/detail/{invStock}', 'detail');
        Route::post('/dashboard/stock', 'store');
        Route::get('/dashboard/stock/{stock}/edit', 'edit');
        Route::put('/dashboard/stock/{stock}', 'update');
        Route::delete('/dashboard/stock/{stock}', 'destroy');
        Route::post('dashboard/stock/pay/{invStock}', 'pay');
    });
    // end Stock
    // inv Stock
    Route::controller(DashboardInvstockController::class)->group(function () {
        Route::get('/dashboard/stock/invStock/checkSlug', 'checkSlug');
        Route::get('/dashboard/stock/invStock/{supplier}', 'index');
        Route::get('/dashboard/stock/invStock/create/{supplier}', 'create');
        Route::post('/dashboard/stock/invStock', 'store');
        Route::delete('/dashboard/stock/invStock/{invStock}', 'destroy');
        Route::get('/dashboard/stock/invStock/{invStock}/edit', 'edit');
        Route::put('/dashboard/stock/invStock/{invStock}', 'update');
    });
    // end Inv Stock

    // Maintenance
    Route::controller(DashboardMaintenanceController::class)->group(
        function () {
            Route::get(
                '/dashboard/maintenance/print-spk/{maintenance}',
                'printspk'
            );
            Route::get(
                '/dashboard/maintenance/part/{maintenance}',
                'createpart'
            );
            Route::post('dashboard/maintenance/part', 'storepart');

            Route::delete(
                '/dashboard/maintenance/part/{maintenance}/{msparepart}',
                'deletepart'
            );

            Route::get(
                '/dashboard/maintenance/part/{maintenance}/{msparepart}/edit',
                'editpart'
            );

            Route::put('dashboard/maintenance/part/{msparepart}', 'updatepart');

            Route::get(
                'dashboard/maintenance/state/{maintenance}',
                'editstate'
            );
            Route::put(
                '/dashboard/maintenance/state/{maintenance}',
                'updatestate'
            );
        }
    );

    Route::resource(
        '/dashboard/maintenance',
        DashboardMaintenanceController::class
    );
    // Endmaintenance

    // End ekspedisi Program
});
