<?php

use Carbon\Carbon;
use App\Models\Attendence;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AllTaskController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\TicketController;

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
Route::get('/user/view/{id}', [UserController::class, 'view'])->middleware('admin')->name('user.view');

Route::resource('client', ClientController::class);
Route::post('/client/delete', [ClientController::class, 'deleteClient'])->name('client.delete');

Route::resource('department', DepartmentController::class);
Route::post('/department/delete', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');

Route::resource('airline', AirlineController::class);
Route::post('/airline/delete', [AirlineController::class, 'deleteAirline'])->name('airline.delete');

Route::resource('attendence', AttendenceController::class);

Route::get('admin/attendance', [AdminController::class, 'index'])->name('admin.attendence');
Route::get('admin/attendance/{id}', [AdminController::class, 'show'])->name('admin.attendence.show');

Route::resource('purpose', PurposeController::class);
Route::post('/purpose/delete', [PurposeController::class, 'deletePurpose'])->name('purpose.delete');

Route::resource('task', AllTaskController::class);
Route::post('/task/delete', [AllTaskController::class, 'deleteTask'])->name('task.delete');
Route::get('tasks', [AllTaskController::class, 'mytask'])->name('task.mytask');
Route::get("task/assign/{id}", [AllTaskController::class, "assign"])->name('task.assign');
Route::post("task/pending/{id}", [AllTaskController::class, "pending"])->name('task.pending');
Route::post("task/complete/{id}", [AllTaskController::class, "complete"])->name('task.complete');
Route::post("task/processing/{id}", [AllTaskController::class, "processing"])->name('task.processing');


Route::get('birthday', [BirthdayController::class, "index"])->name('birthday.index');
Route::get('birthday/client', [BirthdayController::class, "cindex"])->name('birthday.cindex');

Route::resource('tickets', TicketController::class);
Route::post('/ticket/delete', [TicketController::class, 'deleteTicket'])->name('ticket.delete');
Route::get('ticket/domestic', [TicketController::class, "index"])->name('ticket.domestic');
Route::get('ticket/international', [TicketController::class, "index"])->name('ticket.international');
Route::get('ticket/today', [TicketController::class, "index"])->name('ticket.today');

Route::resource('income', IncomeController::class);
Route::post('/income/delete', [IncomeController::class, 'deleteIncome'])->name('income.delete');

Route::resource('expenditure', ExpenditureController::class);
Route::post('/expenditure/delete', [ExpenditureController::class, 'deleteExpenditure'])->name('expenditure.delete');



Route::get('admin/leaves', [\App\Http\Controllers\Admin\LeaveController::class, 'index'])->name('admin.leaves');
Route::post("admin/approved", [\App\Http\Controllers\Admin\LeaveController::class, "approved"])->name('admin.leave.approved');
Route::post('admin/declined', [\App\Http\Controllers\Admin\LeaveController::class, 'declined'])->name('admin.leave.declined');
Route::get('admin/leaves/{id}', [\App\Http\Controllers\Admin\LeaveController::class, 'show'])->name('admin.leaves.show');


Route::resource('leave', LeaveController::class);

require __DIR__ . '/auth.php';
