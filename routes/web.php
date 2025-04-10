<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;

// Public Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home/show_project', [HomeController::class, 'show_project'])->name('show_project');
Route::get('/home/about', [HomeController::class, 'about'])->name('about');
Route::get('/home/certificate', [HomeController::class, 'certificate'])->name('certificate');

// Admin Authentication
Route::get('/admin', [AuthController::class, 'showLogin'])->name('admin');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login_submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Grouping Admin Routes
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Project Routes
    Route::prefix('project')->group(function () {
        Route::post('/', [ProjectController::class, 'store_project'])->name('admin.store_project');
        Route::get('/show', [ProjectController::class, 'admin_show_project'])->name('admin.show_project');
        Route::get('/create', [ProjectController::class, 'create_project'])->name('admin.create_project');
        Route::get('/edit/{id}', [ProjectController::class, 'edit_project'])->name('admin.edit_project');
        Route::put('/update/{id}', [ProjectController::class, 'update_project'])->name('admin.update_project');
        Route::delete('/{id}', [ProjectController::class, 'delete_project'])->name('admin.project.destroy');
    });

    // About Routes
    Route::prefix('about')->group(function () {
        Route::get('/create', [AboutController::class, 'create_about'])->name('admin.create_about');
        Route::put('/update', [AboutController::class, 'update_about'])->name('admin.update_about');
    });

    // Certification Routes
    Route::prefix('certification')->group(function () {
        Route::post('/store', [CertificateController::class, 'store_certif'])->name('admin.store_certif');
        Route::get('/create', [CertificateController::class, 'create_certif'])->name('admin.create_certif');
        Route::get('/show', [CertificateController::class, 'admin_show_certif'])->name('admin.show_certif');
        Route::get('/edit/{id}', [CertificateController::class, 'edit_certif'])->name('admin.edit_certif');
        Route::put('/update/{id}', [CertificateController::class, 'update_certif'])->name('admin.update_certif');
        Route::delete('/{id}', [CertificateController::class, 'delete_certif'])->name('admin.certif.destroy');
    });

        // Skills Routes
        Route::prefix('skill')->group(function () {
            Route::post('/store', [SkillController::class, 'store_skill'])->name('admin.store_skill');
            Route::get('/create', [SkillController::class, 'create_skill'])->name('admin.create_skill');
            Route::get('/show', [SkillController::class, 'show_skill'])->name('admin.show_skill');
            Route::get('/edit/{id}', [SkillController::class, 'edit_skill'])->name('admin.edit_skill');
            Route::put('/update/{id}', [SkillController::class, 'update_skill'])->name('admin.update_skill');
            Route::delete('/{id}', [SkillController::class, 'delete_skill'])->name('admin.skill.destroy');
        });

});