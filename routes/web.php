<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubuserController;
use App\Http\Controllers\CategoryController;
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
Route::get('/profile/select', [UserController::class, 'select'])->name('subselect');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/subregister', [UserController::class, 'subregister'])->name('profile.subregister');
    Route::get('/profile/show', [UserController::class, 'show']);
    Route::get('/menu', [UserController::class, 'menu'])->name('menu');
    Route::post('/profile/subregister', [UserController::class, 'store']);
    
    Route::get('/{sub}/profile/edit', [SubuserController::class, 'profileedit']);
    Route::get('/{sub}/profile/{subview}', [SubuserController::class, 'show']);
    Route::get('/{sub}/index', [SubuserController::class, 'index'])->name('home');
    Route::get('/{sub}/create', [SubuserController::class, 'create']);
    Route::get('/{sub}/showfollows', [SubuserController::class, 'showfollows']);
    Route::get('/{sub}/showallposts', [SubuserController::class, 'showallposts'])->name('profile.index');
    Route::get('/{sub}/search', [SubuserController::class, 'search']);
    Route::get('/{sub}/menu', [SubuserController::class, 'menu']);
    Route::post('/{sub}/store', [SubuserController::class, 'store']);
    Route::post('/{sub}/profile/{post}/edit', [SubuserController::class, 'edit']);
    Route::post('/{sub}/profile/update', [SubuserController::class, 'update']);
    Route::post('/{sub}/follow/{follow}', [SubuserController::class, 'follow']);
    Route::delete('/{sub}/delfollow/{follow}', [SubuserController::class, 'delfollow']);
    Route::delete('/{sub}/delpost/{post}', [SubuserController::class, 'delpost']);
    
    Route::get('{sub}/search/{category}', [CategoryController::class, 'showbypost']);
});




require __DIR__.'/auth.php';
