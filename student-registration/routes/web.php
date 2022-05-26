<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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
Auth::routes();

Route::get('/', function () {
    return redirect('login');
});

Route::get('/register', function () {
    return redirect('login');
});

Route::get('/password/reset', function () {
    return redirect('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/students', [StudentController::class, 'index'])->name('students');

// Student Route
Route::get('/student/getAll', [StudentController::class, 'getAllStudent']);
Route::get('/student/getById/{param_id}', [StudentController::class, 'getByIdStudent']);
Route::get('/student/delete/{param_id}', [StudentController::class, 'deleteStudent']);
Route::post('/student/create', [StudentController::class, 'createStudent']);