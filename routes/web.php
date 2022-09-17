<?php

use Carbon\Carbon;
use App\Models\Attendence;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LeaveController as adminLeave;

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


Route::get('/dashboard', [SideController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('user', UserController::class)->middleware('admin');
Route::post('/user/delete', [UserController::class, 'deleteUser'])->middleware('admin')->name('user.delete');

Route::resource('client', ClientController::class);
Route::post('/client/delete', [ClientController::class, 'deleteClient'])->name('client.delete');

Route::resource('department', DepartmentController::class);
Route::post('/department/delete', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');

Route::resource('airline', AirlineController::class);
Route::post('/airline/delete', [AirlineController::class, 'deleteAirline'])->name('airline.delete');

Route::resource('attendence', AttendenceController::class);

Route::get('admin/attendance', [AdminController::class, 'index'])->name('admin.attendence');
Route::get('admin/attendance/{id}', [AdminController::class, 'show'])->name('admin.attendence.show');

Route::get('admin/leaves', [adminLeave::class, 'index'])->name('admin.leaves');
Route::post("admin/approved", [\App\Http\Controllers\Admin\LeaveController::class, "approved"])->name('admin.leave.approved');


Route::resource('leave', LeaveController::class);

require __DIR__ . '/auth.php';
