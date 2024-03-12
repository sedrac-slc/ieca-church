<?php

use App\Http\Controllers\{
    HomeController,
    RoleController,
    PermissionController,
    UserController,
};
use App\Models\User;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, 'home'])->name("home");
Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/permission-deneid', [HomeController::class, 'permissionDeneid'])->name("permission-deneid");

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
