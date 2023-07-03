<?php

use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\ProjectManagementController;
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
    Route::get('team-management/request', [TeamManagementController::class, 'request'])->name('team-management.request');
    Route::get('team-management/request/{id}', [TeamManagementController::class, 'requestAccept'])->name('team-management.request.accept');
    Route::get('team-management/request/{id}/reject', [TeamManagementController::class, 'requestReject'])->name('team-management.request.reject');
    Route::resource('team-management', TeamManagementController::class);

    // Project Management
    Route::get('project-proposal', [ProjectManagementController::class, 'proposal'])->name('project.proposal');
    Route::get('project-proposal/{id}', [ProjectManagementController::class, 'proposalEdit'])->name('project.proposal.edit');
    Route::post('project-proposal', [ProjectManagementController::class, 'proposalStore'])->name('project.proposal.store');
    Route::get('project-details/{id}', [ProjectManagementController::class, 'details'])->name('project.details');
    Route::get('projects', [ProjectManagementController::class, 'index'])->name('project.index');
    Route::get('project-pending', [ProjectManagementController::class, 'pending'])->name('project.pending');
    Route::post('project-approve/{id}', [ProjectManagementController::class, 'approve'])->name('project.approve');
    Route::post('project-reject/{id}', [ProjectManagementController::class, 'reject'])->name('project.reject');
    Route::get('project-list', [ProjectManagementController::class, 'supervisorProjectList'])->name('project.supervisor.list');
});
