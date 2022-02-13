<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/role', [RoleController::class, 'index'])->name('admin.role');
Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
Route::post('/role/store', [RoleController::class, 'store'])->name('admin.role.store');
// Route::get('/role/permission', [PermissionController::class, 'index'])->name('admin.role.permission');
// Route::post('/role/permission/store', [PermissionController::class, 'store'])->name('admin.role.permission.store');
Route::get('/role/{id}', [RoleController::class, 'show'])->name('admin.role.permission.show');

Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');

Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('admin.role.delete');

/*****Permission */
Route::get('/permission', [PermissionController::class, 'index'])->name('admin.permission');
Route::get('/permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
Route::post('/permission/create/store', [PermissionController::class, 'store'])->name('admin.permission.store');
Route::get('/permission/show/{id}', [PermissionController::class, 'show'])->name('admin.permission.show');
Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('admin.permission.update');
Route::get('/permission/delete/{id}', [PermissionController::class, 'destroy'])->name('admin.permission.delete');
