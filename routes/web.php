<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [WebsiteController::class, 'index'])->name('home');
Route::get('/createAdminPage', [WebsiteController::class, 'createAdminPage']);
Route::post('/store-admin', [WebsiteController::class, 'storeAdmin'])->name('storeAdmin');
Route::get('/loginAdmin', [WebsiteController::class, 'loginAdmin']);
Route::post('/login', [WebsiteController::class, 'login'])->name('login');
Route::get('/usersPage', [WebsiteController::class, 'usersPage'])->name('usersPage');
Route::get('/archives', [WebsiteController::class, 'archives'])->name('archives');
Route::get('/logs', [WebsiteController::class, 'logs'])->name('logs');
Route::get('/sidebar', [WebsiteController::class, 'sidebar'])->name('sidebar');



