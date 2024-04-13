<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubuserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/profile/index', [UserController::class, 'index'])->name('profile.index');
Route::get('/profile/select', [UserController::class, 'select']);

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/subregister', [UserController::class, 'subregister']);
    Route::post('/profile/subregister', [UserController::class, 'store']);
    
    Route::get('/{sub}/profile/edit', [SubuserController::class, 'profileedit']);
    Route::get('/{sub}/profile/{subview}', [SubuserController::class, 'show']);
    Route::get('/{sub}/index', [SubuserController::class, 'index']);
    Route::get('/{sub}/create', [SubuserController::class, 'create']);
    Route::get('{sub}/showfollows', [SubuserController::class, 'showfollows']);
    Route::post('/{sub}/store', [SubuserController::class, 'store']);
    Route::post('/{sub}/profile/{post}/edit', [SubuserController::class, 'edit']);
    Route::post('/{sub}/profile/update', [SubuserController::class, 'update']);
    Route::post('/{sub}/follow/{follow}', [SubuserController::class, 'follow']);
});




require __DIR__.'/auth.php';
