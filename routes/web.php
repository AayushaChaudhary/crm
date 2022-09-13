<?php

use Carbon\Carbon;
use App\Models\Attendence;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\DepartmentController;

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


Route::get('/dashboard', function () {
    $attendence = Attendence::whereDate('date', Carbon::today())->where('user_id', auth()->user()->id)->first();
    if ($attendence) {
        return view('dashboard', compact('attendence'));
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('user', UserController::class)->middleware('admin');
Route::post('/user/delete', [UserController::class, 'deleteUser'])->middleware('admin')->name('user.delete');

Route::resource('client', ClientController::class);
Route::post('/client/delete', [ClientController::class, 'deleteClient'])->name('client.delete');

Route::resource('department', DepartmentController::class);
Route::post('/department/delete', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');

Route::resource('airline', AirlineController::class);
Route::post('/airline/delete', [AirlineController::class, 'deleteAirline'])->name('airline.delete');

Route::resource('attendence', AttendenceController::class);

require __DIR__ . '/auth.php';
