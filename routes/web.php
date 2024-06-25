<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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

//UPDATE ROLE
Route::post('/users/{user}/update-role', [WebsiteController::class, 'updateRole'])->name('users.updateRole');
