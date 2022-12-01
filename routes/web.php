<?php

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\RolePermission\AuthenticationController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;

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

    route::get('dashboard/user/addrole/{user}', [
        usercontroller::class,
        'addrole',
    ]);
    route::post('dashboard/user/storerole/{user}', [
        usercontroller::class,
        'storerole',
    ]);

    Route::resource('dashboard/user', UserController::class);
});
