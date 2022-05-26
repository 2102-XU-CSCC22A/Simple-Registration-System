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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/students', function() { 
        return view('template.students'); 
    })->name('students');

    Route::get('/student/getAll', [StudentController::class, 'getAllStudent']);
    Route::get('/student/getById/{param_id}', [StudentController::class, 'getByIdStudent']);
    Route::post('/student/create', [StudentController::class, 'createStudent']);
    Route::post('/student/update/{param_id}', [StudentController::class, 'updateStudent']); 
    Route::post('/student/delete/{param_id}', [StudentController::class, 'deleteStudent']);
});
