<?php

use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\ProjectManagementController;
use App\Http\Controllers\ProjectTopicController;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\TaskManagementController;
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

    // Task Management
    Route::get('tasks', [TaskManagementController::class, 'index'])->name('task.index');
    Route::get('tasks/{id}', [TaskManagementController::class, 'show'])->name('task.show');
    Route::post('tasks/store', [TaskManagementController::class, 'store'])->name('task.store');
    // student.task.pending
    Route::get('student-pending-task/{id}', [TaskManagementController::class, 'studentPendingTask'])->name('student.task.pending');
    // student.task.submit
    Route::post('student-submit-task', [TaskManagementController::class, 'studentSubmitTask'])->name('student.task.submit');
    //student.task.approved
    Route::get('student-approved-task/{id}', [TaskManagementController::class, 'studentApprovedTask'])->name('student.task.approved');
    //student.task.rejected
    Route::get('student-rejected-task/{id}', [TaskManagementController::class, 'studentRejectedTask'])->name('student.task.rejected');
    //student.task.failed
    Route::get('student-failed-task/{id}', [TaskManagementController::class, 'studentFailedTask'])->name('student.task.failed');
    //route('task.list', $project->id)
    Route::get('task-list/{id}', [TaskManagementController::class, 'taskList'])->name('task.list');
    //teacher.task.review
    Route::post('teacher-task-review', [TaskManagementController::class, 'teacherTaskReview'])->name('teacher.task.review');
});
