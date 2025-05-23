<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EnrollementController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

// Route::get('/', [Controller::class,'dashboard'])->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'createUi'])->name('users.createui');
        Route::post('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/update/{id}', [UserController::class, 'updateUi'])->name('users.updateui');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::post('/destroy/{id}', [UserController::class, 'delete'])->name('users.delete');
    });

    Route::group(['prefix' => 'students'], function () {
        Route::get('/', [StudentController::class, 'index'])->name('students');
        Route::get('/create', [StudentController::class, 'createUi'])->name('students.createui');
        Route::post('/create', [StudentController::class, 'create'])->name('students.create');
        Route::get('/update/{id}', [StudentController::class, 'updateUi'])->name('students.updateui');
        Route::post('/update/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::post('/destroy/{id}', [StudentController::class, 'delete'])->name('students.delete');
    });

    Route::group(['prefix' => 'subjects'], function () {
        Route::get('/', [SubjectController::class, 'index'])->name('subjects');
        Route::get('/create', [SubjectController::class, 'createUi'])->name('subjects.createui');
        Route::post('/create', [SubjectController::class, 'create'])->name('subjects.create');
        Route::get('/update/{id}', [SubjectController::class, 'updateUi'])->name('subjects.updateui');
        Route::post('/update/{id}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::post('/destroy/{id}', [SubjectController::class, 'delete'])->name('subjects.delete');
    });

    Route::group(['prefix' => 'enrollement'], function () {
        Route::get('/', [EnrollementController::class, 'index'])->name('enrollement');
        Route::get('/create', [EnrollementController::class, 'createUi'])->name('enrollement.createui');
        Route::post('/create', [EnrollementController::class, 'create'])->name('enrollement.create');
        Route::get('/update/{id}', [EnrollementController::class, 'updateUi'])->name('enrollement.updateui');
        Route::post('/update/{id}', [EnrollementController::class, 'update'])->name('enrollement.update');
        Route::post('/destroy/{id}', [EnrollementController::class, 'delete'])->name('enrollement.delete');
        Route::get('/get-students', [EnrollementController::class, 'getStudents'])->name('enrollement.get-students');
    });

    Route::group(['prefix' => 'attendance'], function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('attendance');
        Route::get('/create', [AttendanceController::class, 'createUi'])->name('attendance.createui');
        Route::post('/create', [AttendanceController::class, 'create'])->name('attendance.create');
        Route::get('/update/{id}', [AttendanceController::class, 'updateUi'])->name('attendance.updateui');
        Route::post('/update/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
        Route::post('/destroy/{id}', [AttendanceController::class, 'delete'])->name('attendance.delete');
    });
});

