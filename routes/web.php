<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', function () {
    return view('welcome');
});

// DASHBOARD
Route::get('/home', [WebsiteController::class, 'index'])->name('home');

// CREATE ADMIN
Route::get('/createAdminPage', [WebsiteController::class, 'createAdminPage'])->name('createAdminPage');
Route::post('/store-admin', [WebsiteController::class, 'storeAdmin'])->name('storeAdmin');


// LOGIN ADMIN
Route::get('/loginAdmin', [WebsiteController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/login', [WebsiteController::class, 'login'])->name('login');

// PAGES
Route::get('/usersPage', [WebsiteController::class, 'usersPage'])->name('usersPage');
Route::get('/archives', [WebsiteController::class, 'archives'])->name('archives');
Route::get('/logs', [WebsiteController::class, 'logs'])->name('logs');

// SIDEBAR
Route::get('/sidebar', [WebsiteController::class, 'sidebar'])->name('sidebar');

// LOGOUT
Route::post('/logout', [WebsiteController::class, 'logout'])->name('logout');

// DELETE
Route::delete('/users/{id}', [WebsiteController::class, 'destroy'])->name('deleteUser');

// UPDATE ROLE
Route::post('/users/{id}/update-role', [WebsiteController::class, 'updateRole'])->name('users.updateRole');

// APPROVALS (Super Admin and Admin Only)
Route::get('/approval', [WebsiteController::class, 'showPendingApprovals'])->name('approval');
Route::patch('/approve/{id}', [WebsiteController::class, 'approveUser'])->name('approveUser');
Route::delete('/deny/{id}', [WebsiteController::class, 'denyUser'])->name('denyUser');

