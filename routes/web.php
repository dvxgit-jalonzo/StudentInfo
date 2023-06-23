<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    if (\auth()->check()){
        return redirect()->route('master.index');
    }else{
        return view('auth.login');
    }
});

Route::group(['middleware' => ['auth']], function () {


    Route::resource('/master-user-info', \App\Http\Controllers\MasterUserInformationController::class);
    Route::resource('/master-year', \App\Http\Controllers\MasterYearController::class);
    Route::resource('/master-course', \App\Http\Controllers\MasterCourseController::class);
    Route::resource('/master-student', \App\Http\Controllers\MasterStudentController::class);
    Route::resource('/master-user-detail', \App\Http\Controllers\MasterUserDetailController::class);
    Route::resource('/master-user', \App\Http\Controllers\MasterUserController::class);
    Route::resource('/master-role', \App\Http\Controllers\MasterRoleController::class);
    Route::resource('/master', \App\Http\Controllers\MasterController::class);

    Route::post('/profile-update-password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])
        ->name('profile.update-password');
    Route::resource('/profile', \App\Http\Controllers\ProfileController::class);
});


Auth::routes();


