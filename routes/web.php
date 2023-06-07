<?php

use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\ProjectTopicController;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\TeacherManagementController;
use App\Http\Controllers\TeamManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    })->name('dashboard');

    // Admin Management
    Route::resource('admin-management', AdminManagementController::class);

    // Teacher Management
    Route::resource('teacher-management', TeacherManagementController::class);

    // Student Management
    Route::resource('student-management', StudentManagementController::class);

    // Project Topic
    Route::resource('project-topic', ProjectTopicController::class);

    // Team Management
    Route::resource('team-management', TeamManagementController::class);
});
