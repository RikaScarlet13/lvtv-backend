<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\OwncastAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

// DASHBOARD
Route::get('/home', [WebsiteController::class, 'index'])->name('home')->middleware('auth');

// CREATE ADMIN
Route::get('/createAdminPage', [WebsiteController::class, 'createAdminPage'])->name('createAdminPage')->middleware('auth');
Route::post('/store-admin', [WebsiteController::class, 'storeAdmin'])->name('storeAdmin');

// LOGIN ADMIN
Route::get('/loginAdmin', [WebsiteController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/login', [WebsiteController::class, 'login'])->name('login');

// PAGES
Route::get('/users', [WebsiteController::class, 'usersPage'])->name('usersPage')->middleware('auth');
Route::get('/archives', [WebsiteController::class, 'archives'])->name('archives')->middleware('auth');
Route::get('/logs', [WebsiteController::class, 'logs'])->name('logs')->middleware('auth');

// SIDEBAR
Route::get('/sidebar', [WebsiteController::class, 'sidebar'])->name('sidebar')->middleware('auth');

// LOGOUT
Route::post('/logout', [WebsiteController::class, 'logout'])->name('logout');

// DELETE
Route::delete('/users/{id}', [WebsiteController::class, 'destroy'])->name('deleteUser')->middleware('auth');

// UPDATE ROLE
Route::post('/users/{id}/update-role', [WebsiteController::class, 'updateRole'])->name('users.updateRole')->middleware('auth');

// APPROVALS (Super Admin and Admin Only)
Route::get('/approval', [WebsiteController::class, 'showPendingApprovals'])->name('approval')->middleware('auth');
Route::patch('/approve/{id}', [WebsiteController::class, 'approveUser'])->name('approveUser')->middleware('auth');
Route::delete('/deny/{id}', [WebsiteController::class, 'denyUser'])->name('denyUser')->middleware('auth');

//SEARCH
Route::get('/users/search', [WebsiteController::class, 'search'])->name('users.search')->middleware('auth');

// WEBSITE
// Route::get('/our-story', [WebsiteController::class, 'ourStory'])->name('ourStory');
Route::get('/bab', [WebsiteController::class, 'bab'])->name('bab');
Route::get('/ict', [WebsiteController::class, 'ict'])->name('ict');
Route::get('/our-story', [WebsiteController::class, 'ourStory'])->name('ourStory');


// AUTH HOME
// Route::get('/auth-home', [WebsiteController::class, 'authHome'])->name('authHome');
Route::get('/teleradio', [WebsiteController::class, 'teleradio'])->name('teleradio')->middleware('auth');
Route::get('/auth-archives', [WebsiteController::class, 'archives'])->name('archives')->middleware('auth');
Route::get('/auth-bab', [WebsiteController::class, 'authBab'])->name('authBab')->middleware('auth');
Route::get('/auth-ict', [WebsiteController::class, 'authIct'])->name('authIct')->middleware('auth');
Route::get('/auth-our-story', [WebsiteController::class, 'authOurStory'])->name('authOurStory')->middleware('auth');
Route::get('/auth-home', [WebsiteController::class, 'authHome'])->name('authHome')->middleware('auth');

// Profile Update Route
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


// WATCH LIVE
// Route::get('/owncast/{path?}', function ($path = null) {
//     $url = 'https://owncastlvtv.online/' . $path;

//     $response = Http::withHeaders([
//         'Accept' => 'application/json',
//     ])->timeout(10) // Adjust the timeout as necessary
//       ->get($url);

//     return response($response->body(), $response->status())
//         ->header('Content-Type', $response->header('Content-Type'));
// })->where('path', '.*')->middleware('auth');


Route::get('/owncastAdmin', [WebsiteController::class, 'showOwncastAdmin'])->name('owncastAdmin')->middleware('auth');

Route::get('/owncast', [WebsiteController::class, 'showOwncast'])->name('owncast')->middleware('auth');
return redirect('https://owncastlvtv.online/'); // Assuming Owncast is running locally on port 8080


