<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', function () {
    return view('welcome');
});
// DASHBOARD
Route::get('/home', [WebsiteController::class, 'index'])->name('home');

// CREATE ADMIN
Route::get('/createAdminPage', [WebsiteController::class, 'createAdminPage']);
Route::post('/store-admin', [WebsiteController::class, 'storeAdmin'])->name('storeAdmin');

// LOGIN ADMIN
Route::get('/loginAdmin', [WebsiteController::class, 'loginAdmin']);
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


