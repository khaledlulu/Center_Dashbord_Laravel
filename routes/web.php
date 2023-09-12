<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudantController;
use App\Http\Controllers\UserAuthController;
use App\Models\Studant;
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

/**
 * Registers routes for the web application.
 *
 * This function defines routes for the homepage and a group of routes for the dashboard section.
 * The dashboard routes are prefixed with 'dashboard/' and include a resource route for the 'cities' endpoint,
 * which is handled by the 'CityController' class.
 *
 * @return void
 */
Route::get('/', function () {
    return view('welcome');
});
//  {{ Login Route }}
Route::prefix('dashbord/')->middleware('guest:admin,employee,studant')->group(function () {
    Route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('login.view');
    Route::post('{guard}/login', [UserAuthController::class, 'login']);
});
// {{ LogOut Route }}
Route::prefix('dashbord/')->middleware('auth:admin,employee,studant')->group(function () {
    Route::get('logout', [UserAuthController::class, 'logout'])->name('logout.dashbord');
    Route::get('editprofile', [UserAuthController::class, 'EditProfile'])->name('editprofile.dashbord');
    Route::get('editpassword', [UserAuthController::class, 'ChangePassword'])->name('editpassword.dashbord');
    Route::post('change/password', [UserAuthController::class, 'updatePassword'])->name('change/password.dashbord');
});

Route::prefix('dashbord/')->middleware('auth:admin,employee,studant')->group(function () {
    // Route::prefix('dashbord/')->group(function () {
    Route::view('Home', 'dashbord.temp')->name('Home');
    Route::resource('cities', CityController::class);
    Route::resource('rooms', RoomController::class);
    Route::post('update_rooms/{id}', [RoomController::class, 'update'])->name('update_rooms');
    Route::resource('diplomas', DiplomaController::class);
    Route::post('update_diplomas/{id}', [DiplomaController::class, 'update'])->name('update_diplomas');
    Route::resource('groups', GroupController::class);
    Route::post('update_groups/{id}', [GroupController::class, 'update'])->name('update_groups');
    Route::resource('admins', AdminController::class);
    Route::post('update_admins/{id}', [AdminController::class, 'update'])->name('update_admins');
    Route::resource('employees', EmployeeController::class);
    Route::post('update_employees/{id}', [EmployeeController::class, 'update'])->name('update_employees');
    Route::resource('permissions', PermissionController::class);
    Route::post('update_permissions/{id}', [PermissionController::class, 'update'])->name('update_permissions');
    Route::resource('roles', RoleController::class);
    Route::post('update_roles/{id}', [RoleController::class, 'update'])->name('update_roles');
    Route::resource('studants', StudantController::class);
    Route::post('update_studants/{id}', [StudantController::class, 'update'])->name('update_studants');

    Route::resource('roles.permissions', RolePermissionController::class);

    Route::get('/create/groups/{id}', [GroupController::class, 'createGroup'])->name('createGroup');
    Route::get('/index/groups/{id}', [GroupController::class, 'indexGroup'])->name('indexGroup');
});
