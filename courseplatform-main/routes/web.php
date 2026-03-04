<?php

use App\Http\Controllers\CourseListController;
use App\Http\Controllers\ModuleListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\EnrollmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Open as Open;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/admin', function () {
    return view('layouts.layoutadmin');
})->name('admin');

Route::get('/', function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::get('courses', [Open\CourseController::class, 'index'])
    ->name('courses.index');

Route::get('courses/{course}', [Open\CourseController::class, 'show'])
    ->name('open.courses.show');

Route::get('modules', [Open\ModuleController::class, 'index'])
    ->name('modules.index');

Route::get('lessons', [Open\LessonController::class, 'index'])
    ->name('lessons.index');

Route::get('enrollments', [Open\EnrollmentController::class, 'index'])
    ->name('enrollments.index');

Route::group(['middleware' => ['role:teacher|admin']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/courses/{course}/delete', [CourseController::class, 'delete'])
            ->name('courses.delete');

        Route::get('/modules/{module}/delete', [ModuleController::class, 'delete'])
            ->name('modules.delete');

        Route::get('/lessons/{lesson}/delete', [LessonController::class, 'delete'])
            ->name('lessons.delete');

        Route::get('/enrollments/{enrollment}/delete', [EnrollmentController::class, 'delete'])
            ->name('enrollments.delete');
        
        Route::resource('/courses', CourseController::class);
        Route::resource('/modules', ModuleController::class);
        Route::resource('/lessons', LessonController::class);
        Route::resource('/enrollments', EnrollmentController::class);
    });

    Route::get('/dashboard', function () {
            return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});

Route::group(['middleware' => ['role:student|teacher|admin']], function () {
    Route::prefix('open')->name('open.')->group(function () {

        Route::get('/enrollments/{enrollment}/create', [EnrollmentController::class, 'create'])
            ->name('enrollments.create');

        Route::get('/enrollments/{enrollment}/delete', [EnrollmentController::class, 'delete'])
            ->name('enrollments.delete');

        Route::resource('/modules', ModuleController::class);
    
        Route::resource('/lessons', LessonController::class);
        Route::resource('/enrollments', EnrollmentController::class);
    });

    Route::get('/dashboard', function () {
            return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
